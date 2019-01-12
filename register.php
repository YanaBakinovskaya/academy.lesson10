<?php
session_start();
$connection = new PDO('mysql:host=localhost; dbname=academy; charset=utf8', 'root', '');
//$login = $connection->query('SELECT * FROM `login`');

if ($_POST['login'] && $_POST['password']) {
  $userLogin = $_POST['login'];
  $userPassword = $_POST['password'];
  $register = $connection->query("INSERT INTO `academy`.`login` (`login`, `password`) VALUES ('$userLogin', '$userPassword')");
  header("Location: content.php");
  die();
}

if ($_SESSION['login'] || $_SESSION['password']) {
  header("Location: content.php");
  die();
}
?>
<style>
  body {
    margin: 200px 300px;
  }
  input, p {
    font-size: 30px;
    margin: 10px;
  }
</style>
<form method="POST">
  <p>Зарегистрируйтесь</p>
  <input type="text" name="login" placeholder="Ваш логин" required> <br>
  <input type="password" name="password" placeholder="Ваш пароль" required> <br>
  <input type="submit">
</form>

