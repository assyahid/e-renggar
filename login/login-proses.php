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
		if($qry['level']=="admin"){
			echo "success-admin";
		}
		else if ($qry['level']=="kepala"){
			echo "succes-kepala";
		}
		else if ($qry['level']=="koordinator"){
			echo "succes-koordinator";
		}
		else if ($qry['level']=="subbag"){
			echo "succes-subbag";
		}
	} else {
		echo "error";
	}



?>