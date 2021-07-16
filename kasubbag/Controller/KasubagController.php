<?php 
include '../../config.php';
if(isset($_POST['submit']) && $_POST['submit'] == "Revisi Proker ini"){
	$data = $_POST;
	$query = "UPDATE proker SET sent=0,status='revisi',catatan='".$data['catatan']."' WHERE id_proker=".$data['id_proker'];
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../usulan-proker.php');
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../usulan-proker.php');
	}
}

if(isset($_POST['submit']) && $_POST['submit'] == "Verifikasi  Proker ini"){
	$data = $_POST;
	$query = "UPDATE proker SET status='diverifikasi' WHERE id_proker=".$data['id_proker'];
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../usulan-proker.php');
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../usulan-proker.php');
	}
}

if(isset($_POST['submit']) && $_POST['submit'] == "Verifikasi usulan ini"){
	$data = $_POST;
	$query = "UPDATE usulan SET status='diverifikasi oleh Kasubbag Administrasi Umum',sent=3, posisi='Koordinator Tata Usaha' WHERE id_usulan=".$data['id_usulan'];
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../usulan-belanja.php');
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../usulan-belanja.php');
	}
}

if(isset($_GET['aksi']) && $_GET['aksi'] == "setujui_alkes_kasi"){
	$data = $_GET;
	$query = "UPDATE usulan_barang SET persetujuan='1' WHERE id_usulan=".$data['id_usulan'];
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../alkes.php');
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../alkes.php');
	}
}

if(isset($_POST['update']) && $_POST['update'] == "Validasi Usulan Barang Reagen"){
	$data = $_POST;

	$query = "UPDATE `reagen` 
	SET
	`id_user` = '".$_POST['id_user']."',
	`id_usulan` = '".$_POST['id_usulan']."', 
	`id_barang` = '".$_POST['id_barang']."', 
	`jumlah_usulan` = '".$_POST['jumlah_usulan']."', 
	`ket_reagen` = '".$_POST['ket_reagen']."',
	`status_reagen` = 'divalidasi oleh Kasubbag Administrasi Umum'
	
	WHERE
	`id_reagen` = '".$_POST['id_reagen']."' ;
";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../reagen.php?message=Data Reagen berhasil divalidasi,'.'&id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../reagen.php?id_usulan='.$_POST["id_usulan"]);
	}
}

if(isset($_POST['update']) && $_POST['update'] == "Validasi Usulan Barang"){
	$data = $_POST;

	$query = "UPDATE `usulan_barang` 
	SET
	`id_usulan` = '".$_POST['id_usulan']."', 
	`id_barang` = '".$_POST['id_barang']."', 
	`jumlah_tersedia` = '".$_POST['jumlah_tersedia']."', 
	`kondisi` = '".$_POST['kondisi']."', 
	`jumlah_kebutuhan` = '".$_POST['jumlah_kebutuhan']."', 
	`justifikasi` = '".$_POST['justifikasi']."',
	`persetujuan` = 'divalidasi oleh Kasubbag Administrasi Umum'
	
	WHERE
	`id_usulan_barang` = '".$_POST['id_usulan_barang']."' ;
";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../alkes.php?message=update,'.'&id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../alkes.php?id_usulan='.$_POST["id_usulan"]);
	}
}

