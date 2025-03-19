<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "users_db";

$conn = new mysqli($host, $user, $password, $database);

if ($conn-> connection_error) {
    die("Connection failed: ". $conn->connect_error);
}

?>