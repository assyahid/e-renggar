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

	$query = "INSERT INTO `usulan_barang` (`id_usulan_barang`,`id_usulan`,`id_barang`,`jumlah_tersedia`,`kondisi`,`jumlah_kebutuhan`,`justifikasi`,`kategori`)
	VALUES('','".$_POST['id_usulan']."','".$_POST['id_barang']."','".$_POST['jumlah_tersedia']."','".$_POST['kondisi']."','".$_POST['jumlah_kebutuhan']."','".$_POST['justifikasi']."','".$_POST['kategori']."');";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		$tampil = mysqli_query($koneksi,"SELECT * FROM usulan_barang ORDER BY id_usulan_barang DESC LIMIT 1 ")or die(mysql_error());
		$x = mysqli_fetch_array($tampil);
		$id_usulan_barang = $x['id_usulan_barang'];
		$merek = mysqli_query($koneksi,"INSERT INTO `merek_barang` (`id_usulan_barang`,`nama_merek`,`spesifikasi_merek`,`harga_merek`,`status_merek`) VALUES ('".$id_usulan_barang."','".$_POST['nama_merek']."','".$_POST['spesifikasi_merek']."','".$_POST['harga_merek']."','Pengajuan') ");
		header('Location: ../alkes.php?message=input'.'&id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../alkes.php?id_usulan='.$_POST["id_usulan"]);
	}
}

if(isset($_POST['submit']) && $_POST['submit'] == "Tambah Usulan Barang Pengelola Data"){
	$data = $_POST;

	$query = "INSERT INTO `usulan_barang` (`id_usulan_barang`,`id_usulan`,`id_barang`,`jumlah_tersedia`,`kondisi`,`jumlah_kebutuhan`,`justifikasi`,`kategori`)
	VALUES('','".$_POST['id_usulan']."','".$_POST['id_barang']."','".$_POST['jumlah_tersedia']."','".$_POST['kondisi']."','".$_POST['jumlah_kebutuhan']."','".$_POST['justifikasi']."','".$_POST['kategori']."');";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		$tampil = mysqli_query($koneksi,"SELECT * FROM usulan_barang ORDER BY id_usulan_barang DESC LIMIT 1 ")or die(mysql_error());
		$x = mysqli_fetch_array($tampil);
		$id_usulan_barang = $x['id_usulan_barang'];
		$merek = mysqli_query($koneksi,"INSERT INTO `merek_barang` (`id_usulan_barang`,`nama_merek`,`spesifikasi_merek`,`harga_merek`,`status_merek`) VALUES ('".$id_usulan_barang."','".$_POST['nama_merek']."','".$_POST['spesifikasi_merek']."','".$_POST['harga_merek']."','Pengajuan') ");
		header('Location: ../p-data.php?id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../p-data.php?id_usulan='.$_POST["id_usulan"]);
	}
}

if(isset($_POST['submit']) && $_POST['submit'] == "Tambah Usulan Barang Peralatan Kantor"){
	$data = $_POST;

	$query = "INSERT INTO `alat_kantor` (`id_alat_kantor`,`id_usulan`,`id_barang`,`harga_barang`,`jumlah_tersedia`,`kondisi`,`jumlah_kebutuhan`,`justifikasi_kebutuhan`)
	VALUES('','".$_POST['id_usulan']."','".$_POST['id_barang']."','".$_POST['harga_barang']."','".$_POST['jumlah_tersedia']."','".$_POST['kondisi']."','".$_POST['jumlah_kebutuhan']."','".$_POST['justifikasi_kebutuhan']."');";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../p-kantor.php?message=input&id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../p-kantor.php?message=error&id_usulan='.$_POST["id_usulan"]);
	}
}


if(isset($_POST['submit']) && $_POST['submit'] == "Tambah Usulan Barang ART"){
	$data = $_POST;

	$query = "INSERT INTO `art` (`id_art`,`id_usulan`,`id_barang`,`jumlah_kebutuhan`,`ket_art`)
	VALUES('','".$_POST['id_usulan']."','".$_POST['id_barang']."','".$_POST['jumlah_kebutuhan']."','".$_POST['ket_art']."');";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../art.php?id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../art.php?id_usulan='.$_POST["id_usulan"]);
	}
}

if(isset($_POST['submit']) && $_POST['submit'] == "Tambah Usulan Barang Reagen"){
	$data = $_POST;

	$query = "INSERT INTO `reagen` (`id_reagen`,`id_usulan`,`id_barang`,`jumlah_usulan`,`ket_reagen`)
	VALUES('','".$_POST['id_usulan']."','".$_POST['id_barang']."','".$_POST['jumlah_usulan']."','".$_POST['ket_reagen']."');";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../reagen.php?id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../reagen.php?id_usulan='.$_POST["id_usulan"]);
	}
}

if(isset($_POST['submit']) && $_POST['submit'] == "Tambah Usulan Pelatihan"){
	$data = $_POST;

	$query = "INSERT INTO `pelatihan` (`id_pelatihan`,`id_usulan`,`nama_pelatihan`,`lokasi`,`penyelenggara`,`jumlah_peserta`,`waktu_pelaksanaan`,`biaya_penyelenggara`,`status_pelatihan`)
	VALUES('','".$_POST['id_usulan']."','".$_POST['nama_pelatihan']."','".$_POST['lokasi']."','".$_POST['penyelenggara']."','".$_POST['jumlah_peserta']."','".$_POST['waktu_pelaksanaan']."','".$_POST['biaya_penyelenggara']."','Pengajuan');";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../pelatihan.php?id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../pelatihan.php?id_usulan='.$_POST["id_usulan"]);
	}
}



if(isset($_POST['submit']) && $_POST['submit'] == "Tambah Merek"){
	$data = $_POST;

	$query = "INSERT INTO `merek_barang` (`id_usulan_barang`,`nama_merek`,`spesifikasi_merek`,`harga_merek`) VALUES ('".$_POST['id_usulan_barang']."','".$_POST['nama_merek']."','".$_POST['spesifikasi_merek']."','".$_POST['harga_merek']."') ";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../tambah_merek.php?id_usulan_barang='.$_POST["id_usulan_barang"]."&id_usulan=".$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../tambah_merek.php?id_usulan_barang='.$_POST["id_usulan_barang"]."&id_usulan=".$_POST["id_usulan"]);
	}
}

if(isset($_POST['submit']) && $_POST['submit'] == "Tambah Merek Pengelola Data"){
	$data = $_POST;

	$query = "INSERT INTO `merek_barang` (`id_usulan_barang`,`nama_merek`,`spesifikasi_merek`,`harga_merek`) VALUES ('".$_POST['id_usulan_barang']."','".$_POST['nama_merek']."','".$_POST['spesifikasi_merek']."','".$_POST['harga_merek']."') ";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../tambah_merek_pdata.php?id_usulan_barang='.$_POST["id_usulan_barang"]."&id_usulan=".$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../tambah_merek_pdata.php?id_usulan_barang='.$_POST["id_usulan_barang"]."&id_usulan=".$_POST["id_usulan"]);
	}
}

if(isset($_POST['submit']) && $_POST['submit'] == "Tambah Merek Peralatan Kantor"){
	$data = $_POST;

	$query = "INSERT INTO `merek_barang` (`id_usulan_barang`,`nama_merek`,`spesifikasi_merek`,`harga_merek`) VALUES ('".$_POST['id_usulan_barang']."','".$_POST['nama_merek']."','".$_POST['spesifikasi_merek']."','".$_POST['harga_merek']."') ";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../tambah_merek_pkantor.php?id_usulan_barang='.$_POST["id_usulan_barang"]."&id_usulan=".$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../tambah_merek_pkantor.php?id_usulan_barang='.$_POST["id_usulan_barang"]."&id_usulan=".$_POST["id_usulan"]);
	}
}

 if(isset($_GET['hapusmerek'])){
    $id_merek_barang=$_GET['id_merek_barang'];
    $id_usulan=$_GET['id_usulan'];
    $id_usulan_barang=$_GET['id_usulan_barang'];
$query2 = "DELETE FROM merek_barang WHERE id_merek_barang='$id_merek_barang'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak  // Jika Sukses, Lakukan :  
header('Location: ../tambah_merek.php?id_usulan_barang='.$_GET["id_usulan_barang"]."&id_usulan=".$_GET["id_usulan"]);
} else {  // Jika Gagal, Lakukan :  
 $err = mysqli_error($koneksi);
		header('Location: ../tambah_merek.php?id_usulan_barang='.$_GET["id_usulan_barang"]."&id_usulan=".$_GET["id_usulan"]);
}
  }

   if(isset($_GET['hapusmerekpdata'])){
    $id_merek_barang=$_GET['id_merek_barang'];
    $id_usulan=$_GET['id_usulan'];
    $id_usulan_barang=$_GET['id_usulan_barang'];
$query2 = "DELETE FROM merek_barang WHERE id_merek_barang='$id_merek_barang'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak  // Jika Sukses, Lakukan :  
header('Location: ../tambah_merek_pdata.php?id_usulan_barang='.$_GET["id_usulan_barang"]."&id_usulan=".$_GET["id_usulan"]);
} else {  // Jika Gagal, Lakukan :  
 $err = mysqli_error($koneksi);
		header('Location: ../tambah_merek_pdata.php?id_usulan_barang='.$_GET["id_usulan_barang"]."&id_usulan=".$_GET["id_usulan"]);
}
  }

if(isset($_GET['hapusmerekpkantor'])){
    $id_merek_barang=$_GET['id_merek_barang'];
    $id_usulan=$_GET['id_usulan'];
    $id_usulan_barang=$_GET['id_usulan_barang'];
$query2 = "DELETE FROM merek_barang WHERE id_merek_barang='$id_merek_barang'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak  // Jika Sukses, Lakukan :  
header('Location: ../tambah_merek_pkantor.php?id_usulan_barang='.$_GET["id_usulan_barang"]."&id_usulan=".$_GET["id_usulan"]);
} else {  // Jika Gagal, Lakukan :  
 $err = mysqli_error($koneksi);
		header('Location: ../tambah_merek_pkantor.php?id_usulan_barang='.$_GET["id_usulan_barang"]."&id_usulan=".$_GET["id_usulan"]);
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
		header('Location: ../alkes.php?message=update,'.'&id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../alkes.php?id_usulan='.$_POST["id_usulan"]);
	}
}

if(isset($_POST['update']) && $_POST['update'] == "Update Usulan Barang Pengelola Data"){
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
		header('Location: ../p-data.php?message=Data Alat Pengelola Data berhasil diubah,'.'&id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../p-data.php?id_usulan='.$_POST["id_usulan"]);
	}
}

if(isset($_POST['update']) && $_POST['update'] == "Update Usulan Barang Peralatan Kantor"){
	$data = $_POST;

	$query = "UPDATE `alat_kantor` 
	SET
	`id_usulan` = '".$_POST['id_usulan']."', 
	`id_barang` = '".$_POST['id_barang']."', 
	`harga_barang` = '".$_POST['harga_barang']."', 
	`jumlah_tersedia` = '".$_POST['jumlah_tersedia']."', 
	`kondisi` = '".$_POST['kondisi']."', 
	`jumlah_kebutuhan` = '".$_POST['jumlah_kebutuhan']."', 
	`justifikasi_kebutuhan` = '".$_POST['justifikasi_kebutuhan']."'
	
	WHERE
	`id_alat_kantor` = '".$_POST['id_alat_kantor']."' ;
";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../p-kantor.php?message=update,'.'&id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../p-kantor.php?id_usulan='.$_POST["id_usulan"]);
	}
}

if(isset($_POST['update']) && $_POST['update'] == "Update Usulan Barang ART"){
	$data = $_POST;

	$query = "UPDATE `art` 
	SET
	`id_usulan` = '".$_POST['id_usulan']."', 
	`id_barang` = '".$_POST['id_barang']."', 
	`jumlah_kebutuhan` = '".$_POST['jumlah_kebutuhan']."', 
	`ket_art` = '".$_POST['ket_art']."'
	
	WHERE
	`id_art` = '".$_POST['id_art']."' ;
";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../art.php?message=Data Alat Pengelola Data berhasil diubah,'.'&id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../art.php?id_usulan='.$_POST["id_usulan"]);
	}
}


if(isset($_POST['update']) && $_POST['update'] == "Update Usulan Barang Reagen"){
	$data = $_POST;

	$query = "UPDATE `reagen` 
	SET
	`id_usulan` = '".$_POST['id_usulan']."', 
	`id_barang` = '".$_POST['id_barang']."', 
	`jumlah_usulan` = '".$_POST['jumlah_usulan']."', 
	`ket_reagen` = '".$_POST['ket_reagen']."'
	
	WHERE
	`id_reagen` = '".$_POST['id_reagen']."' ;
";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../reagen.php?message=Data Reagen berhasil diubah,'.'&id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../reagen.php?id_usulan='.$_POST["id_usulan"]);
	}
}

if(isset($_POST['update']) && $_POST['update'] == "Update Usulan Pelatihan"){
	$data = $_POST;

	$query = "UPDATE`pelatihan` 
	SET
	`id_usulan` = '".$_POST['id_usulan']."', 
	`nama_pelatihan` = '".$_POST['nama_pelatihan']."', 
	`lokasi` = '".$_POST['lokasi']."', 
	`penyelenggara` = '".$_POST['penyelenggara']."', 
	`jumlah_peserta` = '".$_POST['jumlah_peserta']."', 
	`waktu_pelaksanaan` = '".$_POST['waktu_pelaksanaan']."', 
	`biaya_penyelenggara` = '".$_POST['biaya_penyelenggara']."', 
	`status_pelatihan` = '".$_POST['status_pelatihan']."'
	
	WHERE
	`id_pelatihan` = '".$_POST['id_pelatihan']."' ;

";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../pelatihan.php?message=Data Pelatihan berhasil diubah,'.'&id_usulan='.$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../pelatihan.php?id_usulan='.$_POST["id_usulan"]);
	}
}

if(isset($_POST['update']) && $_POST['update'] == "Update merek alkes"){
	$data = $_POST;

	$query = "UPDATE `merek_barang` 
	SET
	`id_usulan_barang` = '".$_POST['id_usulan_barang']."', 
	`nama_merek` = '".$_POST['nama_merek']."', 
	`spesifikasi_merek` = '".$_POST['spesifikasi_merek']."', 
	`harga_merek` = '".$_POST['harga_merek']."'
	
	WHERE
	`id_merek_barang` = '".$_POST['id_merek_barang']."' ;
";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../tambah_merek.php?message=Data merek alkes berhasil diubah,'.'&id_usulan_barang='.$_POST["id_usulan_barang"]."&id_usulan=".$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../tambah_merek.php?message=Gagal,'.'&id_usulan_barang='.$_POST["id_usulan_barang"]);
	}
}

if(isset($_POST['update']) && $_POST['update'] == "Update Merek Pengelola Data"){
	$data = $_POST;

	$query = "UPDATE `merek_barang` 
	SET
	`id_usulan_barang` = '".$_POST['id_usulan_barang']."', 
	`nama_merek` = '".$_POST['nama_merek']."', 
	`spesifikasi_merek` = '".$_POST['spesifikasi_merek']."', 
	`harga_merek` = '".$_POST['harga_merek']."'
	
	WHERE
	`id_merek_barang` = '".$_POST['id_merek_barang']."' ;
";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../tambah_merek_pdata.php?message=Data merek alkes berhasil diubah,'.'&id_usulan_barang='.$_POST["id_usulan_barang"]."&id_usulan=".$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../tambah_merek_pdata.php?message=Gagal,'.'&id_usulan_barang='.$_POST["id_usulan_barang"]);
	}
}

if(isset($_POST['update']) && $_POST['update'] == "Update Merek Peralatan Kantor"){
	$data = $_POST;

	$query = "UPDATE `merek_barang` 
	SET
	`id_usulan_barang` = '".$_POST['id_usulan_barang']."', 
	`nama_merek` = '".$_POST['nama_merek']."', 
	`spesifikasi_merek` = '".$_POST['spesifikasi_merek']."', 
	`harga_merek` = '".$_POST['harga_merek']."'
	
	WHERE
	`id_merek_barang` = '".$_POST['id_merek_barang']."' ;
";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../tambah_merek_pkantor.php?message=Data merek alkes berhasil diubah,'.'&id_usulan_barang='.$_POST["id_usulan_barang"]."&id_usulan=".$_POST["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../tambah_merek_pkantor.php?message=Gagal,'.'&id_usulan_barang='.$_POST["id_usulan_barang"]);
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

if(isset($_POST['submit']) && $_POST['submit'] == "Ya, Kirim Usulan Saya"){
	$data = $_POST;
	// ambil atasan terlebih dahulu
	$atasan = "SELECT * FROM users WHERE id_user = ".$_SESSION['atasan'];
	$query = mysqli_query($koneksi,$atasan);
	$usr_atasan = mysqli_fetch_array($query);
	// var_dump($_SESSION['atasan']);
	// exit();
	// end
	$query = "UPDATE usulan SET sent = 1,tgl_kirim='".date("Y-m-d")."',posisi='".$usr_atasan["nama"]."',status='Proses' WHERE id_usulan = ".$data["id_usulan"]."";
	$sql = mysqli_query($koneksi,$query);  
	if($sql){
		header('Location: ../detail-usulan.php?id_usulan='.$data["id_usulan"]);
	}else{   
		$err = mysqli_error($koneksi);
		header('Location: ../detail-usulan.php?id_usulan='.$data["id_usulan"]);
	}
}