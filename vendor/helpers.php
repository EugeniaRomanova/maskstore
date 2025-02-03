<?php 
session_start();
require_once __DIR__ . '\config.php';
function redirect(string $path) {
  header("Location: $path");
  die();
}

function getPDO() {
  try {
    return new \PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME,  DB_USERNAME, DB_PASSWORD);
  } catch (\PDOException $e) {
    die($e->getMessage());
  }
}

function addOldValue(string $key, $value) {
  $_SESSION['old'][$key] = $value;
}

function old(string $key) {
  $value = $_SESSION['old'][$key] ?? '';
  unset($_SESSION['old'][$key]);
  return $value;
}

function addValidationError(string $fieldName, string $message) {
  $_SESSION['validation'][$fieldName] = $message;
}

function hasValidationError(string $fieldName) {
  return isset($_SESSION['validation'][$fieldName]);
}

function validationErrorAttr(string $fieldName) {
  echo isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

function getErrorMessage(string $fieldName) {
  $message = $_SESSION['validation'][$fieldName] ?? '';
  unset($_SESSION['validation'][$fieldName]);
  echo $message;
}

function uploadFile(array $file, string $prefix = '') {
  $upload_path = __DIR__ . '/../img/uploads';
  
  if (!is_dir('/../img/uploads')) {
    mkdir($upload_path, 0777, true);
  }
  
  $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
  $file_name = $prefix . '_' . time() . ".$ext";
  
  $path = "$upload_path/$file_name";
  
  if (!move_uploaded_file($file['tmp_name'], $path)) {
    die('Ошибка при загрузке файла на сервер');
  }
  
  return "uploads/$file_name";
}

function setLoginMessage($key, $message) {
  $_SESSION['message'][$key] = $message;
}

function hasLoginMessage($key) {
  return isset($_SESSION['message'][$key]);
}

function getLoginMessage($key) {
  $message = $_SESSION['message'][$key] ?? null;
  unset($_SESSION['message'][$key]);
  return $message;
}
?>