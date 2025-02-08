<?php
require_once('../vendor/helpers.php');
//$_SESSION['validation'] = [];
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="googlebot" content="noindex, nofollow" />
    <meta name="yandex" content="noindex, nofollow" />
    <link rel="stylesheet" href="../style/catalog.css">
    <title>Mal Corpse -- Регистрация</title>
  </head>
  <body class="catalog__body">
    <div class="container catalog__container">
      <div class="catalog">
        <?php include("../app/header.php"); ?>
        <main class="catalog__main">
          <div class="main__navigation">
            <ul class="navigation__breadcrumps">
              <li class="navigation__breadcrumps--item"><a class="navigation__breadcrumps--link" href="../index.html">Главная</a></li>
              <li class="navigation__breadcrumps--item"><a class="navigation__breadcrumps--link" href="#">Регистрация</a></li>
            </ul>
          </div>
          <form class="registration-form" action="../vendor/actions/register.php" method="post" enctype="multipart/form-data">
            <h2 class="registration-form__header form__header">Регистрация</h2>
            <label class="input-label" for="reg-name">Ваше имя<input class="registration-name form-field" id="reg-name" type="text" name="registration-name" placeholder="Дормидонт" value="<?php echo old('name') ?>" <?php validationErrorAttr('name');?>></label>
            <?php if(hasValidationError('name')): ?>
            <small><?php getErrorMessage('name'); ?></small>
            <?php endif; ?>
            <label class="input-label" for="reg-email">Почта<input class="registration-email form-field" id="reg-email" type="text" name="registration-email" placeholder="malcarpeza@gmail.com" value="<?php echo old('email') ?>" <?php validationErrorAttr('email');?>></label>
            <?php if(hasValidationError('email')): ?>
            <small><?php getErrorMessage('email'); ?></small>
            <?php endif; ?>
            <label class="input-label" for="reg-password">Пароль<input class="registration-password form-field" id="reg-password" type="password" name="registration-password" placeholder="halloweenface"<?php validationErrorAttr('password');?>></label>
            <?php if(hasValidationError('password')): ?>
            <small><?php getErrorMessage('password'); ?></small>
            <?php endif; ?>
            <label class="input-label" for="reg-password-confirm">Подтверждение </br>пароля<input class="registration-password-confirm form-field" id="reg-password-confirm" type="password" name="registration-password-confirm" placeholder="halloweenface"></label>
            <label class="input-label" for="reg-image">Аватар<input class="registration-image form-field" id="reg-image" type="file" name="registration-image" <?php validationErrorAttr('avatar');?>></label>
            <?php if(hasValidationError('avatar')): ?>
            <small><?php getErrorMessage('avatar'); ?></small>
            <?php endif; ?>
            <button class="registration-button submit-button" type="submit" name="registration-button">Зарегистрироваться</button>
            <small class="registration__to-login">У меня уже есть <a href="login.php">аккаунт</a></small>
          </form>
        </main>
        <?php include("../app/footer.php"); ?>
      </div>
    </div>
  </body>
</html>
        