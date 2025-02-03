<?php
  require_once '../config/connect.php';
  $id = $_GET['id'];
  
  mysqli_query($connect, "DELETE FROM mask_card
  WHERE mask_card.id = '$id'");
  mysqli_query($connect, "DELETE FROM preview_photos
  WHERE preview_photos.id NOT IN (SELECT mask_card.photo FROM mask_card)");
  mysqli_query($connect, "DELETE FROM mask_titles
  WHERE mask_titles.id NOT IN (SELECT mask_card.title_number FROM mask_card)");
  mysqli_query($connect, "DELETE FROM mask_prices
  WHERE mask_prices.id NOT IN (SELECT mask_card.price_number FROM mask_card)");

  header("Location: ../catalog/catalog1.php");