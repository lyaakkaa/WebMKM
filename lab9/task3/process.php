<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

$email = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];


    echo "Email: $email <br>";
    echo "Имя: $firstName <br>";
    echo "Фамилия: $lastName <br>";
    echo "Пароль: $password <br>";

    session_destroy();

    echo '<a href="index.php">Ввести новый email</a>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
<h2>Заполните регистрационную форму</h2>
<form method="post" action="process.php">
    <label for="firstName">Имя:</label>
    <input type="text" id="firstName" name="firstName" required><br>

    <label for="lastName">Фамилия:</label>
    <input type="text" id="lastName" name="lastName" required><br>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br>

    <button type="submit">Отправить</button>
</form>
</body>
</html>
