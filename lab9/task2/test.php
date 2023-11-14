<?php
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['country'])) {
    echo "Ваше имя: " . $_SESSION['name'] . "<br>";
    echo "Ваша страна: " . $_SESSION['country'];
} else {
    echo "Данные отсутствуют.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница с выводом данных</title>
</head>
<body>

</body>
</html>
