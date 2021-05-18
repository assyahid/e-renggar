<?php include 'header.php'; ?>	
	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Batas Tanggal</h4>
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
								<a href="#">Master Data</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Batas Tanggal</a>
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
													<th>Tanggal</th>
													<th>Periode</th>
													<th>Tahun</th>
													<th>Opsi</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>No</th>
													<th>Tanggal</th>
													<th>Periode</th>
													<th>Tahun</th>
													<th>Opsi</th>
												</tr>
											</tfoot>
											<tbody>
											<?php
									        $query = mysqli_query($koneksi,"SELECT * FROM batas_tanggal");
									        $no=1;
									        while ($a = mysqli_fetch_array($query)) :?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $a['tanggal'] ?></td>
													<td><?php echo $a['periode'] ?></td>
													<td><?php echo $a['tahun'] ?></td>
													<td><a class="btn btn-warning" href="?edit&id_batas_tanggal=<?php echo $a['id_batas_tanggal']; ?>">Edit</a>
														<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapus&id_batas_tanggal=<?php echo $a['id_batas_tanggal']; ?>' }" class="btn btn-danger"> Hapus</a>
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
    $id_batas_tanggal=$_GET['id_batas_tanggal'];
$query2 = "DELETE FROM batas_tanggal WHERE id_batas_tanggal='$id_batas_tanggal'";
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
									<h4 class="card-title">Edit Data batas tanggal</h4>
								</div>
								<div class="card-body">
									<?php
$id_batas_tanggal=$_GET['id_batas_tanggal'];
$det=mysqli_query($koneksi,"SELECT * FROM batas_tanggal where id_batas_tanggal='$id_batas_tanggal' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  

<form action="" method="post" enctype="multipart/form-data">
    <table class="table table-hover">
      <tr hidden>
        <td></td>
        <td><input type="hidden" name="id_batas_tanggal" value="<?php echo $d['id_batas_tanggal'] ?>"></td>
      </tr>
      <tr>
        <td>Tanggal</td>
        <td><input type="text" class="form-control" name="tanggal" value="<?php echo $d['tanggal'] ?>"></td>
      </tr>
      <tr>
        <td>Periode</td>
        <td><input type="text" class="form-control" name="periode" value="<?php echo $d['periode'] ?>"></td>
      </tr>
      <tr>
        <td>Tahun</td>
        <td><input type="text" class="form-control" name="tahun" value="<?php echo $d['tahun'] ?>"></td>
      </tr>
    </table>
  
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
<?php  if(isset($_POST['submit1'])){
$id_batas_tanggal=$_GET['id_batas_tanggal'];
$tanggal = $_POST['tanggal'];
$periode = $_POST['periode'];
$tahun = $_POST['tahun'];


    $update=mysqli_query($koneksi,"
UPDATE `batas_tanggal` 
  SET
  `tanggal` = '$tanggal', 
  `periode` = '$periode', 
  `tahun` = '$tahun'
  
  WHERE
  `id_batas_tanggal` = '$id_batas_tanggal' ;
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


<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data batas_tanggal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
               <form action="" method="post" class="niceform" enctype="multipart/form-data">
            <div class="form-group">
              <label>Tanggal </label>
              <input name="tanggal" type="date" class="form-control" placeholder="nama Lengkap ..">
            </div>
            <div class="form-group">
              <label>Periode </label>
              <input name="periode" type="text" class="form-control" placeholder="batas_tanggalname ..">
            </div>
            <div class="form-group">
              <label>Tahun </label>
              <input name="tahun" type="text" class="form-control" placeholder="Password ..">
            </div>
           
             

<?php
if(isset($_POST['submit'])){
$tanggal = $_POST['tanggal'];
$periode = $_POST['periode'];
$tahun = $_POST['tahun'];


$query = "INSERT INTO `batas_tanggal` 
  (`id_batas_tanggal`, 
  `tanggal`, 
  `periode`, 
  `tahun`
  )
  VALUES
  ('', 
  '$tanggal', 
  '$periode', 
  '$tahun'
  );

";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :    
echo '<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="?data";
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