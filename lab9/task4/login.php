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

    $query = "SELECT * FROM users WHERE username=$1 AND password=$2";
    $result = pg_query_params($conn, $query, array($username, $password));

    if (pg_num_rows($result) > 0) {
        $_SESSION["username"] = $username;
        $_SESSION["login_time"] = time();
        header("Location: welcome.php");
        exit();
    } else {
        echo "Login error. Check your username and password.";
    }
}

pg_close($conn);
?>
