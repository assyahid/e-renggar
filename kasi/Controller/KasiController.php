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