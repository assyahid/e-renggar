<?php 

if (!isset($_SESSION['nama'])) {
	echo"<script>alert('anda tidak memiliki hak untuk akses halaman ini')
     location.replace('../index.php')</script>";
}


?>