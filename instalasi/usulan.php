<?php include 'header.php'; 

?>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Usulan</h4>
				<ul class="breadcrumbs">

				</ul>
			</div>
			
			<div class="row">

				<div class="col-12">
					<?php if(isset($_GET["message"]) && $_GET["message"] != ""){ ?>
						<div class="alert alert-success" role="alert">
							<strong>Sukses!</strong><?= $_GET["message"]; ?>
						</div>
					<?php } ?>

					<div class="card">
							<div class="card-header">
							<h4 class="card-title">Data Usulan <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right;">
								<span class="fas fa-plus"></span> Buat Data Usulan</button></h4>
							</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="multi-filter-select" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>No</th>
											<th>Nomor Usulan</th>
											<th>Anggaran</th>
											<th>Tanggal Usulan</th>
											<th>Status</th>
											<th>Posisi Pengajuan</th>
											<th width="150px"><center>Opsi</center></th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$index = 0;
											 $query = mysqli_query($koneksi,"SELECT * FROM usulan");
									        $no=1;
											 while ($d = mysqli_fetch_array($query)) :?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?= $d["no_usulan"]; ?></td>
												<td><?= $d["anggaran"]; ?></td>
												<td><?= date_format(new DateTime($d['tgl_usulan']),"d-m-Y") ?></td>
												<td><?= $d["status"]; ?></td>
												<td><?= $d["posisi"]; ?></td>
												<td>
													<div class="btn-group" role="group" aria-label="Basic example">
														<a href="detail-usulan.php?id_usulan=<?= $d['id_usulan']; ?>" type="button" class="btn btn-secondary">Detail</a>&nbsp;
														<!-- 	<button type="button" class="btn btn-secondary">Cetak Surat</button> -->
													</div>
												</td>
											</tr>
											<?php endwhile;?>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Modal Tambah Pegawai-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Buat Data Usulan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="controller/v1.php">
						<div class="modal-body">
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">No Usulan</label>
									<input type="text" name="no_usulan" class="form-control" id="email2" placeholder="Input nomor usulan" required="">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Anggaran</label>
									<select name="anggaran" class="form-control" required="">
										<option value="">Pilih Anggaran</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
									</select>
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Tanggal Usulan</label>
									<input type="date" name="tgl_usulan" class="form-control" value="<?=date("Y-m-d");?>" id="email2" placeholder="Input jenis peralatan" required>
								</div>
							</div>
						
						</div>
						<div class="modal-footer">
							<input type="submit" name="submit" class="btn btn-sm btn-primary" value="Buat Usulan">
							<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Modal Tambah Pegawai-->


		

		<?php include 'footer.php';?>
