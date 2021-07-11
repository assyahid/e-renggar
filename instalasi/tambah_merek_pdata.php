<?php include 'header.php' ;
$surat=mysqli_query($koneksi,"SELECT * FROM usulan WHERE id_usulan = $_GET[id_usulan]")or die(mysql_error());


$data = [];
while($d=mysqli_fetch_array($surat)){ $data[] = $d; }
?>
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Alat Pengolah Data</h4>
        <ul class="breadcrumbs">
          <a href="p-data.php?id_usulan=<?=$_GET['id_usulan'];?>" class="btn btn-info">Kembali ke menu usulan Pengolah Data</a>
        </ul>
      </div>
<div class="row">
  <div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><p align="center"><b>JUSTIFIKASI ALAT PENGOLAH DATA<br>
          PERENCANAAN USULAN PEMBELIAN BARANG/ALAT MELALUI PENGGUNAAN SALDO AWAL BLU<br>
          UNTUK OPERASIONAL BBLK PALEMBANG<br>
          TAHUN 2022</b></p></h4>
								</div>
								<div class="card-body">
          <?php $pdata=mysqli_query($koneksi,"SELECT * FROM pdata inner join barang on pdata.id_barang=barang.id_barang WHERE id_pdata='$_GET[id_pdata]' and pdata.id_usulan = '".$_GET['id_usulan']."'")or die(mysql_error());
          $show=mysqli_fetch_array($pdata);
          ?>
          <table class="table table-bordered">
            <tr>
              <td>Nama Alat</td>
              <td>: <?=$show['nama_barang']?></td>
              <td>Jumlah tersedia </td>
              <td>: <?=$show['jumlah_tersedia']?></td>
            </tr>
            <tr>
              <td>Kondisi</td>
              <td>: <?=$show['kondisi']?></td>
              <td>Jumlah Kebutuhan</td>
              <td>: <?=$show['jumlah_kebutuhan']?></td>
            </tr>
            <tr>
              <td colspan="2">Justifikasi</td>
              <td colspan="2">: <?=$show['justifikasi']?></td>
            </tr>
          </table>
              <?php if ($data[0]['status']=="Pengajuan") { ?>
          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleMerek">
                  <span class="fas fa-plus"></span> Tambah Data Merek</button> <br> <br>
                     <?php }  ?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Merek</th>
                <th>Spesifikasi</th>
                <th>Harga</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $pdata=mysqli_query($koneksi,"SELECT * FROM merek_pdata inner join pdata on merek_pdata.id_pdata=pdata.id_pdata where merek_pdata.id_pdata='$show[id_pdata]'")or die(mysql_error());
              $no=1;
              while($d=mysqli_fetch_array($pdata)){ 
                ?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?= $d["nama_merek"] ?></td>
                  <td><?= $d["spesifikasi_merek"] ?></td>
                  <td>Rp <?= number_format($d["harga_merek"],0) ?></td>
                  <td>
                     <?php if ($data[0]['status']=="Pengajuan") { ?>
                    <button type="button" class="btn btn-icon btn-round btn-primary" data-toggle="modal" data-target="#exampleEdit_<?php echo $d['id_merek_pdata']; ?>">
                              <i class="fa fa-edit"></i>
                            </button>
                    <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='controller/v1.php?hapusmerekpdata&id_merek_pdata=<?php echo $d['id_merek_pdata']; ?>&id_usulan=<?php echo $d['id_usulan']; ?>&id_pdata=<?php echo $d['id_pdata']; ?>' }" class="btn btn-icon btn-round btn-danger"> <i class="fa fa-trash"></i></a>
                    <?php }  ?>
                  </td>
                </tr> 


<!-- Modal Edit pdata-->
    <div class="modal fade" id="exampleEdit_<?php echo $d['id_merek_pdata']; ?>" tabindex="-1" role="dialog">
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
              <input type="hidden" name="id_usulan" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$_GET['id_usulan']?>">
              <input type="hidden" name="id_merek_pdata" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['id_merek_pdata']?>">
              <input type="hidden" name="id_pdata" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['id_pdata']?>">
             
            
            <div class="col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="email2">Merek</label>
                  <input type="text" name="nama_merek" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['nama_merek']?>">
                </div>
              </div>
             
              <div class="col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="email2">Spesifikasi</label>
                  <textarea input type="text" name="spesifikasi_merek" class="form-control" id="email2" placeholder="Input Kebutuhan" value="<?=$d['spesifikasi_merek']?>"><?=$d['spesifikasi_merek']?></textarea>
                </div>
              </div>
              <div class="col-md-12 col-lg-12">
                <div class="form-group">
                  <label for="email2">Harga</label>
                  <input type="text" name="harga_merek" class="form-control" value="<?= $d["harga_merek"] ?>">
                </div>
              </div>
            <div class="modal-footer">
              <input type="submit" name="update" class="btn btn-primary" value="Update Merek Pengelola Data">
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

 <?php
    if(isset($_GET['hapusmerek'])){
    $id_merek_pdata=$_GET['id_merek_pdata'];
    $id_usulan=$_GET['id_usulan'];
$query2 = "DELETE FROM merek_pdata WHERE id_merek_pdata='$id_merek_pdata'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak  // Jika Sukses, Lakukan :  
?><script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="alkes.php?id_usulan=<?=$id_usulan?>";
    //]]>
  </script><?php
} else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='alkes.php?id_usulan=<?=$id_usulan?>'>Kembali</a>";
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
              <input type="hidden" name="id_pdata" class="form-control" id="email2" placeholder="Input spesifikasi umum"value="<?=$show['id_pdata'];?>">
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
              <input type="submit" name="submit" class="btn btn-primary" value="Tambah Merek Pengelola Data">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal Tambah Pegawai-->



<?php include 'footer.php' ?>
