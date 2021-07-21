<?php include 'header.php'; ?>

<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
						<h5 class="text-white op-7 mb-2">Halo <?php echo $_SESSION['nama']?>, Selamat datang di Sistem Informasi Rencana Anggaran BBLK Palembang</h5>
					</div>
							<!-- <div class="ml-md-auto py-2 py-md-0">
								<a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
								<a href="#" class="btn btn-secondary btn-round">Add Customer</a>
							</div> -->
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<h4 class="card-title"></h4>
							<div class="row row-demo-grid">
								<div class="col-sm-3">
									
									<button class="btn btn-outline-success"><i class="fas fa-chalkboard-teacher"></i><br> Validasi Usulan</button>
									
								</div>
								<div class="col-sm-3">
									
									<button class="btn btn-outline-info"><span class="icon-notebook"></span><br> Data Usulan</button>
									
								</div>
								<div class="col-sm-3">
									
									<button class="btn btn-outline-warning"><i class="fas fa-chalkboard-teacher"></i><br> Validasi Usulan</button>
									
								</div>
								<div class="col-sm-3">
									
									<button class="btn btn-outline-danger"><i class="fas fa-chalkboard-teacher"></i><br> Validasi Usulan</button>
									
								</div>
							</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>

			</div>
			
			<?php include'footer.php';?>