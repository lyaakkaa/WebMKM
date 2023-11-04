<?php
// Database connection parameters
$dbhost = "localhost";
$dbname = "lab8";
$dbuser = "postgres";
$dbpass = "dimash7628";

// Establish a database connection
$conn = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass");
if (!$conn) {
    die("Error connecting to the database");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query the database to check if the username and password match
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = pg_query($conn, $query);

    if (pg_num_rows($result) > 0) {
        echo "Login successful.";
    } else {
        echo "Login error. Check your username and password.";
    }
}

// Close the database connection
pg_close($conn);
?>
