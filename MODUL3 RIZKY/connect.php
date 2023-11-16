<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->


<?php
// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$hostname = "localhost:3308";
$user = "root";
$password = "";
$database = "modul3_wad";

$conn = mysqli_connect("localhost:3308","root","","modul3_wad");
// 
  
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya
if ($conn->connect_error) {
        die("connection failed:". $conn->connect_error);
}
else {
    echo"Mantap wir Connected Successfully";
}
// 
?>