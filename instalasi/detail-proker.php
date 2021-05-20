<?php 
include 'header.php'; 
$id_surat = $_GET["id_surat"];
$surat=mysqli_query($koneksi,"SELECT * FROM surat_permohonan WHERE status_surat LIKE 'Telah divalidasi Kepala' AND id_surat_permohonan = $id_surat")or die(mysql_error());

// Periksa apakah sudah ada data di tabel proker atau belum
// Jika belum ada buat
// Simpan id proker juga

$id_proker = -1;
$sent = -1;
$proker_data = [];
$proker = mysqli_query($koneksi,"SELECT * FROM proker WHERE id_surat_permohonan = $id_surat")or die(mysql_error());
if(mysqli_num_rows($proker) == 0){
	$query = "INSERT INTO `proker` (`id_surat_permohonan`,`sent`,`id_user`) VALUES ('$id_surat','0','".$_SESSION['id_user']."');";
	$sql = mysqli_query($koneksi,$query);
	if(!$sql){
		echo "alert('something error')";
	}
	$proker = mysqli_query($koneksi,"SELECT * FROM proker WHERE id_surat_permohonan = $id_surat")or die(mysql_error());
	$proker_data = mysqli_fetch_array($proker);
	$id_proker  = $proker_data["id_proker"];
	$sent = $proker_data["sent"];
}else{
	$proker_data = mysqli_fetch_array($proker);
	$id_proker  = $proker_data["id_proker"];
	$sent = $proker_data["sent"];
}
// End process here




$data = [];
while($d=mysqli_fetch_array($surat)){ $data[] = $d; }

?>

<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div class="row" style="width: 100%;">
						<div class="col-8 col-md-8">
							<h2 class="text-white pb-2 fw-bold">Program Kerja</h2>
							<h5 class="text-white op-7 mb-2">Batas Waktu Pengiriman: <?= date_format(new DateTime($data[0]['tgl_batas_isi_proker']),'d-m-Y') ?></h5>	
						</div>
						<div class="col-4 col-md-4">
							<?php  
							
							$sekarang = new DateTime();
							$batas = new DateTime($data[0]['tgl_batas_isi_proker']);
							$batas->modify('+1 day');
							if($sent == 1){ ?>
								<button class="btn btn-primary" style="float: right;"><span class="btn-label">
									<i class="far fa-paper-plane"></i>&nbsp;
								</span> Telah terkirim pada <?= date_format(new DateTime($proker_data['tanggal_kirim']),'d-m-Y') ?></button>
							<?php }else if($sekarang > $batas){ ?>
								<button class="btn btn-danger" style="float: right;"><span class="btn-label">
									<i class="fas fa-calendar-times"></i>&nbsp;
								</span> Sudah Lewat</button>
							<?php } else{ ?>
								<button data-toggle="modal" data-target="#modalVerifikasiProker" class="btn btn-success" style="float: right;"><span class="btn-label">
									<i class="fa fa-plus"></i>&nbsp;
								</span> Kirim Proker Saya</button>
							<?php  } ?>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="page-inner mt--5">
			<div class="row mt--2">
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">Kerangka Acuan Kegiatan</div>
							<div class="card-category">Segera lakukan update data anda</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<div class="px-12 pb-12 pb-md-12 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="kak.php?id_surat=<?= $id_surat ?>&id_proker=<?= $id_proker ?>" class="btn btn-primary">
									<span class="btn-label">
										<i class="fa fa-bookmark"></i>
									</span>
									Atur
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">RAB</div>
							<div class="card-category">Segera lakukan update data anda</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<button class="btn btn-primary">
									<span class="btn-label">
										<i class="fa fa-bookmark"></i>
									</span>
									Atur
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt--2">
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">Justifikasi</div>
							<div class="card-category">Segera lakukan update data anda</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<button class="btn btn-primary">
									<span class="btn-label">
										<i class="fa fa-bookmark"></i>
									</span>
									Atur
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">Penawaran Harga</div>
							<div class="card-category">Segera lakukan update data anda</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<button class="btn btn-primary">
									<span class="btn-label">
										<i class="fa fa-bookmark"></i>
									</span>
									Atur
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt--2">
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">Manajemen Resiko</div>
							<div class="card-category">Segera lakukan update data anda</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<button class="btn btn-primary">
									<span class="btn-label">
										<i class="fa fa-bookmark"></i>
									</span>
									Atur
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">Surat usulan penghapusan alat rusak</div>
							<div class="card-category">Segera lakukan update data anda</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<button class="btn btn-primary">
									<span class="btn-label">
										<i class="fa fa-bookmark"></i>
									</span>
									Atur
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Tambah Peralatan-->
	<div class="modal fade" id="modalVerifikasiProker" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<form method="POST" action="Controller/v1.php">
					<div class="modal-header">
						<h5 class="modal-title">Kirim program kerja saya</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h2>Kirim Program Kerja Anda ? </h2>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_proker" value="<?= $id_proker ?>">
						<input type="hidden" name="id_surat" value="<?= $id_surat ?>">
						<input type="submit" class="btn btn-primary" name="submit" value="Ya, Kirim Proker saya">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Tambah Peralatan-->

	<?php include'footer.php';?>