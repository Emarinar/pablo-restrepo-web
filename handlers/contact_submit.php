<?php
declare(strict_types=1);
session_start();

$config = require __DIR__ . '/../config.php';

function redirect(string $path): void {
  header("Location: {$path}");
  exit;
}

$base = $config['site']['base_url'];
$back = $base . "/contacto";

if (($_POST['csrf'] ?? '') !== ($_SESSION['csrf'] ?? '')) {
  $_SESSION['flash'] = ['ok' => false, 'message' => 'Solicitud inválida (CSRF). Intenta nuevamente.'];
  redirect($back);
}

$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$phone = trim((string)($_POST['phone'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));

if ($name === '' || $email === '' || $message === '') {
  $_SESSION['flash'] = ['ok' => false, 'message' => 'Completa los campos obligatorios (Nombre, Correo y Mensaje).'];
  redirect($back);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $_SESSION['flash'] = ['ok' => false, 'message' => 'El correo no es válido.'];
  redirect($back);
}

if (mb_strlen($message) < 10) {
  $_SESSION['flash'] = ['ok' => false, 'message' => 'El mensaje debe tener al menos 10 caracteres.'];
  redirect($back);
}

$subject = "Contacto Web - Pablo Restrepo: " . $name;

$body = "Nuevo mensaje desde el sitio web:\n\n"
  . "Nombre: {$name}\n"
  . "Correo: {$email}\n"
  . "Teléfono: {$phone}\n"
  . "Fecha: " . date('Y-m-d H:i:s') . "\n\n"
  . "Mensaje:\n{$message}\n";

$sent = false;
$error = '';

try {
  require_once __DIR__ . '/../lib/mailer.php';
  $sent = mailer_send($config, $subject, $body, $email, $name);
} catch (Throwable $e) {
  $sent = false;
  $error = $e->getMessage();
}

if ($sent) {
  $_SESSION['flash'] = ['ok' => true, 'message' => '¡Mensaje enviado! Gracias por escribir.'];
} else {
  $_SESSION['flash'] = [
    'ok' => false,
    'message' => 'No se pudo enviar el mensaje por ahora. ' . ($error ? "Detalle: {$error}" : '')
  ];
}

redirect($back);