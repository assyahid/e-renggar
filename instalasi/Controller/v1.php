<?php 
include '../../config.php';
if(isset($_POST['submit']) && $_POST['submit'] == "Tambah Pegawai"){
	$data = $_POST;
	$query = "INSERT INTO `pegawai` ( `nip`,`nama`,`jabatan`,`pendidikan`,`pangkat_golongan`,`keterangan`,`id_user`)VALUES('".$_POST['nip']."','".$_POST['nama']."','".$_POST['jabatan']."','".$_POST['pendidikan']."','".$_POST['pangkat_golongan']."','".$_POST['keterangan']."','".$_SESSION['id_user']."');";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../master_pegawai.php?message=Berhasil!!, Data pegawai berhasil ditambahkan');
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../master_pegawai.php?message=Gagal!, '.$err);
	}

}

if(isset($_POST['submit']) && $_POST['submit'] == "Buat Usulan"){
	$data = $_POST;
	$query = "INSERT INTO `usulan` (`id_user`,`no_usulan`,`tgl_usulan`,`sent`)VALUES('".$_SESSION['id_user']."','".$_POST['no_usulan']."','".$_POST['tgl_usulan']."','0');";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../usulan.php?message=Berhasil!!, Data usulan berhasil ditambahkan');
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../usulan.php?message=Gagal!, '.$err);
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

if(isset($_POST['submit']) && $_POST['submit'] == "Tambah Usulan Barang"){
	$data = $_POST;

	$query = "INSERT INTO `usulan_barang` (`id_usulan_barang`,`id_usulan`,`id_barang`,`jumlah_tersedia`,`kondisi`,`jumlah_kebutuhan`,`justifikasi`)
	VALUES('','".$_POST['id_usulan']."','".$_POST['id_barang']."','".$_POST['jumlah_tersedia']."','".$_POST['kondisi']."','".$_POST['jumlah_kebutuhan']."','".$_POST['justifikasi']."');";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		$tampil = mysqli_query($koneksi,"SELECT * FROM usulan_barang ORDER BY id_usulan_barang DESC LIMIT 1 ")or die(mysql_error());
		$x = mysqli_fetch_array($tampil);
		$id_alkes = $x['id_alkes'];
		$merek = mysqli_query($koneksi,"INSERT INTO `merek_barang` (`id_usulan_barang`,`nama_merek`,`spesifikasi_merek`,`harga_merek`) VALUES ('".$id_usulan_barang."','".$_POST['nama_merek']."','".$_POST['spesifikasi_merek']."','".$_POST['harga_merek']."') ");
		header('Location: ../alkes.php?id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../alkes.php?id_usulan='.$_POST["id_usulan"]);
	}
}

if(isset($_POST['submit']) && $_POST['submit'] == "Tambah Merek"){
	$data = $_POST;

	$query = "INSERT INTO `merek_barang` (`id_usulan_barang`,`nama_merek`,`spesifikasi_merek`,`harga_merek`) VALUES ('".$_POST['id_usulan_barang']."','".$_POST['nama_merek']."','".$_POST['spesifikasi_merek']."','".$_POST['harga_merek']."') ";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../alkes.php?id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../alkes.php?id_usulan='.$_POST["id_usulan"]);
	}
}

if(isset($_POST['update']) && $_POST['update'] == "Update Usulan Barang"){
	$data = $_POST;

	$query = "UPDATE `usulan_barang` 
	SET
	`id_usulan` = '".$_POST['id_usulan']."', 
	`id_barang` = '".$_POST['id_barang']."', 
	`jumlah_tersedia` = '".$_POST['jumlah_tersedia']."', 
	`kondisi` = '".$_POST['kondisi']."', 
	`jumlah_kebutuhan` = '".$_POST['jumlah_kebutuhan']."', 
	`justifikasi` = '".$_POST['justifikasi']."'
	
	WHERE
	`id_usulan_barang` = '".$_POST['id_usulan_barang']."' ;
";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../alkes.php?message=Data alkes berhasil diubah,'.'&id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../alkes.php?id_usulan='.$_POST["id_usulan"]);
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