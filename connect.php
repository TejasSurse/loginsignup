<?php

$host="localhost:4306"; // Specify the MySQL port
$user="root";
$pass="root";
$db="login";
$conn=new mysqli($host, $user, $pass, $db);
if($conn->connect_error){
    die("Failed to connect to DB: " . $conn->connect_error);
} else {
    echo "Database connection successful!";
}
?>