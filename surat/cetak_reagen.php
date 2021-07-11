<?php 
require __DIR__.'/../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

session_start();
ob_start();
include_once("../config.php"); //buat koneksi ke database
$id_usulan   = $_GET['id_usulan'];
$id_reagen   = $_GET['id_reagen']; //kode berita yang akan dikonvert
$query  = mysqli_query($koneksi,"SELECT * FROM usulan WHERE id_usulan='".$id_usulan."'");
$data   = mysqli_fetch_array($query);
?>

<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $data['no_usulan']; ?></title>
</head>
<body>


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
    while ($a = mysqli_fetch_array($query)) :?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td width="250"><?php echo $a['name'] ?></td>
      <td><?php echo $a['catalog_code'] ?></td>
      <td align="center"><?php echo $a['merek_reagen'] ?></td>
      <td align="center"><?php echo $a['kemasan'] ?></td>
      <td align="center"><?php echo $a['jumlah_usulan'] ?></td>
      <td><?php echo $a['unit'] ?></td>
    </tr>
  <?php endwhile;?>
</table>

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