<?php include 'header.php'; 
$barang=mysqli_query($koneksi,"SELECT * FROM barang where kategori='Peralatan Kantor'")or die(mysql_error());
?>  
  <div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">Master Data Peralatan Kantor</h4>
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
                <a href="master-alkes.php?data">Peralatan Kantor</a>
              </li>
            </ul>
          </div>
          <?php if(isset($_GET['data'])){ ?>
          <div class="row">
            <div class="col-sm-12 col-md-12">
          <div class="card card-stats card-round">
            <div class="card-body ">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-primary bubble-shadow-small">
                    <i class="flaticon-box-1"></i>
                  </div>
                </div>
                <div class="col col-stats ml-3 ml-sm-0">
                  <div class="numbers">
                    <p class="card-category">Jumlah Peralatan Kantor</p>
                    <h4 class="card-title"><?= mysqli_num_rows($barang); ?></h4>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        
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
                          <th>Kode Katalog</th>
                          <th width="250px">Nama Barang</th>
                          <th>Nama Umum</th>
                          <th>Satuan</th>
                          <th>Kemasan</th>
                          <th>Kategori</th>
                          <th width="150px">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $sql = "SELECT * FROM barang where kategori='Peralatan Kantor'";
                          $query = mysqli_query($koneksi,$sql);
                          $no=1;
                          while ($a = mysqli_fetch_array($query)) :?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $a['kode_katalog'] ?></td>
                          <td><?php echo $a['nama_barang'] ?></td>
                          <td><?php echo $a['nama_umum'] ?></td>
                          <td><?php echo $a['satuan'] ?></td>
                          <td><?php echo $a['kemasan'] ?></td>
                          <td><?php echo $a['kategori'] ?></td>
                          <td>
                            <a class="btn btn-icon btn-warning" href="?edit&id_barang=<?php echo $a['id_barang']; ?>"  title='Edit'><i class="fa fa-edit"></i></a>

                            <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapus&id_barang=<?php echo $a['id_barang']; ?>' }" class="btn btn-icon btn-danger"><i class="fa fa-trash"  title='Hapus'></i></a>

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
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kode Katalog </label>

    <div class="col-sm-12">
      <input type="text" id="form-field-1-1" placeholder="" name="kode_katalog" value="<?php echo $d['kode_katalog']?>" class="form-control col-xs-10 col-sm-6" />
    </div>
  </div>

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
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kemasan</label>

    <div class="col-sm-12">
      <input type="text" id="form-field-1-1" placeholder="" name="kemasan" value="<?php echo $d['kemasan']?>" class="form-control col-xs-10 col-sm-6" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kategori</label>

    <div class="col-sm-12">
      <select class="form-control" name="kategori">
       <!--  <option value="Alat Kesehatan" <?php if($d['kategori']=='Alat Kesehatan'){ echo "selected";} ?> >Alat Kesehatan</option> -->
        <!-- <option value="Pengolah Data" <?php if($d['kategori']=='Pengolah Data'){ echo "selected";} ?>>Pengolah Data</option> -->
        <option value="Peralatan Kantor" <?php if($d['kategori']=='Peralatan Kantor'){ echo "selected";} ?>>Peralatan Kantor</option>
      </select>
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
$kode_katalog = $_POST['kode_katalog'];
$nama_barang = $_POST['nama_barang'];
$nama_umum = $_POST['nama_umum'];
$satuan = $_POST['satuan'];
$kemasan = $_POST['kemasan'];
$kategori = $_POST['kategori'];


    $update=mysqli_query($koneksi,"UPDATE `barang` 
  SET
  `kode_katalog` = '$kode_katalog', 
  `nama_barang` = '$nama_barang', 
  `nama_umum` = '$nama_umum', 
  `satuan` = '$satuan', 
  `kemasan` = '$kemasan', 
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
       <!--  <option value="" disabled="">Pilih</option> -->
       <!--  <option value="Alat Kesehatan">Alat Kesehatan</option> -->
        <option value="Pengolah Data">Pengolah Data</option>
        <!-- <option value="Peralatan Kantor">Peralatan Kantor</option> -->
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