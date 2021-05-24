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
													<td>
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
									<h4 class="card-title">Edit Data Barang</h4>
								</div>
								<div class="card-body">
<?php
$id_barang=$_GET['id_barang'];
$det=mysqli_query($koneksi,"SELECT * FROM barang where id_barang='$id_barang' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?> 

 <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
   
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Barang </label>

		<div class="col-sm-12">
			<input type="text" id="form-field-1-1" placeholder="" name="nama_barang" value="<?php echo $d['nama_barang']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Umum</label>

		<div class="col-sm-12">
			<input type="text" id="form-field-1-1" placeholder="" name="nama_umum" value="<?php echo $d['nama_umum']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Satuan</label>

		<div class="col-sm-12">
			<input type="text" id="form-field-1-1" placeholder="" name="satuan" value="<?php echo $d['satuan']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kategori</label>

		<div class="col-sm-12">
			<input type="date" id="form-field-1-1" placeholder="" name="kategori" value="<?php echo $d['kategori']?>" class="form-control col-xs-10 col-sm-6" />
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
$nama_barang = $_POST['nama_barang'];
$nama_umum = $_POST['nama_umum'];
$satuan = $_POST['satuan'];
$kategori = $_POST['kategori'];


    $update=mysqli_query($koneksi,"UPDATE `barang` 
	SET
	`nama_barang` = '$nama_barang', 
	`nama_umum` = '$nama_umum', 
	`satuan` = '$satuan', 
	`kategori` = '$kategori'
	WHERE
	`id_barang` = '$id_barang' ;

  ") or die ("gagal update");
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
		<td><label><font color="">nama_barang</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['nama_barang']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">NIP/NRP Baru</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['nama_umum']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">NIP/NRP Lama</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['satuan']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">No. Kartu Pegawai</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['kategori']?></font></label></td>
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
                <h4 class="modal-title">Tambah Data Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
               <form action="" method="post" class="niceform" enctype="multipart/form-data">
            <form class="form-horizontal" role="form" method="post" action="">
	

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
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kategori</label>

		<div class="col-sm-12">
			<select class="form-control" name="kategori">
				<option value="Alat Kesehatan">Alat Kesehatan</option>
				<option value="Pengolah Data">Pengolah Data</option>
				<option value="Peralatan Kantor">Peralatan Kantor</option>
			</select>
		</div>
	</div>


	

             

<?php
if(isset($_POST['submit'])){
$nama_barang = $_POST['nama_barang'];
$nama_umum = $_POST['nama_umum'];
$satuan = $_POST['satuan'];
$kategori = $_POST['kategori'];


$query = "INSERT INTO `barang` 
	(`id_barang`, 
	`nama_barang`, 
	`nama_umum`, 
	`satuan`, 
	`kategori`
	)
	VALUES
	('', 
	'$nama_barang', 
	'$nama_umum', 
	'$satuan', 
	'$kategori'
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