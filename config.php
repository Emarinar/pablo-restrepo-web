<?php
declare(strict_types=1);

function base_url(): string {
  $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
  $scheme = $https ? 'https' : 'http';
  $host = $_SERVER['HTTP_HOST'] ?? 'localhost';

  // si tu proyecto está en una subcarpeta, ejemplo /pablorestrepogarces
  $scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/');
  if ($scriptDir === '') $scriptDir = '';

  return $scheme . '://' . $host . $scriptDir;
}

return [
  'site' => [
    'name' => 'Pablo Andrés Restrepo Garcés',
    'domain' => 'www.pablorestrepogarces.com',
    'slogan' => 'De la mano con la gente',
    'base_url' => base_url(), // ✅ ahora funciona local y en hosting
  ],

  'social' => [
    'instagram' => 'https://www.instagram.com/pablorestrepo_g',
    'facebook'  => 'https://facebook.com/USUARIO',
    'x'         => 'https://x.com/USUARIO',
    'youtube'   => 'https://youtube.com/@USUARIO',
    'tiktok'    => 'https://tiktok.com/@USUARIO',
    'whatsapp'  => 'https://wa.me/57XXXXXXXXXX',
  ],

  'instagram_api' => [
    'access_token' => '',
    'user_id' => '',
    'limit' => 9,
  ],

  'contact' => [
    'to_email' => 'contacto@pablorestrepogarces.com',
  ],

  'smtp' => [
    'host' => '',
    'username' => '',
    'password' => '',
    'port' => 587,
    'secure' => 'tls',
    'from_email' => '',
    'from_name' => 'Pablo Restrepo',
  ],
];