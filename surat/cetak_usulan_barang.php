<?php 
require __DIR__.'/../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

session_start();
ob_start();
include_once("../config.php"); //buat koneksi ke database
$id_usulan   = $_GET['id_usulan']; //kode berita yang akan dikonvert
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
    <th>JENIS BELANJA</th>
    <th>MEREK</th>
    <th>SPESIFIKASI</th>
    <th>HARGA</th>
    <th><?php echo wordwrap("JUMLAH YANG TERSEDIA DI UNIT KERJA (UNIT)",10,'<br />', true) ?></th>
    <th>KONDISI</th>
    <th><?php echo wordwrap("JUMLAH KEBUTUHAN ALAT BARU (UNIT)",10,'<br />', true) ?></th>
    <th>JUSTIFIKASI</th>
  </tr>
  <?php
    $query = mysqli_query($koneksi,"SELECT * FROM merek_barang inner join usulan_barang on merek_barang.id_usulan_barang=usulan_barang.id_usulan_barang inner join barang on usulan_barang.id_barang=barang.id_barang where id_usulan=$id_usulan");
    $no=1;
    while ($a = mysqli_fetch_array($query)) :?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $a['nama_barang'] ?></td>
      <td><?php echo $a['nama_merek'] ?></td>
      <td><?php echo wordwrap($a['spesifikasi_merek'],45,'<br />', true) ?></td>
      <td>Rp <?php echo number_format($a['harga_merek']) ?></td>
      <td><?php echo $a['jumlah_tersedia'] ?></td>
      <td><?php echo $a['kondisi'] ?></td>
      <td><?php echo $a['jumlah_kebutuhan'] ?></td>
      <td><?php echo wordwrap($a['justifikasi'],35,'<br />', true) ?></td>
    </tr>
  <?php endwhile;?>
</table>
<p>Catatan 
  * Untuk kondisi alat diisi (Baik/Rusak Ringan/Rusak Berat)
           * Apabila alat dalam kondisi Rusak atau Tidak Layak Pakai harap diusulkan penghapusan barang bmn ditujukan kepada Kepala BBLK Palembang cc Subkoordinator Keuangan dan BMN
           * Justifikasi Kebutuhan diisi alasan kebutuhan alat yang diusulkan secara rinci dan jelas</p>


<p align='right'><b><?=$_SESSION['nama']?></b><br>
<img src='../image/simka.png' width='120'>
<br>
<b><u>..........................</u><br>NIP. .....................</b></p>

</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->

<?php
$filename="surat-permohonan".$id_usulan.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';

 try
 {
  $html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(10, 0, 20, 0));
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