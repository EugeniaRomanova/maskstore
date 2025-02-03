<?php
require_once('../vendor/helpers.php');
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
            <li class="header__menu-item menu-item-checked"><a href="../catalog/catalog1.php">Каталог</a></li>
            <li class="header__menu-item"><a href="#">Блог</a></li>
            <li class="header__menu-item"><a href="#">Обо мне</a></li>
            <li class="header__menu-item"><a href="#">Вход</a></li>
          </ul>
        </header>
        <main class="catalog__main">
          <div class="main__navigation">
            <ul class="navigation__breadcrumps">
              <li class="navigation__breadcrumps--item"><a class="navigation__breadcrumps--link" href="../index.html">Главная</a></li>
              <li class="navigation__breadcrumps--item"><a class="navigation__breadcrumps--link" href="#">Вход</a></li>
            </ul>
          </div>
          <form class="login-form" action="../vendor/actions/log.php" method="post" enctype="multipart/form-data">
            <h2 class="login-form__header form__header">Вход</h2>
            <label class="input-label" for="log-email">Почта<input class="login-email form-field" id="log-email" type="text" name="login-email" placeholder="malcarpeza@gmail.com" value="<?php echo old('email') ?>" <?php validationErrorAttr('email');?>></label>
            <?php if(hasValidationError('email')): ?>
            <small><?php getErrorMessage('email'); ?></small>
            <?php endif; ?>
            <label class="input-label" for="log-password">Пароль<input class="login-password form-field" id="log-password" type="password" name="login-password" placeholder="halloweenface"<?php validationErrorAttr('password');?>></label>
            <?php if(hasValidationError('password')): ?>
            <small><?php getErrorMessage('password'); ?></small>
            <?php endif; ?>
            <button class="login-button submit-button" type="submit" name="submit-button">Войти</button>
            <?php if(hasLoginMessage('error')): ?>
            <div class="login__error">
              <small style="color: white;"><?php echo getLoginMessage('error'); ?></small>
            </div>
            <?php endif; ?>
            <small class="login__to-registration">У меня еще нет <a href="registration.php">аккаунта</a></small>
          </form>
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