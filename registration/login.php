<?php
require_once('../vendor/helpers.php');
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/catalog.css">
    <title>Mal Corpse -- Вход</title>
  </head>
  <body class="catalog__body">
    <div class="container catalog__container">
      <div class="catalog">
        <?php include("../app/header.php"); ?>
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
        <?php include("../app/footer.php"); ?>
      </div>
    </div>
  </body>
</html>