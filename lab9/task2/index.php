<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['country']) && isset($_POST['name'])) {
        $_SESSION['country'] = $_POST['country'];
        $_SESSION['name'] = $_POST['name'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница выбора страны и ввода имени</title>
</head>
<body>
<h2>Введите свои данные</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="country">Страна:</label>
    <select id="country" name="country" required>
        <option value="Казахстан">Казахстан</option>
        <option value="Россия">Россия</option>
        <option value="США">США</option>
        <option value="Великобритания">Великобритания</option>
    </select>
    <br>
    <button type="submit">Отправить</button>
</form>
<p><a href="test.php">Перейти на страницу test.php</a></p>
</body>
</html>
