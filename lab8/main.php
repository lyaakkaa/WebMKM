<?php
// Database connection parameters
$dbhost = "localhost";  // Replace with your actual database host
$dbname = "lab8";  // Replace with your actual database name
$dbuser = "postgres";  // Replace with your actual database user
$dbpass = "dimash7628";  // Replace with your actual database password

// Establish a database connection
$conn = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass");
if (!$conn) {
    die("Error connecting to the database");
}

// Query to retrieve data from the "users" table
$query = "SELECT * FROM users";
$result = pg_query($conn, $query);

if (!$result) {
    die("Error in SQL query");
}

// Display the data in a table
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Username</th><th>Password</th></tr>";

while ($row = pg_fetch_assoc($result)) {
    echo "<tr><td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['password']}</td></tr>";
}

echo "</table>";

// Close the database connection
pg_close($conn);
?>
