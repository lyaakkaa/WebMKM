<?php
    session_start();
    if (!isset($_SESSION['page_updates'])) {
        $_SESSION['page_updates'] = 0;
        echo "You have not already restarted this page.";
    } else {
        $_SESSION['page_updates']++;
        echo "You have restarted this page ".$_SESSION['page_updates']." time(s).";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Счетчик обновлений страницы</title>
</head>
<body>
</body>
</html>
