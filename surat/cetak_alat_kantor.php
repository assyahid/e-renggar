<?php 
require __DIR__.'/../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

session_start();
ob_start();
include_once("../config.php"); //buat koneksi ke database
$id_usulan   = $_GET['id_usulan'];
$id_alat_kantor   = $_GET['id_alat_kantor']; //kode berita yang akan dikonvert
$query  = mysqli_query($koneksi,"SELECT * FROM usulan WHERE id_usulan='".$id_usulan."'");
$data   = mysqli_fetch_array($query);
?>

<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $data['no_usulan']; ?></title>
</head>
<body>


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


<p align='right'><b><?=$_SESSION['nama_instalasi']?></b><br>
<qrcode value="https://simka.bblkpalembang.com" ec="S" style="border: none; width: 20mm;"></qrcode>
<b><u><?=$_SESSION['nama_kepala_instalasi']?></u><br>NIP.<?=$_SESSION['nip']?></b></p>
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