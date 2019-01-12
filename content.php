<?php
session_start();

if ($_POST['unlogin']) {
  session_destroy();
  header("Location: login.php");
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

<?php
echo "Привет," .$_SESSION['login'] ."<br>";
?>
<img src="default-banner.jpg" width="600" style="display: block" alt="picture"><br>
<form method="POST">
  <input type="submit" name="unlogin" value="На страницу авторизации">
</form>

</body>

