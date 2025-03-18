<?php 
include 'connect.php';

if(isset($_POST['signIn'])){
    $email = $_POST['email'];
    $password = $_POST['password']; // Removed md5 hashing

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header("Location: homepage.php");
        exit();
    } else {
        echo "Not Found, Incorrect Email or Password";
    }
}
?>
