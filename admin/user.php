<?php include 'header.php'; ?>	
	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Users</h4>
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
								<a href="#">Users</a>
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
													<th>Nama</th>
													<th>Password</th>
                          <th>Atasan</th>
													<th>Level</th>
													<th>Opsi</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>No</th>
                          <th>Nama</th>
                          <th>Password</th>
                          <th>Atasan</th>
                          <th>Level</th>
                          <th>Opsi</th>
												</tr>
											</tfoot>
											<tbody>
											<?php
									        $query = mysqli_query($koneksi,"SELECT * FROM users");
									        $no=1;
									        while ($a = mysqli_fetch_array($query)) :?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $a['nama'] ?></td>
													<td><?php echo $a['password'] ?></td>
													<td><?php echo $a['atasan'] ?></td>
													<td><?php echo $a['level'] ?></td>
													<td><a class="btn btn-warning" href="?edit&id_user=<?php echo $a['id_user']; ?>">Edit</a>
														<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapus&id_user=<?php echo $a['id_user']; ?>' }" class="btn btn-danger"> Hapus</a>
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
    $id_user=$_GET['id_user'];
$query2 = "DELETE FROM users WHERE id_user='$id_user'";
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
									<h4 class="card-title">Edit Data Users</h4>
								</div>
								<div class="card-body">
									<?php
$id_user=$_GET['id_user'];
$det=mysqli_query($koneksi,"SELECT * FROM users where id_user='$id_user' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  

<form action="" method="post" enctype="multipart/form-data">
    <table class="table table-hover">
      <tr hidden>
        <td></td>
        <td><input type="hidden" name="id_user" value="<?php echo $d['id_user'] ?>"></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="text" class="form-control" name="password" value="<?php echo $d['password'] ?>"></td>
      </tr>
       <tr>
        <td>Atasan</td>
        <td><input type="text" class="form-control" name="atasan" value="<?php echo $d['atasan'] ?>"></td>
      </tr>
      <tr>
        <td>Level</td>
        <td><select name="level" class="form-control">
                <option value="<?php echo $d['level'] ?>"><?php echo $d['level'] ?></option>
                <option value="admin">admin</option>
                <option value="kepala">Kepala</option>
                <option value="koordinator">Koordinator</option>
                <option value="subbag">Subbag</option>
                <option value="instalasi">Instalasi</option>
              </select></td>
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
$id_user=$_GET['id_user'];
$nama = $_POST['nama'];
$atasan = $_POST['atasan'];
$password = $_POST['password'];
$level = $_POST['level'];

    $update=mysqli_query($koneksi,"UPDATE users SET 
  nama = '$nama' , 
  atasan = '$atasan' , 
  PASSWORD = '$password' , 
  LEVEL = '$level'
  
  WHERE
  id_user = '$id_user'  ") or die ("gagal update ");
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
                <h4 class="modal-title">Tambah Data User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
               <form action="" method="post" class="niceform" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nama </label>
              <input name="nama" type="text" class="form-control" placeholder="nama Lengkap ..">
            </div>
            <div class="form-group">
              <label>Password </label>
              <input name="password" type="text" class="form-control" placeholder="Password ..">
            </div>
             <div class="form-group">
              <label>Atasan </label>
               <select name="id_user" id="nama" class="select2 form-control">
                            <option disabled="" selected>Pilih Atasan</option>
                             <?php 
                           
                                $sql = "SELECT * FROM users";
                                $kat = mysqli_query($koneksi,$sql);
                                // print_r($kat); 
                                while ($a = mysqli_fetch_array($kat)) {?>
                                   <option value="<?php echo $a['id_user'];?>"><?php echo $a['nama'];?></option>";
                                <?php }
                                ?>
                        </select>
            </div>
            <div class="form-group">
              <label>Level </label>
              <select name="level" class="form-control">
                <option >.:pilih level:.</option>
               <option value="admin">admin</option>
                <option value="kepala">Kepala</option>
                <option value="koordinator">Koordinator</option>
                <option value="subbag">Subbag</option>
                <option value="instalasi">Instalasi</option>
              </select>
            </div>
             

<?php
if(isset($_POST['submit'])){
$nama = $_POST['nama'];
$atasan = $_POST['atasan'];
$password = md5($_POST['password']);
$level = $_POST['level'];

$query = "INSERT INTO users 
  (id_user, 
  nama, 
  atasan, 
  PASSWORD, 
  LEVEL
  )
  VALUES
  ('', 
  '$nama', 
  '$atasan', 
  '$password', 
  '$level'
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