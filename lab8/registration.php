<?php
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


    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $result = pg_query($conn, $query);

    if ($result) {
        echo "Registration successful. <a href='login.html'>Log in</a>";
    } else {
        echo "Error during registration.";
    }
}

// Close the database connection
pg_close($conn);
?>
