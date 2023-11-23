<?php

require 'connect.php';
session_start();
    $email = $_POST['email'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
$query1 = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($db,$query1);


// (4) Buatlah perkondisian ketika tidak ada data email yang sama ( gunakan mysqli_num_rows == 0 )
    if(mysqli_num_rows($result) == 0){
    // a. Buatlah query untuk melakukan insert data ke dalam database
    $query2 = "INSERT INTO users(email,name,username,password) VALUES('$email','$name','$username','$password')";
    $insert = mysqli_query($db,$query2);
    // b. Buat lagi perkondisian atau percabangan ketika query insert berhasil dilakukan
    if($insert){
        $_SESSION['message']='pendafaran sukses,silahkan login kembali';
        $_SESSION['color']='success';
        header('location: ../views/login.php');
    }else{
        $_SESSION['message']= 'pendaftaran gagal';
    }
 }
    else{
        $_SESSION['message']= 'Username sudah terdaftar';
        header('location: ../views/register.php');
    }

    ?>
