<?php
declare(strict_types=1);

/**
 * Requiere PHPMailer instalado por composer:
 * composer require phpmailer/phpmailer
 *
 * En local puedes dejarlo sin configurar y luego ajustamos en cPanel.
 */
function mailer_send(array $config, string $subject, string $body, string $replyEmail, string $replyName): bool
{
  $to = $config['contact']['to_email'] ?? '';
  if (!$to) throw new RuntimeException('No está definido contact.to_email en config.php');

  // Config SMTP (lo llenamos cuando tengamos cPanel)
  $smtp = $config['smtp'] ?? [];
  $useSmtp = !empty($smtp['host']);

  // Si no hay SMTP configurado aún, intenta mail() (puede fallar en local, pero queda listo)
  if (!$useSmtp) {
    $headers = "From: {$to}\r\nReply-To: {$replyEmail}\r\n";
    return @mail($to, $subject, $body, $headers);
  }

  // PHPMailer
  $autoload = __DIR__ . '/../vendor/autoload.php';
  if (!is_file($autoload)) {
    throw new RuntimeException('PHPMailer no está instalado. Ejecuta: composer require phpmailer/phpmailer');
  }
  require_once $autoload;

  $mail = new PHPMailer\PHPMailer\PHPMailer(true);

  $mail->isSMTP();
  $mail->Host = (string)$smtp['host'];
  $mail->SMTPAuth = true;
  $mail->Username = (string)$smtp['username'];
  $mail->Password = (string)$smtp['password'];
  $mail->Port = (int)($smtp['port'] ?? 587);

  $secure = (string)($smtp['secure'] ?? 'tls'); // 'tls' o 'ssl'
  if ($secure === 'ssl') $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
  else $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;

  $fromEmail = (string)($smtp['from_email'] ?? $smtp['username']);
  $fromName = (string)($smtp['from_name'] ?? $config['site']['name']);

  $mail->setFrom($fromEmail, $fromName);
  $mail->addAddress($to);
  $mail->addReplyTo($replyEmail, $replyName);

  $mail->Subject = $subject;
  $mail->Body = $body;

  return $mail->send();
}