<?php
session_start();

if (isset($_SESSION['email'])) {
    header('Location: process.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $_SESSION['email'] = $email;
    header('Location: process.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Form</title>
</head>
<body>
<h2>Введите ваш email</h2>
<form method="post" action="index.php">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Отправить</button>
</form>
</body>
</html>
