<?php
$base = $config['site']['base_url'];
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($title) ?></title>

  <meta name="description" content="<?= e($config['site']['slogan']) ?> | Envigado">
  <meta property="og:title" content="<?= e($config['site']['name']) ?>">
  <meta property="og:description" content="<?= e($config['site']['slogan']) ?>">
  <meta property="og:image" content="<?= e($base) ?>/assets/img/og-image.jpg">
  <meta property="og:url" content="<?= e($base) ?>">
  <meta name="theme-color" content="#b80f1a">

  <link rel="stylesheet" href="<?= e($base) ?>/assets/css/styles.css">
</head>
<body>

<header class="topbar">
  <div class="container topbar__inner">
    <a class="brand" href="<?= e($base) ?>/">
    <img src="<?= e($base) ?>/assets/img/logo-liberal.png" alt="Logo Pablo Restrepo" class="brand__logo">
    <span class="brand__text">Pablo<br><strong>Restrepo</strong></span>
    </a>

    <nav class="nav" id="nav">
      <a href="<?= e($base) ?>/" class="nav__link">Inicio</a>
      <a href="<?= e($base) ?>/quien-soy" class="nav__link">Quién Soy</a>
      <a href="<?= e($base) ?>/de-la-mano-con-la-gente" class="nav__link">De la Mano con la Gente</a>
      <a href="<?= e($base) ?>/noticias" class="nav__link">Noticias</a>
      <a href="<?= e($base) ?>/contacto" class="nav__link">Contacto</a>
    </nav>

    <div class="topbar__actions">
      <a class="btn btn--primary" href="<?= e($base) ?>/contacto">Contáctame</a>
      <button class="burger" id="burger" aria-label="Abrir menú" aria-controls="nav" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>

<main>