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

    // You should perform input validation and hash the password here for security

    // Insert user data into the "users" table
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
