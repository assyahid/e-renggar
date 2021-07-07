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
									<td class="text-white op-7 mb-2">Tanggal</td>
									<td class="text-white op-7 mb-2">:</td>
									<td class="text-white op-7 mb-2"><?= $data[0]['tgl_usulan'] ?></td>
								</tr>
								<tr>
									<td class="text-white op-7 mb-2">Status</td>
									<td class="text-white op-7 mb-2">:</td>
									<td class="text-white op-7 mb-2"><?= $data[0]['status'] ?></td>
								</tr>
							</table>
						</div>
						<div class="col-4 col-md-4">
							<?php  
							if($data[0]['sent'] == 1){ ?>
								<button class="btn btn-primary" style="float: right;"><span class="btn-label">
									<i class="far fa-paper-plane"></i>&nbsp;
								</span> Telah terkirim pada <?= date_format(new DateTime($d['tanggal_kirim']),'d-m-Y') ?></button>
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
				<div class="col-md-12">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">Belanja Modal</div>
							<div class="card-category">Silahkan perbarui data</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-12 pb-12 pb-md-12 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="alkes.php?id_usulan=<?= $id_usulan ?>" class="btn btn-primary">
									<span class="btn-label">
										<i class="fa fa-bookmark"></i>
									</span>
									Alat Kesehatan  <span class="badge badge-danger"> <?= mysqli_num_rows($usulan_barang); ?></span>
								</a>
								<a href="p-data.php?id_usulan=<?= $id_usulan ?>" class="btn btn-primary">
									<span class="btn-label">
										<i class="fa fa-laptop"></i>
									</span>
									Pengelola Data <span class="badge badge-danger"> <?= mysqli_num_rows($pdata); ?></span>
								</a>
								<a href="p-kantor.php?id_usulan=<?= $id_usulan ?>" class="btn btn-primary">
									<span class="btn-label">
										<i class="fa fa-bookmark"></i>
									</span>
									Peralatan Kantor <span class="badge badge-danger"> <?= mysqli_num_rows($pkantor); ?></span>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="card full-height">
						<div class="card-body">
							<div class="card-title">Belanja Barang</div>
							<div class="card-category">Silahkan perbarui data</div>
							<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
								<div class="px-2 pb-2 pb-md-0 text-center">
									

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">

								</div>
								<div class="px-2 pb-2 pb-md-0 text-center">


								</div>
								<a href="reagen.php?id_usulan=<?= $id_usulan ?>" class="btn btn-primary">
									<span class="btn-label">
										<i class="fa fa-bookmark"></i>
									</span>
									Reagen <span class="badge badge-danger"> <?= mysqli_num_rows($reagen); ?></span>
								</a>
								<a href="art.php?id_usulan=<?= $id_usulan ?>" class="btn btn-primary">
									<span class="btn-label">
										<i class="fa fa-bookmark"></i>
									</span>
									ART / Alat Kebersihan <span class="badge badge-danger"> <?= mysqli_num_rows($art); ?></span>
								</a>
								<a href="pelatihan.php?id_usulan=<?= $id_usulan ?>" class="btn btn-primary">
									<span class="btn-label">
										<i class="fa fa-bookmark"></i>
									</span>
									Pelatihan <span class="badge badge-danger"> <?= mysqli_num_rows($pelatihan); ?></span>
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
						<h5 class="modal-title">Kirim Usulan Anda ?</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h2>Preview </h2>
			<table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Merek</th>
                <th>Spesifikasi</th>
                <th>Harga</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $xx = mysqli_fetch_array($usulan_barang);
              $merek_barang=mysqli_query($koneksi,"SELECT * FROM merek_barang inner join usulan_barang on merek_barang.id_usulan_barang=usulan_barang.id_usulan_barang where merek_barang.id_usulan_barang='$xx[id_usulan_barang]'")or die(mysql_error());
              $no=1;
              while($d=mysqli_fetch_array($merek_barang)){ 
                ?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?= $d["nama_merek"] ?></td>
                  <td><?= $d["spesifikasi_merek"] ?></td>
                  <td>Rp <?= number_format($d["harga_merek"],0) ?></td>
                 
                </tr> 
                  <?php } ?>
            </tbody>
          </table>
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