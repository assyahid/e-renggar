<?php include 'header.php'; ?>	
	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Surat Permohonan</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Data Surat Permohonan</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="surat_permohonan.php?data">Surat Permohonan</a>
							</li>
						</ul>
					</div>
					<?php if(isset($_GET['data'])){ ?>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-default">
                <span class="fas fa-plus"></span> Input Data</button></h4>
									
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="multi-filter-select" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th width="250px">No Surat</th>
										            <th>Perihal</th>
										            <th>Lampiran</th>
										            <th>Tanggal</th>
										            <th>Judul</th>
										            <th>Status</th>
													<th width="90px">Opsi</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>No</th>
													<th width="250px">No Surat</th>
										            <th>Perihal</th>
										            <th>Lampiran</th>
										            <th>Tanggal</th>
										            <th>Judul</th>
										            <th>Status</th>
													<th width="90px">Opsi</th>
												</tr>
											</tfoot>
											<tbody>
											<?php
									        $sql = "SELECT * FROM surat_permohonan where status_surat in ('Telah divalidasi Kasubbag Administrasi Umum','Telah divalidasi Koordinator Tata Usaha','Telah divalidasi Kepala')";
									        $query = mysqli_query($koneksi,$sql);
									        $no=1;
									        while ($a = mysqli_fetch_array($query)) :?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $a['no_surat'] ?></td>
													<td><?php echo $a['perihal'] ?></td>
													<td><?php echo $a['lampiran'] ?></td>
													<td><?php echo $a['tgl_surat'] ?></td>
													<td><?php echo $a['judul_surat'] ?></td>
													<td><?php if ($a['status_surat']=="Belum di validasi") { ?>
														<span class="badge badge-warning"><?php echo $a['status_surat'] ?></span>
													<?php } elseif ($a['status_surat']=="Telah divalidasi Kasubbag Administrasi Umum") { ?>
														<span class="badge badge-default"><?php echo $a['status_surat'] ?></span>
													 <?php } elseif ($a['status_surat']=="Telah divalidasi Koordinator Tata Usaha") { ?>
														<span class="badge badge-info"><?php echo $a['status_surat'] ?></span>
													 <?php }  elseif ($a['status_surat']=="Telah divalidasi Kepala") { ?>
														<span class="badge badge-success"><?php echo $a['status_surat'] ?></span>
													 <?php } ?></td>
													<td><a class="blue btn btn-info" href="?detail&id_surat_permohonan=<?php echo $a['id_surat_permohonan']; ?>"  title='Validasi'>
															<i class="ace-icon fa fa-search-plus bigger-130"></i>Validasi
														</a>

													
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
					  <?php } ?>

<?php
  if(isset($_GET['hapus'])){
    $id_surat_permohonan=$_GET['id_surat_permohonan'];
$query2 = "DELETE FROM surat_permohonan WHERE id_surat_permohonan='$id_surat_permohonan'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak  // Jika Sukses, Lakukan :  
echo '<script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="?data";
    //]]>
  </script>'; // Redirect ke halaman index.php
} else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='?data'>Kembali</a>";
}
  }
?>


<?php if(isset($_GET['edit'])){ ?>
<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Edit Data Surat Permohonan</h4>
								</div>
								<div class="card-body">
<?php
$id_surat_permohonan=$_GET['id_surat_permohonan'];
$det=mysqli_query($koneksi,"SELECT * FROM surat_permohonan where id_surat_permohonan='$id_surat_permohonan' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?> 

 <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
   
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> No Surat </label>

		<div class="col-sm-12">
			<input type="text" id="form-field-1-1" placeholder="" name="no_surat" value="<?php echo $d['no_surat']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Perihal</label>

		<div class="col-sm-12">
			<input type="text" id="form-field-1-1" placeholder="" name="perihal" value="<?php echo $d['perihal']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Lampiran</label>

		<div class="col-sm-12">
			<input type="text" id="form-field-1-1" placeholder="" name="lampiran" value="<?php echo $d['lampiran']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Tanggal Surat</label>

		<div class="col-sm-12">
			<input type="date" id="form-field-1-1" placeholder="" name="tgl_surat" value="<?php echo $d['tgl_surat']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Judul Surat</label>

		<div class="col-sm-12">
			<input type="text" id="form-field-1-1" placeholder="" name="judul_surat" value="<?php echo $d['judul_surat']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Isi Surat</label>

		<div class="col-sm-12">
			<textarea type="text" id="artikel" placeholder="" name="isi_surat"  class="form-control"><?php echo $d['isi_surat']?></textarea>
		</div>
	</div>

	

	
        <!-- /.box-body -->
        <div class="card-footer">
        <a class="btn btn-info" href="?data"><span class="glyphicon glyphicon-arrow-left"></span>  Back</a>
          <input type="submit" name="submit1" class="btn btn-primary" value="Update">
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

								</div>
						</div>
					</div>
				</div>

<?php 
}
?>
<?php  
if(isset($_POST['submit1'])){
$id_surat_permohonan = $_GET['id_surat_permohonan'];
$no_surat = $_POST['no_surat'];
$perihal = $_POST['perihal'];
$lampiran = $_POST['lampiran'];
$tgl_surat = $_POST['tgl_surat'];
$judul_surat = $_POST['judul_surat'];
$isi_surat = $_POST['isi_surat'];

    $update=mysqli_query($koneksi,"UPDATE `surat_permohonan` 
	SET
	`no_surat` = '$no_surat', 
	`perihal` = '$perihal', 
	`lampiran` = '$lampiran', 
	`tgl_surat` = '$tgl_surat', 
	`judul_surat` = '$judul_surat', 
	`isi_surat` = '$isi_surat'
	WHERE
	`id_surat_permohonan` = '$id_surat_permohonan' ;

  ") or die ("gagal update ");
    echo '<script type="text/javascript">
        //<![CDATA[
        alert ("Edit Success");
        window.location="?data";
        //]]>
    </script>';
    
        }
?>
<?php } ?>


<?php if(isset($_GET['detail'])){ ?>
<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"></h4>
								</div>
								<div class="card-body">      
<?php
$id_surat_permohonan=$_GET['id_surat_permohonan'];
$det=mysqli_query($koneksi,"SELECT * FROM surat_permohonan where id_surat_permohonan='$id_surat_permohonan' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  

<embed src="cetak_sp.php?id_surat_permohonan=<?php echo $d['id_surat_permohonan']; ?>" type="application/pdf" width="100%" height="600px" />

<div class="card">
<div class="card-header">
	<h4 class="card-title"></h4>
</div>
<div class="card-body">   
<form method="POST" action="">
	<table class="table">
		<tr>
			<td>Status</td>
			<td><span class="badge badge-warning"><?php echo $d['status_surat']; ?></span></td>
		</tr>
		<tr>
			<td>Validasi</td>
			<td><select class="form-control" name="status_surat" readonly>
				<option value="">-Pilih-</option>
				<option value="Telah divalidasi Kepala">Validasi</option>
				<option value="ditolak Koordinator Tata Usaha">Ditolak</option>
			</select></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td><textarea input type="text" class="form-control" name="Keterangan"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="valid" class="btn btn-default"></td>
		</tr>
	</table>
</form>
</div>
</div>




	</div>
						</div>
					</div>
				</div>
<?php  
if(isset($_POST['valid'])){
$id_surat_permohonan = $d['id_surat_permohonan'];
$status_surat = $_POST['status_surat'];
$keterangan = $_POST['keterangan'];

    $update=mysqli_query($koneksi,"UPDATE `surat_permohonan` 
	SET
	`status_surat` = '$status_surat', 
	`keterangan` = '$keterangan'
	WHERE
	`id_surat_permohonan` = '$id_surat_permohonan' ;

  ") or die ("gagal update ");
    echo '<script type="text/javascript">
        //<![CDATA[
        alert ("Validasi Success");
        window.location="?data";
        //]]>
    </script>';
    
        }
?>


<?php } }
?>





<!-- tambah -->
<div class="modal fade" id="modal-default">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data Surat Permohonan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
               <form action="" method="post" class="niceform" enctype="multipart/form-data">
            <form class="form-horizontal" role="form" method="post" action="">

	
	

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">No Surat </label>

		<div class="col-sm-12">
			<input type="text" placeholder="" name="no_surat" class="form-control" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Perihal</label>

		<div class="col-sm-12">
			<input type="text" placeholder="" name="perihal" class="form-control" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Lampiran</label>

		<div class="col-sm-12">
			<input type="text"  placeholder="" name="lampiran" class="form-control" />
		</div>
	</div>


	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Tanggal Surat</label>

		<div class="col-sm-12">
			<input type="date"  placeholder="" name="tgl_surat" class="form-control" />
		</div>
	</div>


	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Judul Surat</label>

		<div class="col-sm-12">
			<input type="text"  placeholder="" name="judul_surat" class="form-control" />
		</div>
	</div>

	

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Isi Surat</label>

		<div class="col-sm-12">
			<textarea id="artikel"  placeholder="" name="isi_surat" class="form-control"/><p style="text-align: justify;">Sehubungan dengan telah berakhirnya Tahun Anggaran 2020, maka dengan ini kami mengharapkan Saudara dapat menyampaikan Laporan Realisasi Kegiatan yang mengacu pada usulan Program Kerja Tahun anggaram 2020 pada Bagian/ Sub.Bagian/ Bidang/ Seksi/ Instalasi yang Saudara pimpin, format laporan terlampir, selanjutnya disampaikan kepada Kepala Bagian Keuangan dan Administrasi Umum melalui Sub Bagian Administrasi Umum BBLK Palembang selambatnya tanggal 11 Januari 2021.</p><p style="text-align: justify;">Mengingat pentingnya laporan tersebut, guna mengevaluasi hasil kegiatan TA 2020 dan tersusunnya kegiatan TA 2021 yang lebih baik, diharapkan dapat disampaikan tepat waktu.</p><p style="text-align: justify;">Demikianlah, atas perhatian dan kerjasama yang baik diucapkan terima kasih.</p></textarea>
		</div>
	</div>

	

             

<?php
if(isset($_POST['submit'])){
$no_surat = $_POST['no_surat'];
$perihal = $_POST['perihal'];
$lampiran = $_POST['lampiran'];
$tgl_surat = $_POST['tgl_surat'];
$judul_surat = $_POST['judul_surat'];
$isi_surat = $_POST['isi_surat'];
$status_surat = "Belum di validasi";

$query = "INSERT INTO `surat_permohonan` 
	(`id_surat_permohonan`, 
	`no_surat`, 
	`perihal`, 
	`lampiran`, 
	`tgl_surat`, 
	`judul_surat`, 
	`isi_surat`, 
	`status_surat`
	)
	VALUES
	('', 
	'$no_surat', 
	'$perihal', 
	'$lampiran', 
	'$tgl_surat', 
	'$judul_surat', 
	'$isi_surat', 
	'$status_surat'
	);

";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :    
echo '<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="surat_permohonan.php?data";
    //]]>
  </script>'; // Redirect ke halaman index.php  
}else{    // Jika Gagal, Lakukan :    
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













				</div>
			</div>

<?php include 'footer.php'?>