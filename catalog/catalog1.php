<?php
  require_once '../config/connect.php';
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/catalog.css">
    <title>Mal Corpse -- Каталог</title>
  </head>
  <body class="catalog__body">
    <div class="container catalog__container">
      <div class="catalog">
        <header class="header catalog__header">
          <a href="../index.php" class="header__logo-address"><img class="header__logo" src="../img/MAL CORPSE.png" alt="Логотип Mal Corpse"></a>
          <ul class="header__menu">
            <li class="header__menu-item menu-item-checked"><a href="#">Каталог</a></li>
            <li class="header__menu-item"><a href="#">Блог</a></li>
            <li class="header__menu-item"><a href="#">Обо мне</a></li>
            <li class="header__menu-item"><a href="#">Корзина</a></li>
          </ul>
        </header>
        <main class="catalog__main">
          <div class="main__navigation">
            <ul class="navigation__breadcrumps">
              <li class="navigation__breadcrumps--item"><a class="navigation__breadcrumps--link" href="../index.html">Главная</a></li>
              <li class="navigation__breadcrumps--item"><a class="navigation__breadcrumps--link" href="#">Каталог</a></li>
            </ul>
            <form class="navigation__search" action="search.php" method="post">
              <label for="search-field" class="visually-hidden">Поиск</label>
              <input type="search" placeholder="Поиск" class="navigation__search--field" id="search-field" name="search_box">
              <button type="submit" class="navigation__search--button" name="search_button">Искать</button>
            </form>
          </div>
          <div class="catalog__add_form">
          <h2 class="add_form__header">Добавить карточку товара</h2>
          <form class="add_form" action="../vendor/create.php" method="post" enctype="multipart/form-data">
            <input class="add_form__photo form-field" type="file" name="mask-image" value="">
            <input class="add_form__title form-field" type="text" name="mask-title" placeholder="Название товара">
            <input class="add_form__price form-field" type="text" name="mask-price" placeholder="Цена товара">
            <button class="add_form__button submit-button" type="submit">Добавить</button>
          </form>
          </div>
          <ul class="catalog__card-list">
            <?php
              $cards = mysqli_query($connect, "SELECT mask_card.id, preview_photos.path, mask_titles.title, mask_prices.price 
                FROM mask_card
                LEFT JOIN preview_photos ON mask_card.photo = preview_photos.id
                LEFT JOIN mask_titles ON mask_card.title_number = mask_titles.id
                LEFT JOIN mask_prices ON mask_card.price_number = mask_prices.id");
              $cards = mysqli_fetch_all($cards);
              
              foreach ($cards as $card) {
                ?>
                <li class="card-list__item">
                  <article class="catalog__card--item">
                    <a href="../catalog-items/item.php?id=<?=$card[0]?>" class="card--item__link"><h2 class="card--item__header"><?=$card[2]?></h2></a>
                    <a href="../catalog-items/item.php?id=<?=$card[0]?>" class="card--item__pic-link">
                      <div class="card--item__photo">
                        <img class="card--item__pic" src="../img/catalog-img/<?=$card[1]?>" alt="<?=$card[2]?>">
                      </div>
                    </a>
                    <a href="../update-card.php?id=<?=$card[0]?>" class="card--item__update-link"></a>
                    <a href="../vendor/delete.php?id=<?=$card[0]?>" class="card--item__delete-link"></a>
                    <div class="card--item__price">
                      <?=$card[3]?> р
                    </div>
                    <div class="card--item__buttons">
                      <button class="card--item__cart-button" type="button" name="button">В корзину</button>
                      <button class="card--item__heart-button" type="button" name="button"></button>
                    </div>
                  </article>
                </li>
                <?php
                }
              ?>
          </ul>
          <ul class="catalog__pages-list">
            <li class="pages-list__item">
            </li>
          </ul>
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