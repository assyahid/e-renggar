<?php include '../config.php';
$proker=mysqli_query($koneksi,"SELECT * FROM proker INNER JOIN surat_permohonan ON surat_permohonan.id_surat_permohonan = proker.id_surat_permohonan INNER JOIN users ON users.id_user = proker.id_user WHERE posisi LIKE '".$_SESSION["nama"]."' AND status != 'diverifikasi' ORDER BY proker.id_surat_permohonan DESC ")or die(mysql_error());
$count = mysqli_num_rows($proker);

$usulan=mysqli_query($koneksi,"SELECT * FROM usulan INNER JOIN users ON users.id_user = usulan.id_user WHERE posisi LIKE '".$_SESSION["nama"]."' AND status != 'diverifikasi' ORDER BY usulan.id_usulan DESC ")or die(mysql_error());
$countusulan = mysqli_num_rows($usulan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>E-RENGGAR | BBLK Palembang</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="index.php" class="logo">
					<img src="../image/logorenggar.png" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						
						
						
						
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../image/user.png" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg">
												<img src="../image/user.png" alt="image profile" class="avatar-img rounded">
											</div>
											<div class="u-text">
												<h4><?php echo $_SESSION['nama'];?></h4>
												<p class="text-muted"><?php echo $_SESSION['level'];?></p><a href="profile.php?data" class="btn btn-xs btn-secondary btn-sm">View Profile</a> <a href="logout.php" class="btn btn-xs btn-danger btn-sm">Logout</a>
											</div>
										</div>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							
							<img src="../image/user.png" alt="..." class="avatar-img rounded-circle">

							
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $_SESSION['nama'];?>
									<span class="user-level"><?php echo $_SESSION['level'];?></span>

								</span>
							</a>
							<div class="clearfix"></div>

							
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a href="index.php">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<!-- <li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Pengajuan Usulan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="usulan-belanja.php">
											<i class="fas fa-book-open"></i>
											Usulan Instalasi
											<?php  
											if($countusulan > 0){ ?>
												<span class="badge badge-success"><?= $countusulan; ?></span>
											<?php }
											?>
										</a>
									</li>
									<li>
										<a href="usulan-belanja-all.php">
											<i class="fas fa-file"></i>
											Data semua Usulan
										</a>
									</li>
								</ul>
							</div>
						</li> -->
						<li class="nav-item">
							<a href="usulan-belanja.php">
								<i class="fas fa-chalkboard-teacher"></i>
								Validasi Usulan
								<?php  
								if($countusulan > 0){ ?>
									<span class="badge badge-success"><?= $countusulan; ?></span>
								<?php }
								?>
							</a>
						</li>
						<li class="nav-item">
							<a href="usulan-belanja-all.php">
								<i class="fas fa-clipboard-list"></i>
								Data Usulan
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#report">
								<i class="fas fa-file-medical-alt"></i>
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="report">
								<ul class="nav nav-collapse">
									<li>
										<a href="usulan-belanja.php">
											<i class="fas fa-thermometer-half"></i>
											Alat Kesehatan
										</a>
									</li>
									<li>
										<a href="usulan-belanja-all.php">
											<i class="fas fa-flask"></i>
											Reagen
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="logout.php">
								<i class="fas fa-sign-out-alt"></i>
								<span class="sub-item">Logout</span>
							</a>
						</li>

						
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->