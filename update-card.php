<?php
  require_once 'config/connect.php';
  
  $card_id = $_GET['id'];
  $card = mysqli_query($connect, "SELECT * FROM mask_card
    JOIN preview_photos ON mask_card.photo = preview_photos.id
    JOIN mask_titles ON mask_card.title_number = mask_titles.id
    JOIN mask_prices ON mask_card.price_number = mask_prices.id
    WHERE mask_card.id = '$card_id'");
  $card = mysqli_fetch_assoc($card);
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/catalog.css">
    <title>Mal Corpse -- Каталог</title>
  </head>
  <body class="catalog__body">
    <div class="container catalog__container">
      <div class="catalog">
        <header class="header catalog__header">
          <a href="index.html" class="header__logo-address"><img class="header__logo" src="img/MAL CORPSE.png" alt="Логотип Mal Corpse"></a>
          <ul class="header__menu">
            <li class="header__menu-item menu-item-checked"><a href="#">Каталог</a></li>
            <li class="header__menu-item"><a href="#">Блог</a></li>
            <li class="header__menu-item"><a href="#">Обо мне</a></li>
            <li class="header__menu-item"><a href="#">Корзина</a></li>
          </ul>
        </header>
        <main class="catalog__main">
          <article class="update__item">
      <h2 class="update__header">Изменение карточки товара</h2>
      <div class="update__item-photo">
          <img class="item-photo__pic" src="img/catalog-img/<?=$card['path']?>.png" alt="<?=$card['title']?>">
      </div>
      <form class="add_form" action="vendor/update.php" method="post">
        <input type="hidden" name="photo-id" value="<?=$card['photo']?>">
        <input type="hidden" name="title-id" value="<?=$card['title_number']?>">
        <input type="hidden" name="price-id" value="<?=$card['price_number']?>">
        <input class="add_form__photo" type="text" name="update-photo" value="<?=$card['path']?>">
        <input class="add_form__title" type="text" name="update-title" value="<?=$card['title']?>">
        <input class="add_form__price" type="text" name="update-price" value="<?=$card['price']?>">
        <button class="add_form__button" type="submit">Изменить товар</button>
      </form>
          </article>
        </main>
        <footer class="catalog__footer footer">
          <ul class="footer__nav">
            <li class="footer__nav-item"><a href="#" class="footer__nav-link">Каталог</a></li>
            <li class="footer__nav-item"><a href="#" class="footer__nav-link">Блог</a></li>
            <li class="footer__nav-item"><a href="#" class="footer__nav-link">Обо мне</a></li>
          </ul>
          <div class="footer__logo">
            <span class="footer__logo-description">Маски от Мэла Корпс<span class="footer__logo-heart">()</span></span>
          </div>
          <ul class="footer__media-list">
            <li class="media-list__item media-list__item-vk">
              <a href="https://vk.com/halloweenfaces" class="media-list__link media-list__link-vk">В</a>
            </li>
            <li class="media-list__item media-list__item-inst">
              <a href="https://www.instagram.com/corpse_mal_masks/" class="media-list__link media-list__link-inst">И</a>
            </li>
            <li class="media-list__item media-list__item-tg">
              <a href="#" class="media-list__link media-list__link-tg">Т</a>
            </li>
          </ul>
        </footer>
      </div>
    </div>
  </body>
</html>