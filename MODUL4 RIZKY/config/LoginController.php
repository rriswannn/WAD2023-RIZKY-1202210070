<?php

require 'connect.php';

function login($input) {

    global $db;
        $email = $input['email'];
        $password = $input['password'];

$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($db, $query);


    if(mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_assoc($result);
    if(password_verify($password, $data['password'])) {



            $_SESSION['login'] = true ;
            $_SESSION['id'] = $data['id']; 
            if(isset($input['remember'])) {
                setcookie('id', $data['id'], time() + 3600);
            }
        }
        else {
            $_SESSION['message'] = 'Password salah!';
            $_SESSION['color'] = 'danger';
        }
        }
    // (5) Buat kondisi else, kemudian di dalamnya
    //     Buat variabel session dengan key message untuk menampilkan pesan error ketika email tidak ditemukan
    else {
        $_SESSION['message'] = 'Email tidak ditemukan!';
        $_SESSION['color'] = 'danger';
    }
    // 
}
// 

// function untuk fitur "Remember Me"
function rememberMe($cookie)
{
    // (6) Panggil variabel global $db dari file config
    global $db;
    // 

    // (7) Ambil nilai cookie yang ada
    $id = $cookie['id'];
    // 

    // (8) Buat dan lakukan query untuk mencari data dengan id yang sama
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($db, $query);
    // 

    // (9) Buatlah perkondisian ketika id ditemukan ( gunakan mysqli_num_rows == 1 )
        if(mysqli_num_rows($result) == 1) {
        // a. Simpan hasil query menjadi array asosiatif menggunakan fungsi mysqli_fetch_assoc
            $data = mysqli_fetch_assoc($result);
        // b. Set variabel session dengan key login untuk menyimpan status login
        $_SESSION['login'] = true;
        // c. Set variabel session dengan key id untuk menyimpan id user
        $_SESSION['email'] = $data['email'];
        }
    // 
}
// 

?>