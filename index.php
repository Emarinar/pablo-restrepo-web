<?php
declare(strict_types=1);
session_start();

$config = require __DIR__ . '/config.php';

/**
 * Router: soporta rutas limpias (/quien-soy)
 * y también query (?route=quien-soy) como fallback.
 */
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$path = rtrim($path, '/');
if ($path === '') $path = '/';

/** Si tu proyecto queda en subcarpeta, intenta detectar y recortar */
$scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/');
if ($scriptDir && $scriptDir !== '/' && strpos($path, $scriptDir) === 0) {
  $path = substr($path, strlen($scriptDir));
  $path = $path ?: '/';
}

/** Fallback si llegan por query string */
$routeQuery = trim((string)($_GET['route'] ?? ''), '/');
if ($routeQuery !== '') {
  $path = '/' . $routeQuery;
}

/** Mapa de rutas */
$routes = [
  '/' => __DIR__ . '/pages/home.php',
  '/quien-soy' => __DIR__ . '/pages/quien-soy.php',
  '/de-la-mano-con-la-gente' => __DIR__ . '/pages/gestion.php',
  '/noticias' => __DIR__ . '/pages/noticias.php',
  '/contacto' => __DIR__ . '/pages/contacto.php',
];

$page = $routes[$path] ?? null;

function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

if (!$page || !is_file($page)) {
  http_response_code(404);
  $title = 'Página no encontrada';
  include __DIR__ . '/partials/header.php';
  echo '<section class="section"><div class="container"><div class="notice notice--bad">404 — Página no encontrada.</div></div></section>';
  include __DIR__ . '/partials/footer.php';
  exit;
}

$title = $config['site']['name'];

include __DIR__ . '/partials/header.php';
include $page;
include __DIR__ . '/partials/footer.php';
