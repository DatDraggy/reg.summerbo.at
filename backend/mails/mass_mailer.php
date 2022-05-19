<?php
if (php_sapi_name() != "cli") {
  die('lol nah');
}
require_once('../config.php');
require_once('../funcs.php');
require_once('texts.php');

$config['dbname'] = 'boat';

$dbConnection = buildDatabaseConnection($config);

try {
  $sql = 'SELECT email, nickname, token FROM users INNER JOIN email_tokens ON users.id = email_tokens.id WHERE status = 0 AND regdate + 24*60*60 < UNIX_TIMESTAMP()';
  $stmt = $dbConnection->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll();
} catch (PDOException $e) {
  notifyOnException('Database Select', $config, $sql, $e);
}

foreach ($rows as $row) {
  $nickname = $row['nickname'];
  $token = $row['token'];

  sendEmail($row['email'], 'Summerbo.at Email Confirmation Reminder', "Dear $nickname,

you have not yet confirmed your email address for your Summerbo.at registration.
If you don't confirm your email in the next 24 hours, your reservation for your ticket will be cancelled and you will have to register again.

To confirm your email, simply follow this link: <a href=\"https://reg.summerbo.at/confirm?token=$token\">https://reg.summerbo.at/confirm?token=$token</a>

If you have any questions, please send us a message. Simply reply to this e-mail or contact us via Telegram at <a href=\"https://t.me/summerboat\">https://t.me/summerboat</a>.", true, false);
  echo $nickname . ' ' . $row['email'] . "\n";
  sleep(10);
}
