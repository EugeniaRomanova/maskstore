<?php
  require_once '../config/connect.php';
  
  $photo_id = $_POST['photo-id'];
  $title_id = $_POST['title-id'];
  $price_id = $_POST['price-id'];
  $photo = $_POST['update-photo'];
  $title = $_POST['update-title'];
  $price = $_POST['update-price'];
  
  mysqli_query($connect, "UPDATE `preview_photos` SET `path` = '$photo' WHERE `preview_photos`.`id` = '$photo_id'");
  mysqli_query($connect, "UPDATE `mask_titles` SET `title` = '$title' WHERE `mask_titles`.`id` = '$title_id'");
  mysqli_query($connect, "UPDATE `mask_prices` SET `price` = '$price' WHERE `mask_prices`.`id` = '$price_id'");
  header("Location: ../catalog/catalog1.php");
?>
