<?php 
require __DIR__.'/../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

session_start();
ob_start();
include_once("../config.php"); //buat koneksi ke database
$id_usulan   = $_GET['id_usulan'];
$id_usulan_barang   = $_GET['id_usulan_barang']; //kode berita yang akan dikonvert
$query  = mysqli_query($koneksi,"SELECT * FROM usulan WHERE id_usulan='".$id_usulan."'");
$data   = mysqli_fetch_array($query);
?>

<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $data['no_usulan']; ?></title>
</head>
<body>
<h4 align="center">JUSTIFIKASI ALAT KESEHATAN<br>PERENCANAAN USULAN PEMBELIAN BARANG/ALAT MELALUI PENGGUNAAN SALDO AWAL BLU<br>UNTUK OPERASIONAL BBLK PALEMBANG<br>TAHUN 2022</h4>
<table border="1" cellspacing="0">
  <tr align="center">
     <th>NO</th>
    <th width="170">JENIS BELANJA</th>
    <th width="120">MEREK</th>
    <th width="230">SPESIFIKASI</th>
    <th width="100">HARGA</th>
    <th width="70"><?php echo wordwrap("JUMLAH YANG TERSEDIA DI UNIT KERJA",10,'<br />', true) ?></th>
    <th>KONDISI</th>
    <th><?php echo wordwrap("JUMLAH KEBUTUHAN ALAT BARU (UNIT)",10,'<br />', true) ?></th>
    <th width="230">JUSTIFIKASI</th>
  </tr>
  <?php
    $query = mysqli_query($koneksi,"SELECT * FROM usulan_barang inner join barang on usulan_barang.id_barang=barang.id_barang where id_usulan='$id_usulan' ");
    $no=1;
    $data_temp = []; // 1. buat array penampung
    foreach ($query as $a) : ?>
      <?php $merek = mysqli_query($koneksi,"SELECT * FROM merek_barang where id_usulan_barang='$a[id_usulan_barang]'");
       $countrowspan=mysqli_num_rows($merek);
      foreach ($merek as $b) : ?>
      <tr>
      <?php 

      // 4. check parameter unique apakah ada dalam array penampung, jika ada maka akan render td dengan colspan, jika tidak maka tidak akan render, dan langsung render td selanjutnya
      if(!in_array($a['nama_barang'], $data_temp)){
        ?>
        <td rowspan="<?=$countrowspan?>"><?php echo $no++; ?></td>
        <td rowspan="<?=$countrowspan?>"><?php echo $a['nama_barang'] ?></td>
        <?php 
      }
      ?>
          
      
      <td><?php echo $b['nama_merek'] ?></td>
      <td><?php echo wordwrap($b['spesifikasi_merek'],45,'<br />', true) ?></td>
      <td>Rp <?php echo number_format($b['harga_merek']) ?></td>
      <?php 
      if(!in_array($a['nama_barang'], $data_temp)){
        ?>
        <td align="center" rowspan="<?=$countrowspan?>"><?php echo $a['jumlah_tersedia'] ?></td>
        <td align="center" rowspan="<?=$countrowspan?>"><?php echo $a['kondisi'] ?></td>
        <td align="center" rowspan="<?=$countrowspan?>"><?php echo $a['jumlah_kebutuhan'] ?></td>
        <td rowspan="<?=$countrowspan?>"><?php echo wordwrap($a['justifikasi'],35,'<br />', true) ?></td>
        <?php 
      }
      ?>
      
    </tr>
     <?php
     array_push($data_temp, $a['nama_barang']); // 2. push parameter unique yang akan jadi pembanding rowspan
     $data_temp = array_unique($data_temp); // 3. filter data array agar unique dan tidak double
     endforeach;?>
  <?php endforeach;?>
</table>
Catatan 
  * Untuk kondisi alat diisi (Baik/Rusak Ringan/Rusak Berat)
  * Apabila alat dalam kondisi Rusak atau Tidak Layak Pakai harap diusulkan penghapusan barang bmn ditujukan kepada Kepala BBLK Palembang cc Subkoordinator Keuangan dan BMN
  * Justifikasi Kebutuhan diisi alasan kebutuhan alat yang diusulkan secara rinci dan jelas

 <h4 align="center">USULAN KEBUTUHAN PEMBELIAN BARANG/ALAT PENGOLAH DATA<br>UNTUK OPERASIONAL BBLK PALEMBANG TA 2022</h4>

<table border="1" cellspacing="0">
  <tr align="center">
    <th>NO</th>
    <th width="200">JENIS BELANJA</th>
    <th width="100">MEREK</th>
    <th width="200">SPESIFIKASI</th>
    <th>HARGA</th>
    <th><?php echo wordwrap("JUMLAH YANG TERSEDIA DI UNIT KERJA (UNIT)",10,'<br />', true) ?></th>
    <th>KONDISI</th>
    <th><?php echo wordwrap("JUMLAH KEBUTUHAN ALAT BARU (UNIT)",10,'<br />', true) ?></th>
    <th width="200">JUSTIFIKASI</th>
  </tr>
  <?php
    $query = mysqli_query($koneksi,"SELECT * FROM pdata inner join barang on pdata.id_barang=barang.id_barang where id_usulan='$id_usulan' ");
    $no=1;
    $data_temp = []; // 1. buat array penampung
    foreach ($query as $a) : ?>
      <?php $merek = mysqli_query($koneksi,"SELECT * FROM merek_pdata where id_pdata='$a[id_pdata]'");
       $countrowspan=mysqli_num_rows($merek);
      foreach ($merek as $b) : ?>
      <tr>
      <?php 

      // 4. check parameter unique apakah ada dalam array penampung, jika ada maka akan render td dengan colspan, jika tidak maka tidak akan render, dan langsung render td selanjutnya
      if(!in_array($a['nama_barang'], $data_temp)){
        ?>
        <td rowspan="<?=$countrowspan?>"><?php echo $no++; ?></td>
        <td rowspan="<?=$countrowspan?>"><?php echo $a['nama_barang'] ?></td>
        <?php 
      }
      ?>
          
      
      <td><?php echo $b['nama_merek'] ?></td>
      <td><?php echo wordwrap($b['spesifikasi_merek'],45,'<br />', true) ?></td>
      <td>Rp <?php echo number_format($b['harga_merek']) ?></td>
      <?php 
      if(!in_array($a['nama_barang'], $data_temp)){
        ?>
        <td align="center" rowspan="<?=$countrowspan?>"><?php echo $a['jumlah_tersedia'] ?></td>
        <td align="center" rowspan="<?=$countrowspan?>"><?php echo $a['kondisi'] ?></td>
        <td align="center" rowspan="<?=$countrowspan?>"><?php echo $a['jumlah_kebutuhan'] ?></td>
        <td rowspan="<?=$countrowspan?>"><?php echo wordwrap($a['justifikasi'],35,'<br />', true) ?></td>
        <?php 
      }
      ?>
      
    </tr>
     <?php
     array_push($data_temp, $a['nama_barang']); // 2. push parameter unique yang akan jadi pembanding rowspan
     $data_temp = array_unique($data_temp); // 3. filter data array agar unique dan tidak double
     endforeach;?>
  <?php endforeach;?>
</table>
<p>Catatan 
  * Untuk kondisi alat diisi (Baik/Rusak Ringan/Rusak Berat)
           * Apabila alat dalam kondisi Rusak atau Tidak Layak Pakai harap diusulkan penghapusan barang bmn ditujukan kepada Kepala BBLK Palembang cc Subkoordinator Keuangan dan BMN
           * Justifikasi Kebutuhan diisi alasan kebutuhan alat yang diusulkan secara rinci dan jelas</p>


 <h4 align="center">USULAN KEBUTUHAN PEMBELIAN BARANG/PERALATAN PERKANTORAN<br>BBLK PALEMBANG TA 2022</h4>

<table border="1" cellspacing="0">
  <tr align="center">
    <th width="30">NO</th>
    <th width="250">JENIS BELANJA</th>
    <th width="100">HARGA</th>
    <th width="90"><?php echo wordwrap("JUMLAH YANG TERSEDIA DI UNIT KERJA",10,'<br />', true) ?></th>
    <th width="100">KONDISI</th>
    <th width="90"><?php echo wordwrap("JUMLAH KEBUTUHAN ALAT BARU (UNIT)",10,'<br />', true) ?></th>
    <th width="300">JUSTIFIKASI KEBUTUHAN</th>
  </tr>
  <?php
    $query = mysqli_query($koneksi,"SELECT * FROM alat_kantor inner join barang on alat_kantor.id_barang=barang.id_barang where id_usulan=$id_usulan ");
    $no=1;
    while ($a = mysqli_fetch_array($query)) :?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td width="250"><?php echo $a['nama_barang'] ?></td>
      <td>Rp <?php echo number_format($a['harga_barang']) ?></td>
      <td align="center"><?php echo $a['jumlah_tersedia'] ?></td>
      <td align="center"><?php echo $a['kondisi'] ?></td>
      <td align="center"><?php echo $a['jumlah_kebutuhan'] ?></td>
      <td><?php echo wordwrap($a['justifikasi_kebutuhan'],35,'<br />', true) ?></td>
    </tr>
  <?php endwhile;?>
</table>
<p>Catatan 
  * Untuk kondisi alat diisi (Baik/Rusak Ringan/Rusak Berat)
           * Apabila alat dalam kondisi Rusak atau Tidak Layak Pakai harap diusulkan penghapusan barang bmn ditujukan kepada Kepala BBLK Palembang cc Subkoordinator Keuangan dan BMN
           * Justifikasi Kebutuhan diisi alasan kebutuhan alat yang diusulkan secara rinci dan jelas</p>


<h4 align="center">USULAN KEBUTUHAN PEMBELIAN REAGENSIA,BAHAN LAB, BAHAN HABIS PAKAI<br>UNTUK OPERASIONAL BBLK PALEMBANG TA 2022</h4>

<table border="1" cellspacing="0">
  <tr align="center">
    <th width="30">NO</th>
    <th width="300">NAMA BARANG</th>
    <th width="150">KODE KATALOG</th>
    <th width="90">MEREK</th>
    <th width="150">KEMASAN</th>
    <th width="90"><?php echo wordwrap("JUMLAH USULAN",10,'<br />', true) ?></th>
    <th width="200">SATUAN</th>
  </tr>
  <?php
    $query = mysqli_query($koneksi,"SELECT * FROM reagen inner join commodities on reagen.id_barang=commodities.id where id_usulan=$id_usulan ");
    $no=1;
    foreach ($query as $a) : ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td width="350"><?php echo $a['name'] ?></td>
      <td align="center"><?php echo $a['catalog_code'] ?></td>
      <td align="center"><?php echo $a['merek_reagen'] ?></td>
      <td align="center"><?php echo $a['kemasan'] ?></td>
      <td align="center"><?php echo $a['jumlah_usulan'] ?></td>
      <td><?php echo $a['unit'] ?></td>
    </tr>
   <?php endforeach;?>
</table>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->

<?php
$filename="surat-usulan".$id_usulan.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: arial">'.nl2br($content).'</page>';

 try
 {
  $html2pdf = new HTML2PDF('L','F4','en', false, 'UTF-8',array(10, 0, 0, 10));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>

<!-- <?php
$html2pdf = new Html2Pdf('P','A4','en', false, 'UTF-8');
$html2pdf->writeHTML('<h1>HelloWorld</h1>This is my first test');
$html2pdf->output();

?> -->