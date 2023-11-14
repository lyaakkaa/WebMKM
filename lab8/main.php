<?php

$dbhost = "localhost";
$dbname = "lab8";
$dbuser = "postgres";
$dbpass = "dimash7628";

$conn = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass");
if (!$conn) {
    die("Error connecting to the database");
}


$query = "SELECT * FROM users";
$result = pg_query($conn, $query);

if (!$result) {
    die("Error in SQL query");
}


echo "<table border='1'>";
echo "<tr><th>ID</th><th>Username</th><th>Password</th></tr>";

while ($row = pg_fetch_assoc($result)) {
    echo "<tr><td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['password']}</td></tr>";
}

echo "</table>";


pg_close($conn);
?>
