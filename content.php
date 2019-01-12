<?php
session_start();

if ($_POST['unlogin']) {
  session_destroy();
  header("Location: login.php");
} elseif ($_POST['register']) {
  session_destroy();
  header("Location: register.php");
}

if (isset($_COOKIE['color'])) {
  echo '<body bgcolor="'.$_COOKIE['color'].'">';
}
?>

<style>
  body {
    font-size: 40px;

  }
  p, input{
    margin: 30px;
  }
  input {
    font-size: 30px;
    text-transform: uppercase
  }
</style>

<body>

<p>Сайт только для авторизованных пользователей</p>
<img src="default-banner.jpg" width="1000" style="display: block; margin-left: 40px;" alt="picture"><br>
<?php
if ($_SESSION['login']) {
  echo "Привет," .$_SESSION['login'] ."<br>";
?>

<?php } else {?>
<form method="POST">
  <input type="submit" name="unlogin" value="На страницу авторизации">
  <input type="submit" name="register" value="На страницу регистрации">
</form>
<?php } ?>
</body>

