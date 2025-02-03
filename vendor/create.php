<?php
require_once '../config/connect.php';
$photo = $_FILES['mask-image'] ?? null;
$title = $_POST['mask-title'];
$price = $_POST['mask-price'];

function uploadFile(array $file, string $prefix = '') {
  $upload_path = __DIR__ . '/../img/catalog-img';
  
  if (!is_dir('../img/catalog-img')) {
    mkdir($upload_path, 0777, true);
  }
  
  $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
  $file_name = $prefix . '_' . time() . ".$ext";
  
  $path = "$upload_path/$file_name";
  
  if (!move_uploaded_file($file['tmp_name'], $path)) {
    die('Ошибка при загрузке файла на сервер');
  }
  
  return $file_name;
}

$photo_name = uploadFile($photo, 'photo');

mysqli_query($connect, "INSERT INTO `preview_photos` (`id`, `path`) VALUES (NULL, '$photo_name')");
mysqli_query($connect, "INSERT INTO `mask_titles` (`id`, `title`) VALUES (NULL, '$title')");
mysqli_query($connect, "INSERT INTO `mask_prices` (`id`, `price`) VALUES (NULL, '$price')");
mysqli_query($connect, "INSERT INTO `mask_card` (`id`, `photo`, `title_number`, `price_number`) 
                        VALUES (NULL, (SELECT `id` FROM `preview_photos` ORDER BY `id` DESC LIMIT 0,1),
                        (SELECT `id` FROM `mask_titles` ORDER BY `id` DESC LIMIT 0,1),
                        (SELECT `id` FROM `mask_prices` ORDER BY `id` DESC LIMIT 0,1))");

header("Location: ../catalog/catalog1.php");
?>