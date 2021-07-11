<?php include 'header.php' ;
$surat=mysqli_query($koneksi,"SELECT * FROM usulan inner join users on usulan.id_user=users.id_user WHERE id_usulan = $_GET[id_usulan]")or die(mysql_error());

$data = [];
while($d=mysqli_fetch_array($surat)){ $data[] = $d; }
?>
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Form Usulan Perbaikan Alat Kesehatan</h4>
        <ul class="breadcrumbs">
          <a href="alkes.php?id_usulan=<?=$_GET['id_usulan'];?>" class="btn btn-info">Kembali ke menu usulan alkes</a>
        </ul>
      </div>
<div class="row">
  <div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"></h4>
								</div>
								<div class="card-body">
          <?php $usulan_barang=mysqli_query($koneksi,"SELECT * FROM usulan_barang inner join barang on usulan_barang.id_barang=barang.id_barang WHERE id_usulan_barang='$_GET[id_usulan_barang]' and usulan_barang.id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());
          $show=mysqli_fetch_array($usulan_barang);
          ?>
          <table class="table table-bordered">
            <tr>
              <td>Nama Alat</td>
              <td>: <?=$show['nama_barang']?></td>
            </tr>
            <tr>
              <td>Kondisi</td>
              <td>: <?=$show['kondisi']?></td>
             
            </tr>
            <tr>
              <td>Justifikasi</td>
              <td>: <?=$show['justifikasi']?></td>
            </tr>
            <tr>
              <td>Lokasi</td>
              <td>: <?=$data[0]['nama']?></td>
            </tr>
          </table>
         <form method="POST" action="Controller/v1.php" enctype="multipart/form-data">
          <input type="hidden" name="id_usulan" class="form-control" id="email2" value="<?=$_GET['id_usulan']?>" placeholder="Input Merek">
          <input type="hidden" name="id_usulan_barang" class="form-control" id="email2" value="<?=$_GET['id_usulan_barang']?>" placeholder="Input Merek">
             <div class="col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="email2">File</label>
                  <input type="file" name="file" class="form-control" id="email2" placeholder="Input Merek" required="">
                  <p style="color: red">Ekstensi yang diperbolehkan hanya .pdf</p>
                </div>
              </div>
              <div class="col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="email2">Keterangan</label>
                  <textarea input type="text" name="keterangan" class="form-control" id="email2" placeholder="Input keterangan" required=""></textarea>
                </div>
              </div>
              <div class="col-md-12 col-lg-12">
                <div class="form-group">
               <input type="submit" name="submit" class="btn btn-default" value="Buat Usulan Perbaikan Alkes">
                </div>
          </form>

       
        
        </div>
        <table id="multi-filter-select" class="display table table-striped table-hover" >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Alat</th>
                          <th>File Surat</th>
                          <th>Keterangan</th>
                          <th width="90px">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $usulan_barang=mysqli_query($koneksi,"SELECT * FROM perbaikan_alkes inner join usulan_barang on perbaikan_alkes.id_usulan_barang=usulan_barang.id_usulan_barang inner join barang on usulan_barang.id_barang=barang.id_barang WHERE perbaikan_alkes.id_usulan_barang = '".$_GET['id_usulan_barang']."' ")or die(mysql_error());
                        $no=1;
                        while($d=mysqli_fetch_array($usulan_barang)){ 
                          ?>
                          <tr>
                            <td><?=$no++;?></td>
                            <td><?= $d["nama_barang"] ?></td>
                            <td><a href="../image/<?= $d["file"] ?>" target="_BLANK"><?= $d["file"] ?></td>
                            <td><?= $d["justifikasi"] ?></td>
                            <td>
                              <?php if ($d['status_perbaikan_alkes']=="Pengajuan") { ?>
                            <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapus&id_perbaikan_alkes=<?php echo $d['id_perbaikan_alkes']; ?>&id_usulan=<?php echo $d['id_usulan']; ?>&id_usulan_barang=<?php echo $d['id_usulan_barang']; ?>' }" class="btn btn-icon btn-round btn-danger"> <i class="fa fa-trash"></i></a>
                              <?php } elseif($d['status_perbaikan_alkes']=="Revisi") { ?>
                              <button type="button" class="btn btn-icon btn-round btn-primary" data-toggle="modal" data-target="#exampleEdit_<?php echo $d['id_usulan_barang']; ?>">
                              <i class="fa fa-edit"></i>
                            </button>
                          <?php } else { ?>
                              <p>Sedang di Proses</p>
                          <?php } ?>
                          </td>
                          </tr> 
                            <?php } ?>
                      </tbody>
                    </table>
      </div>
    </div>
  </div>
</div>
</div>

 <?php
    if(isset($_GET['hapus'])){
    $id_perbaikan_alkes=$_GET['id_perbaikan_alkes'];
    $id_usulan=$_GET['id_usulan'];
    $id_usulan_barang=$_GET['id_usulan_barang'];
$query2 = "DELETE FROM perbaikan_alkes WHERE id_perbaikan_alkes='$id_perbaikan_alkes'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak  // Jika Sukses, Lakukan :  
?><script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="perbaikan_alkes.php?id_usulan=<?=$id_usulan?>&id_usulan_barang=<?=$id_usulan_barang?>";
    //]]>
  </script><?php
} else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='perbaikan_alkes.php?id_usulan=<?=$id_usulan?>'>Kembali</a>";
}
  }
  ?>

        <!-- Modal Tambah Pegawai-->
    <div class="modal fade" id="exampleMerek" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data Merek</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="controller/v1.php">
            <div class="modal-body">
              <input type="hidden" name="id_usulan_barang" class="form-control" id="email2" placeholder="Input spesifikasi umum"value="<?=$show['id_usulan_barang'];?>">
              <input type="hidden" name="id_usulan" class="form-control" id="email2" placeholder="Input spesifikasi umum"value="<?=$show['id_usulan'];?>">
              <input type="hidden" name="status_merek" class="form-control" id="email2" placeholder="Input spesifikasi umum"value="pengajuan">
              <div class="col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="email2">Merek</label>
                  <input type="text" name="nama_merek" class="form-control" id="email2" placeholder="Input Merek">
                </div>
              </div>
              <div class="col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="email2">Spesifikasi</label>
                  <textarea input type="text" name="spesifikasi_merek" class="form-control" id="email2" placeholder="Input Jumlah"></textarea>
                </div>
              </div>
              <div class="col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="email2">Harga</label>
                  <input type="number" name="harga_merek" class="form-control" id="email2" placeholder="Input Harga">
                </div>
              </div>
              
            </div>
            <div class="modal-footer">
              <input type="submit" name="submit" class="btn btn-primary" value="Tambah Merek">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal Tambah Pegawai-->


  </a>
</td>
</tr>
</tbody>
</table>
</form>
</div>




<?php include 'footer.php' ?>
