<?php
include '../config.php';
$nama= $_POST['nama'];
$password = md5($_POST['password']);

$sql = mysqli_query($koneksi,"SELECT * FROM users where nama='$nama' AND password='$password' ");

if (mysqli_num_rows($sql)==1) {
	$qry = mysqli_fetch_array($sql);
	$_SESSION['nama'] = $qry['nama'];
	$_SESSION['atasan'] = $qry['atasan'];
	$_SESSION['level'] = $qry['level'];
	$_SESSION['id_user'] = $qry['id_user'];
	$_SESSION['nama_instalasi'] = $qry['nama_instalasi'];
	$_SESSION['nama_kepala_instalasi'] = $qry['nama_kepala_instalasi'];
	$_SESSION['nip'] = $qry['nip'];
	if($qry['level']=="admin"){
		echo "success-admin";
	}
	else if ($qry['level']=="kepala"){
		echo "success-kepala";
	}
	else if ($qry['level']=="koordinator"){
		echo "success-koordinator";
	}
	else if ($qry['level']=="kasubbag"){
		echo "success-kasubbag";
	} 
	else if ($qry['level']=="operator"){
		echo "success-operator";
	}
	else if ($qry['level']=="instalasi"){
		echo "success-instalasi";
	}
	else if ($qry['level']=="subkoord"){
		echo "success-subkoord";
	}
} else {
	echo "error";
}



?>