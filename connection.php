<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "nielitdb";
$port = 3308;

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
?>
