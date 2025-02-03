<?php
require_once('../helpers.php');
print_r($_POST);

$email = $_POST['login-email'] ?? null;
$password = $_POST['login-password'] ?? null;

$pdo = getPDO();

$stmt = $pdo->prepare("SELECT * FROM users WHERE `email` = :email");
$stmt->execute(['email' => $email]);


$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
  setLoginMessage('error', "Пользователь $email не найден");
  redirect('/registration/login.php');
}
var_dump($user);

if (empty($email) || !(filter_var($email, FILTER_VALIDATE_EMAIL))) {
  addOldValue('email', $email);
  addValidationError('email', 'Неверный формат электронной почты');
  setLoginMessage('error', 'Ошибка валидации');
  redirect('/registration/login.php');
}

if (password_verify($password, $user['password'])) {
  setLoginMessage('error', 'Неверный пароль');
  redirect('/registration/login.php');
}

$_SESSION['user']['id'] = $user['id'];
redirect('/index.php');
?>