<?php
include 'header.php';
?>

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Usulan Reagen</h4>
				<ul class="breadcrumbs">
					<a href="detail-usulan.php?id_usulan=<?=$_GET['id_usulan'];?>" class="btn btn-info">Kembali ke menu usulan</a>
				</ul>
			</div>
			<div class="row">

          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title"></h5>

<?php
$det=mysqli_query($koneksi,"SELECT * FROM usulan_reagen where id_usulan_reagen in (SELECT MAX(id_usulan_reagen) from usulan_reagen) ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  

<table class="table">
	<tr>
		<td>No Transaksi</td>
		<td>:</td>
		<td><input type="text" class="form-control" name="no_transaksi" value="<?php echo $d['id_usulan_reagen'] ?>" readonly></td>
	</tr>
	<tr>
		<td>Tanggal Transaksi</td>
		<td>:</td>
		<td><input type="text" class="form-control" name="tgl_transaksi" value="<?php echo $d['tgl_transaksi'] ?>" readonly></td>
	</tr>
</table>






<form method="post" action="">
<table class="table">
	<tr>
		<td>Customer</td>
		<td><select class="form-control select" name="id_customer" >
                                <option value="" disabled="">-Pilih Customer-</option>
                                <?php 
                                $sql = "SELECT * FROM customer ";
                                $kat = mysqli_query($koneksi,$sql);
                                //print_r($lokasi); 
                                while ($a = mysqli_fetch_array($kat)) {
                                    echo "<option value=".$a['id_customer'].">".$a['nama_cust']."</option>";
                                }
                                ?>
                            </select></td>
	</tr>
	<tr>
		<td>Kode Produk</td>
   <!--  <td><input type="text" id="produk" name="id_produk" placeholder="Nama Produk" value="" autofocus=""></td> -->
		<td><select class="form-control select" name="id_produk" style="width: 100%" autofocus="">
                                <option value="" disabled="">-Pilih Produk-</option>
                                <?php 
                                $sql = "SELECT * FROM produk ";
                                $kat = mysqli_query($koneksi,$sql);
                                //print_r($lokasi); 
                                while ($a = mysqli_fetch_array($kat)) {
                                    echo "<option value=".$a['id_produk'].">".$a['kd_produk']."-".$a['nama_produk']."</option>";
                                }
                                ?>
                            </select></td>
       	<td><input type="number" name="jumlah" class="form-control" placeholder="Jumlah" value="1"></td>
        <td><button class="btn btn-primary" name="tambah">Tambah</button></td>
	</tr>
</table>
</form>


 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detail Pesanan</h6><br>
            </div>
            <div class="card-body">
              <div class="table-responsive">

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
              <th width="10px">No</th>
              <th >Nama Produk</th>
              <th >Harga</th>
              <th >Jumlah</th>
              <th >Disc (%)</th>
              <th >Total Harga</th>
              <th >opsi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        
        $id_transaksi = $d['id_transaksi'];
        $sql = "SELECT * FROM list inner join transaksi on list.id_transaksi=transaksi.id_transaksi inner join produk on list.id_produk=produk.id_produk where list.id_transaksi='$id_transaksi'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        $gtotal = 0;
        while ($a = mysqli_fetch_array($query)) :?>
            <tr>
              <td><?php echo $no++ ?></td>
        <td><?php echo $a['nama_produk'] ?></td>
        <td>Rp <?php echo number_format($a['harga_produk'],0) ?></td>
        <td><?php echo $a['jumlah'] ?></td>
        <td><?php echo $a['diskon'] ?> %</td>
        <td>Rp <?php echo number_format($a['total'],0) ?></td>
        <td><center>
        <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapus&id_list=<?php echo $a['id_list']; ?>' }" class="btn btn-danger btn-circle" title="delete"><span class='fas fa-trash'></span></a>
          </td></center>
            </tr>
            <?php $gtotal += $a['total']; 
                  $diskon = $a['diskon'];

            ?>
        <?php endwhile;?>
        <tr bgcolor="skyblue">
		<td colspan="5">TOTAL</td>
		<td>Rp <?php echo number_format($gtotal,0) ?></td>
	 	</tr>
      <form method="POST" action="" name="formBayar">
	 	<tr>
	 		<input type="text" name="id_transaksi" class="form-control" value="<?php echo $id_transaksi; ?>" hidden>
	 		<input type="number" name="gtotal" id="gtotal" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $gtotal ?>" hidden>
	 		<td colspan="5">BAYAR</td>
	 		<td><input type="number" name="pembayaran" id="bayar" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" value="0"></td>
	 		
	 	</tr>
	 	<tr>
		<td colspan="5">KEMBALIAN</td>
		<td><input type="text" name="kembalian" id="kembalian" value="0" class="form-control" readonly=""></td>
  </tr>
  <tr>
		<td><button type="submit" class="btn btn-primary" name="selesai">Selesai/Cetak</button></td>
		</tr>
		
		</form>
	 	</tr>
        </tbody>
    </table>

     <script type="text/javascript">
    function startCalc(){
        interval = setInterval("calc()",1);
    }
    function calc(){
      valuegtotal = document.formBayar.gtotal.value;	
      valuebayar = document.formBayar.bayar.value;
      document.formBayar.kembalian.value =  (valuebayar * 1) - (valuegtotal * 1) ;
  }
    function stopCalc(){
      clearInterval(interval);
    }
</script> <!-- Menghitung otomatis -->

     </div>
            </div>
          </div>



<?php  if(isset($_POST['selesai'])){
$id_transaksi=$_POST['id_transaksi'];
$total_transaksi = $_POST['gtotal'];
$pembayaran = $_POST['pembayaran'];
$kembalian = $_POST['kembalian'];
$diskon = $_POST['diskon'];
$hargadiskon = $_POST['hargadiskon'];

    $update=mysqli_query($koneksi,"UPDATE
  `transaksi`
SET
  `total_transaksi` = '$total_transaksi',
  `bayar` = '$pembayaran',
  `kembalian` = '$kembalian'
WHERE `id_transaksi` = '$id_transaksi';

") or die ("gagal update");
    ?><script type="text/javascript">
        //<![CDATA[
        alert ("Transaksi selesai");
        window.open("cetak.php?id_transaksi=<?php echo $id_transaksi ?>&bayar=<?php echo $pembayaran ?>&kembalian=<?php echo $kembalian ?>&diskon=<?php echo $diskon ?>&hargadiskon=<?php echo $hargadiskon ?>",'_blank');
  
        //]]>
    </script>';
    
      <?php  }
?>




<?php
if(isset($_POST['tambah'])){
$id_transaksi = $d['id_transaksi'];
$id_produk = $_POST['id_produk'];
$id_customer = $_POST['id_customer'];
$id_payment_method = $_POST['id_payment_method'];
$jumlah = $_POST['jumlah'];

$datax = mysqli_query($koneksi,"SELECT * from produk where id_produk='$id_produk'");
$x = mysqli_fetch_array($datax);

$harga = $x['harga_produk'];
$jumlah_produk = $x['jumlah_produk'];
$diskon = $x['diskon'];

$stok = $jumlah_produk-$jumlah;


$diskondulu = ($harga/100)*$diskon;
$hargasetelahdiskon = $harga-$diskondulu;

$total_harga = $hargasetelahdiskon * $jumlah;


$query = "INSERT INTO `list` (
  `id_list`,
  `id_transaksi`,
  `id_produk`,
  `id_customer`,
  `id_payment_method`,
  `jumlah`,
  `total`
)
VALUES
  (
    '',
    '$id_transaksi',
    '$id_produk',
    '$id_customer',
    '$id_payment_method',
    '$jumlah',
    '$total_harga'
  );
";

$update = mysqli_query($koneksi,"UPDATE
 `produk`
SET
  `jumlah_produk` = '$stok'
WHERE `id_produk` = '$id_produk';
");

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :    
echo '<script type="text/javascript">
    //
    window.location="list.php";
    //
  </script>'; // Redirect ke halaman index.php  
}else{    // Jika Gagal, Lakukan :    
echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
echo "<br><a href='?data'>Kembali Ke Form</a>";  
}
}
?>


     </div>
            </div>
          </div>

  </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


  <?php 
}
?>



    <?php
  if(isset($_GET['hapus'])){
    $id_list=$_GET['id_list'];


$query2 = "DELETE FROM list WHERE id_list='$id_list'";
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


 <script src="../js/jquery.autocomplete.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                // Selector input yang akan menampilkan autocomplete.
                $( "#produk" ).autocomplete({
                    serviceUrl: "source.php",   // Kode php untuk prosesing data.
                    dataType: "JSON",           // Tipe data JSON.
                    onSelect: function (suggestion) {
                        $( "#produk" ).val("" + suggestion.produk);
                    }
                });
            })
        </script>

<?php 
include 'footer.php';
?>

