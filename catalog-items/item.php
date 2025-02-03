<?php  
require_once '../app/header.php';
require_once '../config/connect.php';

$item_id = $_GET['id'];
$item = mysqli_query($connect, "SELECT * FROM mask_card
  JOIN preview_photos ON mask_card.photo = preview_photos.id
  JOIN mask_titles ON mask_card.title_number = mask_titles.id
  JOIN mask_prices ON mask_card.price_number = mask_prices.id
  JOIN mask_descriptions ON mask_card.description_number = mask_descriptions.id
  WHERE mask_card.id = '$item_id'");
$item = mysqli_fetch_assoc($item);
?>
<main class="catalog-item__main">
  <div class="main__navigation">
    <ul class="navigation__breadcrumps">
      <li class="navigation__breadcrumps--item"><a class="navigation__breadcrumps--link" href="../index.php">Главная</a></li>
      <li class="navigation__breadcrumps--item"><a class="navigation__breadcrumps--link" href="../catalog/catalog1.php">Каталог</a></li>
      <li class="navigation__breadcrumps--item"><?=$item['title']?></li>
    </ul>
    <form class="navigation__search" action="index.html" method="post">
      <label for="search-field" class="visually-hidden">Поиск</label>
      <input type="search" placeholder="Поиск" class="navigation__search--field" id="search-field" name="seach_box">
    </form>
  </div>
  <section class="catalog-item__section">
    <div class="catalog-item__gallery">
      <button class="gallery__main-bigger" type="button" name="button"><img src="../img/item-gallery/<?=substr($item['path'], 0, -4)?>/main.jpg" alt="<?=$item['title']?>" class="gallery__main"></button>
      <button type="button" name="button" class="gallery__main--button"></button>
      <div class="gallery__little">
        <img src="../img/item-gallery/<?=substr($item['path'], 0, -4)?>/main.jpg" alt="<?=$item['title']?>" class="gallery__little--item gallery__little--item-current">
        <img src="../img/item-gallery/<?=substr($item['path'], 0, -4)?>/thumb1.jpg" alt="<?=$item['title']?>" class="gallery__little--item">
        <img src="../img/item-gallery/<?=substr($item['path'], 0, -4)?>/thumb2.jpg" alt="<?=$item['title']?>" class="gallery__little--item">
        <img src="../img/item-gallery/<?=substr($item['path'], 0, -4)?>/thumb3.jpg" alt="<?=$item['title']?>" class="visually-hidden gallery__little--item">
        <img src="" alt="" class="visually-hidden gallery__little--item">
        <button type="button" name="button" class="gallery__little--button"></button>
      </div>
    </div>
    <div class="catalog-item__info">
      <div class="catalog-item__header-container">
        <h1 class="catalog-item__heading"><?=$item['title']?></h1>
        <span class="catalog-item__availability">В наличии</span>
      </div>
      <div class="catalog-item__price-container">
        <span class="catalog-item__price"><?=$item['price']?> р</span>
        <div class="catalog-item__buttons-container">
          <button class="catalog-item__cart-button" type="button" name="button">В корзину</button>
          <button class="catalog-item__heart-button" type="button" name="button"></button>
        </div>
      </div>
    </div>
  </section>
  <section class="catalog-item__description">
    <div class="catalog-item__heading-container">
      <h2 class="catalog-item__description-heading">Описание</h2>
      <button class="catalog-item__description-hide" type="button" name="button"></button>
    </div>
      <div class="catalog-item__description-text">
        <?=$item['description']?>
      </div>
  </section>
<?php 
require_once '../app/more-section.php';
require_once '../app/footer.php';
?>