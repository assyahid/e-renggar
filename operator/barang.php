<?php include 'header.php'; ?>	
	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Barang</h4>
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
								<a href="#">Data Barang</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="barang.php?data">Data Barang</a>
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
													<th width="250px">Nama Barang</th>
										            <th>Nama Umum</th>
										            <th>Satuan</th>
										            <th>Kategori</th>
													<th width="90px">Opsi</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>No</th>
													<th width="250px">Nama Barang</th>
										            <th>Nama Umum</th>
										            <th>Satuan</th>
										            <th>Kategori</th>
													<th width="90px">Opsi</th>
												</tr>
											</tfoot>
											<tbody>
											<?php
									        $sql = "SELECT * FROM barang";
									        $query = mysqli_query($koneksi,$sql);
									        $no=1;
									        while ($a = mysqli_fetch_array($query)) :?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $a['nama_barang'] ?></td>
													<td><?php echo $a['nama_umum'] ?></td>
													<td><?php echo $a['satuan'] ?></td>
													<td><?php echo $a['kategori'] ?></td>
													<td><a class="blue" href="cetak_sp.php?id_barang=<?php echo $a['id_barang']; ?>" title='cetak PDF' target="_BLANK">
															<i class="ace-icon fa fa-print bigger-130"></i>
														</a>

														<a class="blue" href="?lengkapidata&id_barang=<?php echo $a['id_barang']; ?>" title='Lengkapi Data'>
															<i class="ace-icon fa fa-plus bigger-130"></i>
														</a>

														<a class="blue" href="?detail&id_barang=<?php echo $a['id_barang']; ?>"  title='Detail'>
															<i class="ace-icon fa fa-search-plus bigger-130"></i>
														</a>

														<a class="green" href="?edit&id_barang=<?php echo $a['id_barang']; ?>"  title='Edit'>
															<i class="ace-icon fa fa-edit bigger-130"></i>
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
    $id_barang=$_GET['id_barang'];
$query2 = "DELETE FROM barang WHERE id_barang='$id_barang'";
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
$id_barang=$_GET['id_barang'];
$det=mysqli_query($koneksi,"SELECT * FROM barang where id_barang='$id_barang' ")or die(mysql_error());
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
$id_barang = $_GET['id_barang'];
$no_surat = $_POST['no_surat'];
$perihal = $_POST['perihal'];
$lampiran = $_POST['lampiran'];
$tgl_surat = $_POST['tgl_surat'];
$judul_surat = $_POST['judul_surat'];
$isi_surat = $_POST['isi_surat'];

    $update=mysqli_query($koneksi,"UPDATE `barang` 
	SET
	`no_surat` = '$no_surat', 
	`perihal` = '$perihal', 
	`lampiran` = '$lampiran', 
	`tgl_surat` = '$tgl_surat', 
	`judul_surat` = '$judul_surat', 
	`isi_surat` = '$isi_surat'
	WHERE
	`id_barang` = '$id_barang' ;

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
$id_barang=$_GET['id_barang'];
$det=mysqli_query($koneksi,"SELECT * FROM barang where id_barang='$id_barang' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  

<center><h3><b>BALAI BESAR LABORATORIUM KESEHATAN PALEMBANG<br> DAFTAR RIWAYAT HIDUP PEGAWAI</b></h3></center>

<br>

<table class="table table-responsive">
	<tr>
		<td colspan="3"><label><b><i>I. IDENTITAS PRIBADI</i></b></label></td>
	</tr>
	<tr>
		<td><label><font color="">no_surat</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['no_surat']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">NIP/NRP Baru</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['perihal']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">NIP/NRP Lama</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['lampiran']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">No. Kartu Pegawai</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['tgl_surat']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Tempat/Tanggal Lahir</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['judul_surat']?>, <?php echo $d['isi_surat']?></font></label></td>
	</tr>
	
	
</table>
	</div>
						</div>
					</div>
				</div>
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

$query = "INSERT INTO `barang` 
	(`id_barang`, 
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
    window.location="barang.php?data";
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