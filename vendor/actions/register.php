<?php
//session_start();
require_once('../helpers.php');
print_r($_POST);

$avatar_path = null;
$name = $_POST['registration-name'] ?? null;
$email = $_POST['registration-email'] ?? null;
$password = $_POST['registration-password'] ?? null;
$password_confirmation = $_POST['registration-password-confirm'] ?? null;
$avatar = $_FILES['registration-image'] ?? null;

//$_SESSION['validation'] = [];

if (empty($name)) {
  addValidationError('name', 'Неверное имя');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  addValidationError('email', 'Указана неправильная почта');
}

if (empty($password)) {
  addValidationError('password', 'Пароль пустой');
}

if ($password !== $password_confirmation) {
  addValidationError('password', 'Пароли не совпадают');
}

if (!empty($avatar)) {
  $types = ['image/jpeg', 'image/jpg', 'image/png'];
  
  if (!in_array($avatar['type'], $types)) {
    addValidationError('avatar', 'Неподдерживаемый тип изображения. Поддерживаемые типы: .jpeg, .jpg, .png');
  }
  
  if (($avatar['size'] / 1000000) >= 1) {
    addValidationError('avatar', 'Изображение должно быть меньше 1 Мб');
  }
}

if (!empty($_SESSION['validation'])) {
  addOldValue('name', $name);
  addOldValue('email', $email);
  redirect("/registration/registration.php");
}

if (!empty($avatar)) {
  $avatar_path = uploadFile($avatar, 'avatar');
}

$pdo = getPDO();

$query = "INSERT INTO users (name, email, password, avatar) VALUES (:name, :email, :password, :avatar)";
$params = [
  'name' => $name,
  'email' => $email,
  'password' => password_hash($password, PASSWORD_DEFAULT),
  'avatar' => $avatar_path
];
$stmt = $pdo->prepare($query);
try {
  $stmt->execute($params);
} catch (\Exception $e) {
  die($e->getMessage());
}

var_dump($avatar_path);

redirect("/registration/login.php");
?>