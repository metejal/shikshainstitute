<?php
$host = 'localhost';
$db_name = 'management';
$db_user = 'root';
$db_password = '';

$conn = new mysqli($host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
