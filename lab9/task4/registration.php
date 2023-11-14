<?php
session_start();

$dbhost = "localhost";
$dbname = "lab8";
$dbuser = "postgres";
$dbpass = "dimash7628";

$conn = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass");
if (!$conn) {
    die("Error connecting to the database");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "INSERT INTO users (username, password) VALUES ($1, $2)";
    $result = pg_query_params($conn, $query, array($username, $password));

    if ($result) {
        $_SESSION["username"] = $username; // Создаем сессионный флаг
        header("Location: welcome.php"); // Перенаправляем пользователя на страницу приветствия
        exit();
    } else {
        echo "Error during registration.";
    }
}

pg_close($conn);
?>
