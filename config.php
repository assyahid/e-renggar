<?php 
session_start();
$server ="localhost";
$username ="root";
$password ="";
$db ="e-renggar";

$koneksi =mysqli_connect($server,$username,$password,$db);

if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}


?>