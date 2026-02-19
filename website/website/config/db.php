<?php
$conn = new mysqli("localhost", "root", "", "usersystem");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>