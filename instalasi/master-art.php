<?php include 'header.php'; 
$commodities=mysqli_query($koneksi,"SELECT * FROM commodities where group_id='13'")or die(mysql_error());
?>  
  <div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">Master Data ART </h4>
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
                <a href="#">Data ART</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="master-alkes.php?data">ART</a>
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
                    <p class="card-category">Jumlah ART</p>
                    <h4 class="card-title"><?= mysqli_num_rows($commodities); ?></h4>
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
                          <th>Nama</th>
                          <th>Satuan</th>
                          <th>Kemasan</th>
                          <th>Stok Digudang</th>
                          <th>Kategori</th>
                          <th width="170px">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $no=1;
                          while ($a = mysqli_fetch_array($commodities)) :?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $a['catalog_code'] ?></td>
                          <td><?php echo $a['name'] ?></td>
                          <td><?php echo $a['unit'] ?></td>
                          <td><?php echo $a['kemasan'] ?></td>
                          <td><?php echo $a['current_stock'] ?></td>
                          <td><?php if($a['group_id'] == 13){
                              echo "ART";
                          }  ?></td>
                          <td>
                            <a class="btn btn-icon btn-warning" href="?edit&id=<?php echo $a['id']; ?>"  title='Edit'><i class="fa fa-edit"></i></a>

                            <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapus&id=<?php echo $a['id']; ?>' }" class="btn btn-icon btn-danger"><i class="fa fa-trash"  title='Hapus'></i></a>

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
    $id=$_GET['id'];
$query2 = "DELETE FROM commodities WHERE id='$id'";
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
                  <h4 class="card-title">Edit Data Reagen</h4>
                </div>
                <div class="card-body">
<?php
$id=$_GET['id'];
$det=mysqli_query($koneksi,"SELECT * FROM commodities where id='$id' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?> 

 <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
   
   <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kode Katalog </label>

    <div class="col-sm-12">
      <input type="text" id="form-field-1-1" placeholder="" name="catalog_code" value="<?php echo $d['catalog_code']?>" class="form-control col-xs-10 col-sm-6" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama commodities </label>

    <div class="col-sm-12">
      <input type="text" id="form-field-1-1" placeholder="" name="name" value="<?php echo $d['name']?>" class="form-control col-xs-10 col-sm-6" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Unit</label>

    <div class="col-sm-12">
      <input type="text" id="form-field-1-1" placeholder="" name="unit" value="<?php echo $d['unit']?>" class="form-control col-xs-10 col-sm-6" />
    </div>
  </div>

   <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kemasan</label>

    <div class="col-sm-12">
      <input type="text" id="form-field-1-1" placeholder="" name="kemasan" value="<?php echo $d['kemasan']?>" class="form-control col-xs-10 col-sm-6" />
    </div>
  </div>

  <div class="form-group" hidden="">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kategori</label>

    <div class="col-sm-12">
      <input type="text" id="form-field-1-1" placeholder="" name="group_id" value="<?php echo $d['group_id']?>" class="form-control col-xs-10 col-sm-6" />
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
$id = $_GET['id'];
$catalog_code = $_POST['catalog_code'];
$name = $_POST['name'];
$unit = $_POST['unit'];
$satuan = $_POST['satuan'];
$group_id = $_POST['group_id'];


    $update=mysqli_query($koneksi,"UPDATE `commodities` 
  SET
  `catalog_code` = '$catalog_code', 
  `name` = '$name', 
  `unit` = '$unit',  
  `kemasan` = '$kemasan', 
  `group_id` = '$group_id'
  WHERE
  `id` = '$id' ;

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
                <h4 class="modal-title">Tambah Data commodities</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
               <form action="" method="post" class="niceform" enctype="multipart/form-data">
            <form class="form-horizontal" role="form" method="post" action="">
  
   <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Kode Katalog </label>

    <div class="col-sm-12">
      <input type="text" placeholder="" name="catalog_code" class="form-control" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama commodities </label>

    <div class="col-sm-12">
      <input type="text" placeholder="" name="name" class="form-control" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Umum</label>

    <div class="col-sm-12">
      <input type="text" placeholder="" name="unit" class="form-control" />
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


  <div class="form-group" hidden="">
    <label class="col-sm-3 control-label no-padding-right" for="bird"> Kategori</label>

    <div class="col-sm-12 select2-input">
     <input type="text" placeholder="" name="group_id" value="14" class="form-control" />
    </div>
  </div>


  
<?php
if(isset($_POST['submit'])){
$catalog_code = $_POST['catalog_code'];
$name = $_POST['name'];
$unit = $_POST['unit'];
$kemasan = $_POST['kemasan'];
$group_id = $_POST['group_id'];


$query = "INSERT INTO `commodities` 
  (`id`, 
  `catalog_code`,
  `name`, 
  `unit`,  
  `kemasan`,
  `group_id`
  )
  VALUES
  ('', 
  '$catalog_code',
  '$name', 
  '$unit', 
  '$kemasan', 
  '$group_id'
  );

";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :    
echo '<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="commodities.php?data";
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