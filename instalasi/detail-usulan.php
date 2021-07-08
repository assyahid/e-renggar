<?php 
include 'header.php'; 
$id_usulan = $_GET["id_usulan"];
$surat=mysqli_query($koneksi,"SELECT * FROM usulan WHERE id_usulan=$id_usulan")or die(mysql_error());

$usulan_barang=mysqli_query($koneksi,"SELECT * FROM usulan_barang inner join barang on usulan_barang.id_barang=barang.id_barang WHERE usulan_barang.kategori='alkes' and usulan_barang.id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());

$pdata=mysqli_query($koneksi,"SELECT * FROM usulan_barang inner join barang on usulan_barang.id_barang=barang.id_barang WHERE usulan_barang.kategori='Pengelola Data' and usulan_barang.id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());

$pkantor=mysqli_query($koneksi,"SELECT * FROM usulan_barang inner join barang on usulan_barang.id_barang=barang.id_barang WHERE usulan_barang.kategori='Peralatan Kantor' and usulan_barang.id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());

$art=mysqli_query($koneksi,"SELECT * FROM art inner join barang on art.id_barang=barang.id_barang WHERE id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());

$reagen=mysqli_query($koneksi,"SELECT * FROM reagen inner join barang on reagen.id_barang=barang.id_barang WHERE id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());

$pelatihan=mysqli_query($koneksi,"SELECT * FROM pelatihan WHERE id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());

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
							<h2 class="text-white pb-2 fw-bold">Usulan</h2>
							<table>
								<tr>
									<td class="text-white op-7 mb-2">No Usulan</td>
									<td class="text-white op-7 mb-2">:</td>
									<td class="text-white op-7 mb-2"><?= $data[0]['no_usulan'] ?></td>
								</tr>
								<tr>
									<td class="text-white op-7 mb-2">Anggaran</td>
									<td class="text-white op-7 mb-2">:</td>
									<td class="text-white op-7 mb-2"><?= $data[0]['anggaran'] ?></td>
								</tr>
								<tr>
									<td class="text-white op-7 mb-2">Tanggal Pengajuan</td>
									<td class="text-white op-7 mb-2">:</td>
									<td class="text-white op-7 mb-2"><?= date_format(new DateTime($data[0]['tgl_usulan']),'d-m-Y') ?></td>
								</tr>
								<tr>
									<td class="text-white op-7 mb-2">Status</td>
									<td class="text-white op-7 mb-2">:</td>
									<td class="text-white op-7 mb-2"><?= $data[0]['status'] ?></td>
								</tr>
								<tr>
									<td class="text-white op-7 mb-2">Posisi</td>
									<td class="text-white op-7 mb-2">:</td>
									<td class="text-white op-7 mb-2"><?= $data[0]['posisi'] ?></td>
								</tr>
							</table>
						</div>
						<div class="col-4 col-md-4">
							<?php  
							if($data[0]['sent'] == 1){ ?>
								<button class="btn btn-primary" style="float: right;"><span class="btn-label">
									<i class="far fa-paper-plane"></i>&nbsp;
								</span> Telah terkirim pada <?= date_format(new DateTime($data[0]['tgl_kirim']),'d-m-Y') ?></button>
							<?php } else{ ?>
								<button data-toggle="modal" data-target="#modalVerifikasiProker" class="btn btn-success" style="float: right;"><span class="btn-label">
									<i class="fa fa-plus"></i>&nbsp;
								</span> <?= ($data[0]['status'] == 'revisi')? "Kirim perbaikan usulan saya" :"Kirim Usulan Saya" ?></button>
							<?php  } ?>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="page-inner mt--5">
			<div class="row mt--2">
				<div class="col-md-4">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title"><b>Alat Kesehatan</b> <span class="badge badge-danger"> <?= mysqli_num_rows($usulan_barang); ?></span></div>
							<div class="card-category">Belanja Modal</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-12 pb-12 pb-md-12 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="alkes.php?id_usulan=<?= $id_usulan; ?>" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
								<?php $xx=mysqli_fetch_array($usulan_barang); ?>
								<a href="../surat/cetak_usulan_barang.php?id_usulan=<?= $id_usulan; ?>&id_usulan_barang=<?= $xx['id_usulan_barang']; ?>" target="_blank" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-print"></i>
									</span>
									Cetak
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title"><b>Pengelola Data</b> <span class="badge badge-danger"> <?= mysqli_num_rows($pdata); ?></span></div>
							<div class="card-category">Belanja Modal</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="p-data.php?id_usulan=<?= $id_usulan; ?>" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
								<a href="../surat/cetak_kak.php?id_usulan=<?= $id_usulan; ?>" target="_blank" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-print"></i>
									</span>
									Cetak
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title"><b>Peralatan Kantor</b> <span class="badge badge-danger"> <?= mysqli_num_rows($pkantor); ?></span></div>
							<div class="card-category">Belanja Modal</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="p-kantor.php?id_usulan=<?= $id_usulan; ?>" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
								<a href="../surat/cetak_alat_kantor.php?id_usulan=<?= $id_usulan; ?>" target="_blank" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-print"></i>
									</span>
									Cetak
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
			<div class="page-inner mt--5">
			<div class="row mt--2">
				<div class="col-md-4">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title"><b>Reagen</b> <span class="badge badge-danger"> <?= mysqli_num_rows($reagen); ?></span></div>
							<div class="card-category">Belanja Barang</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-12 pb-12 pb-md-12 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="reagen.php?id_usulan=<?= $id_usulan; ?>" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
								<a href="../surat/cetak_kak.php?id_usulan=<?= $id_usulan; ?>" target="_blank" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-print"></i>
									</span>
									Cetak
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title"><b>ART / Alat Kebersihan</b> <span class="badge badge-danger"> <?= mysqli_num_rows($art); ?></span></div>
							<div class="card-category">Belanja Barang</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="art.php?id_usulan=<?= $id_usulan; ?>" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
								<a href="../surat/cetak_kak.php?id_usulan=<?= $id_usulan; ?>" target="_blank" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-print"></i>
									</span>
									Cetak
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title"><b>Pelatihan</b> <span class="badge badge-danger"> <?= mysqli_num_rows($pelatihan); ?></span></div>
							<div class="card-category">Belanja Barang</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="pelatihan.php?id_usulan=<?= $id_usulan; ?>" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-bullseye"></i>
									</span>
									Lihat
								</a>
								<a href="../surat/cetak_kak.php?id_usulan=<?= $id_usulan; ?>" target="_blank" class="btn btn-default">
									<span class="btn-label">
										<i class="fas fa-print"></i>
									</span>
									Cetak
								</a>
							</div>
						</div>
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
						<h5 class="modal-title">Kirim Usulan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Apakah anda sudah yakin untuk mengirim usulan anda ?
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_usulan" value="<?= $id_usulan ?>">
						<input type="submit" class="btn btn-primary" name="submit" value="Ya, Kirim Usulan Saya">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>

        
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Tambah Peralatan-->

	<?php include'footer.php';?>