<?php include 'header.php' ;
$surat=mysqli_query($koneksi,"SELECT * FROM usulan_alkes_list WHERE id_usulan_alkes_list = $_GET[id_usulan_alkes_list]")or die(mysql_error());


$data = [];
while($d=mysqli_fetch_array($surat)){ $data[] = $d; }
?>
<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Alat Kesehatan</h4>
        <ul class="breadcrumbs">
          <a href="alkes.php?id_usulan=<?=$_GET['id_usulan'];?>" class="btn btn-info">Kembali ke menu usulan alkes</a>
        </ul>
      </div>
<div class="row">
  <div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><p align="center"><b>JUSTIFIKASI ALAT KESEHATAN<br>
          PERENCANAAN USULAN PEMBELIAN BARANG/ALAT MELALUI PENGGUNAAN SALDO AWAL BLU<br>
          UNTUK OPERASIONAL BBLK PALEMBANG<br>
          TAHUN 2022</b></p></h4>
								</div>
								<div class="card-body">
          <?php $usulan_alkes=mysqli_query($koneksi,"SELECT * FROM usulan_alkes_list inner join barang on usulan_alkes_list.id_barang=barang.id_barang WHERE id_usulan_alkes_list='$_GET[id_usulan_alkes_list]'")or die(mysql_error());
          $show=mysqli_fetch_array($usulan_alkes);
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
       
          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleMerek">
                  <span class="fas fa-plus"></span> Tambah Data Merek</button> <br><br>
              
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
              $usulan_alkes=mysqli_query($koneksi,"SELECT * FROM merek_alkes inner join usulan_alkes_list on merek_alkes.id_usulan_alkes_list=usulan_alkes_list.id_usulan_alkes_list where merek_alkes.id_usulan_alkes_list='$show[id_usulan_alkes_list]'")or die(mysql_error());
              $no=1;
              while($d=mysqli_fetch_array($usulan_alkes)){ 
                ?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?= $d["nama_merek"] ?></td>
                  <td><?= $d["spesifikasi_merek"] ?></td>
                  <td>Rp <?= number_format($d["harga_merek"],0) ?></td>
                  <td>
                  
                    <button type="button" class="btn btn-icon btn-round btn-primary" data-toggle="modal" data-target="#exampleEdit_<?php echo $d['id_merek_alkes']; ?>">
                              <i class="fa fa-edit"></i>
                            </button>
                    <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='controller/v1.php?hapusmerek&id_merek_alkes=<?php echo $d['id_merek_alkes']; ?>&id_usulan=<?php echo $d['id_usulan']; ?>&id_usulan_alkes=<?php echo $d['id_usulan_alkes']; ?>' }" class="btn btn-icon btn-round btn-danger"> <i class="fa fa-trash"></i></a>
                     
                  </td>
                </tr> 


<!-- Modal Edit usulan_alkes-->
    <div class="modal fade" id="exampleEdit_<?php echo $d['id_merek_alkes']; ?>" tabindex="-1" role="dialog">
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
              <input type="hidden" name="id_merek_alkes" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['id_merek_alkes']?>">
              <input type="hidden" name="id_usulan_alkes" class="form-control" id="email2" placeholder="Input Jumlah" value="<?=$d['id_usulan_alkes']?>">
             
            
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
              <input type="submit" name="update" class="btn btn-primary" value="Update merek alkes">
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
    $id_merek_alkes=$_GET['id_merek_alkes'];
    $id_usulan=$_GET['id_usulan'];
$query2 = "DELETE FROM merek_alkes WHERE id_merek_alkes='$id_merek_alkes'";
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
              <input type="hidden" name="id_usulan_alkes" class="form-control" id="email2" placeholder="Input spesifikasi umum"value="<?=$show['id_usulan_alkes'];?>">
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



<?php include 'footer.php' ?>
