<?php 
include '../../config.php';
if(isset($_POST['submit']) && $_POST['submit'] == "Tambah Pegawai"){
	$data = $_POST;
	$query = "INSERT INTO `pegawai` ( `nip`,`nama`,`jabatan`,`pendidikan`,`pangkat_golongan`,`keterangan`,`id_user`)VALUES('".$_POST['nip']."','".$_POST['nama']."','".$_POST['jabatan']."','".$_POST['pendidikan']."','".$_POST['pangkat_golongan']."','".$_POST['keterangan']."','".$_POST['id_user']."');";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../master_pegawai.php?message=Berhasil!!, Data pegawai berhasil ditambahkan');
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../master_pegawai.php?message=Gagal!, '.$err);
	}

}

if(isset($_POST['submit']) && $_POST['submit'] == "Tambah Peralatan"){
	$data = $_POST;
	$query = "INSERT INTO `peralatan` ( `nama_peralatan`,`jenis`,`satuan`,`jumlah`,`keterangan`,`id_user`)VALUES('".$_POST['nama']."','".$_POST['jenis']."','".$_POST['satuan']."','".$_POST['jumlah']."','".$_POST['kondisi']."','".$_SESSION['id_user']."');";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../master_peralatan.php?message=Berhasil!!, Data peralatan berhasil ditambahkan');
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../master_peralatan.php?message=Gagal!, '.$err);
	}
}


if(isset($_POST['submit']) && $_POST['submit'] == "Tambah Justifikasi"){
	$data = $_POST;

	$query = "INSERT INTO `justifikasi` ( `id_barang`,`spesifikasi_umum`,`alasan_kebutuhan`,`manfaat`,`jumlah_unit`,`ket_justifikasi`,`id_proker`,`id_user`)VALUES('".$_POST['id_barang']."','".$_POST['spesifikasi_umum']."','".$_POST['alasan_kebutuhan']."','".$_POST['manfaat']."','".$_POST['jumlah_unit']."','".$_POST['ket_justifikasi']."','".$_POST['id_proker']."','".$_SESSION['id_user']."');";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../kak.php?id_surat='.$_POST["id_surat"]."&id_proker=".$_POST["id_proker"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../kak.php?id_surat='.$_POST["id_surat"]."&id_proker=".$_POST["id_proker"]);
	}
}

if(isset($_POST['submit']) && $_POST['submit'] == "Ya, Kirim Proker saya"){
	$data = $_POST;
	// ambil atasan terleih dahulu
	$atasan = "SELECT * FROM users WHERE id_user = ".$_SESSION['atasan'];
	$query = mysqli_query($koneksi,$atasan);
	$usr_atasan = mysqli_fetch_array($query);
	// var_dump($_SESSION['atasan']);
	// exit();
	// end
	$query = "UPDATE proker SET sent = 1,tanggal_kirim='".date("Y-m-d")."',posisi='".$usr_atasan["nama"]."',status='proses' WHERE id_proker = ".$data["id_proker"]."";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../detail-proker.php?id_surat='.$data["id_surat"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../detail-proker.php?id_surat='.$data["id_surat"]);
	}
}