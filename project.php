<?php

include 'home.html';
include 'config.php';

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    if ($password == $cpassword) {
    $sql = $conn->prepare("INSERT INTO studentlog (name, email, password, cpassword) VALUES (?, ?, ?, ?)");
    $sql->bindParam(1, $name);
    $sql->bindParam(2, $email);
    $sql->bindParam(3, $password);
    $sql->bindParam(4, $cpassword);
    if($sql->execute()){
        header('location:home.html');
    }
    }
    else {
        echo "<script>alert('password and confirm password is not same')</script>";
    }
}
?>