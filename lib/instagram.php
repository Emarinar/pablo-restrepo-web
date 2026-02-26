<?php
declare(strict_types=1);

/**
 * Instagram Graph API (Basic Display NO; usamos Graph API para IG Professional).
 * Requiere token y user_id.
 */
function instagram_get_posts(array $config, string $cacheFile, int $ttlSeconds = 3600): array
{
  $token = trim($config['instagram_api']['access_token'] ?? '');
  $userId = trim($config['instagram_api']['user_id'] ?? '');
  $limit = (int)($config['instagram_api']['limit'] ?? 9);

  if ($token === '' || $userId === '') {
    return [
      'data' => [],
      'error' => 'Instagram aún no está configurado (faltan access_token y user_id).'
    ];
  }

  // Cache
  if (is_file($cacheFile) && (time() - filemtime($cacheFile)) < $ttlSeconds) {
    $raw = file_get_contents($cacheFile);
    $json = json_decode($raw ?: '[]', true);
    if (is_array($json)) return $json;
  }

  $fields = 'id,caption,media_type,media_url,permalink,thumbnail_url,timestamp';
  $url = "https://graph.facebook.com/v19.0/{$userId}/media?fields={$fields}&limit={$limit}&access_token=" . urlencode($token);

  $resp = instagram_http_get($url);
  if (!$resp['ok']) {
    return ['data' => [], 'error' => 'No se pudo consultar Instagram (revisa token/permisos).'];
  }

  $data = json_decode($resp['body'], true);
  if (!is_array($data)) {
    return ['data' => [], 'error' => 'Respuesta inválida de Instagram.'];
  }

  // Filtrar solo imágenes y carruseles (puedes incluir videos si quieres)
  $items = array_values(array_filter(($data['data'] ?? []), function ($p) {
    $t = $p['media_type'] ?? '';
    return in_array($t, ['IMAGE', 'CAROUSEL_ALBUM', 'VIDEO'], true);
  }));

  $payload = ['data' => $items, 'fetched_at' => date('c')];

  // Guardar cache
  @file_put_contents($cacheFile, json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));

  return $payload;
}

function instagram_http_get(string $url): array
{
  $ctx = stream_context_create([
    'http' => [
      'method' => 'GET',
      'timeout' => 12,
      'header' => "Accept: application/json\r\nUser-Agent: PabloRestrepoSite/1.0\r\n",
    ]
  ]);

  $body = @file_get_contents($url, false, $ctx);
  $ok = is_string($body) && strlen($body) > 0;

  return ['ok' => $ok, 'body' => $body ?: ''];
}