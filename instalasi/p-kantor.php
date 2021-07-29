<?php include 'header.php'; 
$pegawai  =mysqli_query($koneksi,"SELECT * FROM pegawai WHERE id_user = '".$_SESSION['id_user']."'")or die(mysql_error());
$alat_kantor=mysqli_query($koneksi,"SELECT * FROM alat_kantor inner join barang on alat_kantor.id_barang=barang.id_barang WHERE alat_kantor.id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());
$barang   =mysqli_query($koneksi,"SELECT * FROM barang where kategori='Peralatan Kantor' ORDER BY nama_barang ASC")or die(mysql_error());

$id_usulan = $_GET["id_usulan"];

$pegawai=mysqli_query($koneksi,"SELECT * FROM pegawai WHERE id_user = '".$_SESSION['id_user']."'")or die(mysql_error());
$surat=mysqli_query($koneksi,"SELECT * FROM usulan WHERE id_usulan = $id_usulan")or die(mysql_error());


$data = [];
while($d=mysqli_fetch_array($surat)){ $data[] = $d; }

?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Peralatan Kantor</h4>
				<ul class="breadcrumbs">
					<a href="detail-usulan.php?id_usulan=<?=$_GET['id_usulan'];?>" class="btn btn-info">Kembali ke menu usulan</a>
				</ul>
			</div>
			<div class="row">
				<!-- <div class="col-sm-6 col-md-6">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="flaticon-users"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Data Pegawai</p>
										<h4 class="card-title"><?= mysqli_num_rows($pegawai); ?></h4>
										<a href="master_pegawai.php">lihat data</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<div class="col-sm-6 col-md-6">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-info bubble-shadow-small">
										<i class="flaticon-interface-6"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Data Alat Peralatan Kantor</p>
										<h4 class="card-title"><?= mysqli_num_rows($alat_kantor); ?></h4>
										<!-- <a href="alat_kantor.php">lihat data</a> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<?php if(isset($_GET["message"]) && $_GET["message"] != ""){ ?>
						<div class="alert alert-success" role="alert">
							<strong>Sukses!</strong> <?= $_GET["message"]; ?>
						</div>
					<?php } ?>
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title"> Kebutuhan Peralatan Kantor
								<?php if ($data[0]['status']=="Pengajuan") { ?>
								<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right;">
									<span class="fas fa-plus"></span> Input Data Alat Peralatan Kantor</button>
									<?php	}  ?>
									<a type="button" target="_blank" href="../surat/cetak_alat_kantor.php?id_usulan=<?= $id_usulan; ?>" class="btn btn-sm btn-success" style="float: right;margin-right: 5px;">
										<span class="fas fa-print"></span> Cetak Surat</a>
									</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="multi-filter-select" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Alat</th>
													<th>Harga</th>
													<th>Jumlah Tersedia</th>
													<th>Kondisi</th>
													<th>Jumlah Kebutuhan</th>
													<th>Justifikasi</th>
													<th width="90px">Opsi</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$no=1;
												while($d=mysqli_fetch_array($alat_kantor)){ 
													?>
													<tr>
														<td><?=$no++;?></td>
														<td><?= $d["nama_barang"] ?></td>
														<td>Rp <?= number_format($d["harga_barang"],0.0) ?></td>
														<td><?= $d["jumlah_tersedia"] ?></td>
														<td><label class="badge badge-warning"><?= $d["kondisi"] ?></label></td>
														<td><?= $d["jumlah_kebutuhan"] ?></td>
														<td><?= $d["justifikasi_kebutuhan"] ?></td>
														<td>	
															<?php if($data[0]['status']=="Pengajuan"){ ?>
															<button type="button" class="btn btn-icon btn-round btn-primary" data-toggle="modal" data-target="#exampleEdit_<?php echo $d['id_alat_kantor']; ?>">
															<i class="fa fa-edit"></i>
														</button>
														<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapus&id_alat_kantor=<?php echo $d['id_alat_kantor']; ?>&id_usulan=<?php echo $d['id_usulan']; ?>' }" class="btn btn-icon btn-round btn-danger"> <i class="fa fa-trash"></i></a>
															<?php	} elseif($data[0]['status']=="Revisi") { ?>
															<button type="button" class="btn btn-icon btn-round btn-primary" data-toggle="modal" data-target="#exampleEdit_<?php echo $d['id_alat_kantor']; ?>">
															<i class="fa fa-edit"></i>
														</button>
													<?php } else { ?>
															<p>Sedang di Proses</p>
													<?php } ?>
													</td>
													</tr>	



	<!-- Modal Edit alat_kantor-->
		<div class="modal fade" id="exampleEdit_<?php echo $d['id_alat_kantor']; ?>" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Data Kebutuhan Alat Pengelola Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="controller/v1.php">
						<div class="modal-body">
							<input type="hidden" name="id_usulan" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['id_usulan']?>">
							<input type="hidden" name="id_alat_kantor" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['id_alat_kantor']?>">
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="defaultSelect">Nama Barang</label>
									 <select name="id_barang" class="form-control" required>
                                                      <?php
                                                      $x="SELECT * from barang where kategori='Peralatan Kantor' ";
                                                      $q=mysqli_query($koneksi,$x);
                                                      while ($rmodal=mysqli_fetch_array($q)) 
                                                        { 
                                                          if($rmodal['id_barang']==$d['id_barang']) { $sel = 'selected';} else { $sel = ''; }
                                                      ?>
                                                            <option <?php echo $sel; ?> value="<?php echo $rmodal['id_barang']; ?>"> <?php echo $rmodal['nama_barang'].''; ?></option>
                                                      <?php } ?>
                                                    </select>
								</div>
							</div>

							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Harga</label>
									<input type="number" name="harga_barang" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['harga_barang']?>">
								</div>
							</div>
						
						<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Jumlah Tersedia</label>
									<input type="number" name="jumlah_tersedia" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['jumlah_tersedia']?>">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Kondisi</label>
									<select class="form-control form-control" name="kondisi" id="defaultSelect">
										<option <?php if ($d['kondisi'] == '-') {
											echo "selected";
										} ?> value="-">-</option>
										<option <?php if ($d['kondisi'] == 'Baik') {
											echo "selected";
										} ?> value="Baik">Baik</option>
										<option <?php if ($d['kondisi'] == 'Rusak Ringan') {
											echo "selected";
										} ?> value="Rusak Ringan">Rusak Ringan</option>
										<option <?php if ($d['kondisi'] == 'Rusak Berat') {
											echo "selected";
										} ?> value="Rusak Berat">Rusak Berat</option>
									</select>
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Jumlah Kebutuhan</label>
									<input type="number" name="jumlah_kebutuhan" class="form-control" id="email2" placeholder="Input Kebutuhan" value="<?=$d['jumlah_kebutuhan']?>">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Keterangan Justifikasi</label>
									<textarea input type="text" name="justifikasi_kebutuhan" class="form-control" value="<?= $d["justifikasi_kebutuhan"] ?>"><?= $d["justifikasi_kebutuhan"] ?></textarea>
								</div>
							</div>
						<div class="modal-footer">
							<input type="submit" name="update" class="btn btn-primary" value="Update Usulan Barang Peralatan Kantor">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Modal Tambah Pegawai-->




												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">

						</div>
					</div>
				</div>
			</div>
		</div>
<?php
		if(isset($_GET['hapus'])){
    $id_alat_kantor=$_GET['id_alat_kantor'];
    $id_usulan=$_GET['id_usulan'];
$query2 = "DELETE FROM alat_kantor WHERE id_alat_kantor='$id_alat_kantor'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak  // Jika Sukses, Lakukan :  
?><script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="p-kantor.php?id_usulan=<?=$id_usulan?>";
    //]]>
  </script><?php
} else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='p-kantor.php?id_usulan=<?=$id_usulan?>'>Kembali</a>";
}
  }
  ?>

  <?php
		if(isset($_GET['hapusmerek'])){
    $id_merek_barang=$_GET['id_merek_barang'];
    $id_usulan=$_GET['id_usulan'];
$query2 = "DELETE FROM merek_barang WHERE id_merek_barang='$id_merek_barang'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak  // Jika Sukses, Lakukan :  
?><script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="p-kantor.php?id_usulan=<?=$id_usulan?>";
    //]]>
  </script><?php
} else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='p-kantor.php?id_usulan=<?=$id_usulan?>'>Kembali</a>";
}
  }
  ?>








		<!-- Modal Tambah Pegawai-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Tambah Data Kebutuhan Peralatan Kantor</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="controller/v1.php">
						<div class="modal-body">
							<input type="hidden" name="id_usulan" class="form-control" id="email2" placeholder="Input spesifikasi umum"value="<?=$_GET['id_usulan'];?>">
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="defaultSelect">Nama Barang</label><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-default">
                <span class="fas fa-plus"></span> Tambah Data Barang</button>
									<select name="id_barang" class="form-control select2" id="defaultSelect" style="width: 100%">
										<?php 
										while($d=mysqli_fetch_array($barang)){
											?>
											<option value="<?= $d['id_barang'] ?>" ><?= $d['nama_barang'] ?></option>
										<?php  } ?>
									</select>
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Harga</label>
									<input type="text" name="harga_barang" class="form-control" id="email2" placeholder="Input Harga">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Jumlah Tersedia</label>
									<input type="number" name="jumlah_tersedia" class="form-control" id="email2" placeholder="Input Jumlah">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Kondisi</label>
									<select class="form-control form-control" name="kondisi" id="defaultSelect">
										<option value="-">-</option>
										<option value="Baik">Baik</option>
										<option value="Rusak Ringan">Rusak Ringan</option>
										<option value="Rusak Berat">Rusak Berat</option>
									</select>
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Jumlah Kebutuhan</label>
									<input type="number" name="jumlah_kebutuhan" class="form-control" id="email2" placeholder="Input Kebutuhan">
								</div>
							</div>
							<div class="col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email2">Keterangan Justifikasi</label>
									<textarea input type="text" name="justifikasi_kebutuhan" class="form-control" id="email2" placeholder="Input keterangan justifikasi"></textarea>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" name="submit" class="btn btn-primary" value="Tambah Usulan Barang Peralatan Kantor">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Modal Tambah Pegawai-->

<!-- tambah -->
<div class="modal fade" id="modal-default">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
               <form action="" method="post" class="niceform" enctype="multipart/form-data">
            <form class="form-horizontal" role="form" method="post" action="">
  
   <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Kode Katalog </label>

    <div class="col-sm-12">
      <input type="text" placeholder="" name="kode_katalog" class="form-control" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama Barang </label>

    <div class="col-sm-12">
      <input type="text" placeholder="" name="nama_barang" class="form-control" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Umum</label>

    <div class="col-sm-12">
      <input type="text" placeholder="" name="nama_umum" class="form-control" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Satuan</label>

    <div class="col-sm-12">
      <input type="text"  placeholder="" name="satuan" class="form-control" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kemasan</label>

    <div class="col-sm-12">
      <input type="text"  placeholder="" name="kemasan" class="form-control" />
    </div>
  </div>


  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="bird"> Kategori</label>

    <div class="col-sm-12 select2-input">
      <select class="form-control select2" name="kategori" style="width: 100%">
        <!-- <option value="" disabled="">Pilih</option> -->
        <!-- <option value="Alat Kesehatan">Alat Kesehatan</option> -->
        <!-- <option value="Pengolah Data">Pengolah Data</option> -->
        <option value="Peralatan Kantor">Peralatan Kantor</option>
      </select>
    </div>
  </div>


  
<?php
if(isset($_POST['submit'])){
$kode_katalog = $_POST['kode_katalog'];
$nama_barang = $_POST['nama_barang'];
$nama_umum = $_POST['nama_umum'];
$satuan = $_POST['satuan'];
$kemasan = $_POST['kemasan'];
$kategori = $_POST['kategori'];


$query = "INSERT INTO `barang` 
  (`id_barang`, 
  `kode_katalog`,
  `nama_barang`, 
  `nama_umum`, 
  `satuan`, 
  `kemasan`,
  `kategori`
  )
  VALUES
  ('', 
  '$kode_katalog',
  '$nama_barang', 
  '$nama_umum', 
  '$satuan',
  '$kemasan', 
  '$kategori'
  );

";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :    ?>
<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="alkes.php?id_usulan=<?=$_GET['id_usulan']?>";
    //]]>
  </script>
<?php }else{    // Jika Gagal, Lakukan :    
echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
echo "<br><a href='?data'>Kembali Ke Form</a>";  
}
}
?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" name="submit" class="btn btn-primary" value="Save"> 
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
	



		<?php include 'footer.php';?>

			<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

		<script type="text/javascript">
    $(function(){
       $('.select2').select2();
 });

    function isi_otomatis(){
                var id = $("#id_barang").val();
                $.ajax({
                    url: 'proses-ajax.php',
                    data:"id_barang="+id_barang ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#current_stock').val(obj.current_stock);
                   
                });
            }
</script>

