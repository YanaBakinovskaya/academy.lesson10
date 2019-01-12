<?php
session_start();
$connection = new PDO('mysql:host=localhost; dbname=academy; charset=utf8', 'root', '');
$login = $connection->query('SELECT * FROM `login`');

if ($_POST['login']) {
  setcookie('color', $_POST['color'], time() + 3600);
  foreach ($login as $log) {
    if ($_POST['login'] == $log['login'] && $_POST['password'] == $log['password']) {
      $_SESSION['login'] = $_POST['login'];
      $_SESSION['password'] = $_POST['password'];
      header("Location: content.php");
    }
  }

  echo "Неверный логин или пароль";
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
  <p>Авторизуйтесь</p>
  <input type="text" name="login" placeholder="Логин" required> <br>
  <input type="password" name="password" placeholder="Пароль" required> <br>
  <label for="color">Выберите цвет</label>
  <select name="color" id="color">
    <!--    <option disabled selected>Выберите цвет</option>-->
    <option value="red">Красный</option>
    <option value="#000000">Черный</option>
    <option value="gray">Серый</option>
    <option value="green">Зеленый</option>
  </select>
  <input type="submit">
</form>

<?php
