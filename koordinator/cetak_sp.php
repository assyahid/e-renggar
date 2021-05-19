<?php 
require __DIR__.'/../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

session_start();
ob_start();
include_once("../config.php"); //buat koneksi ke database
$id_surat_permohonan   = $_GET['id_surat_permohonan']; //kode berita yang akan dikonvert
$query  = mysqli_query($koneksi,"SELECT * FROM surat_permohonan WHERE id_surat_permohonan='".$id_surat_permohonan."'");
$data   = mysqli_fetch_array($query);
?>

<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $data['no_surat']; ?></title>
</head>
<body>


<p align='right'>Palembang, <?php $tgl = $data['tgl_surat']; $mydate=dateTime::createFromFormat("Y-m-d",$tgl); echo $format = $mydate->format('d F Y')?></p>

<table border="0">
  <tr>
    <td width="100">Nomor</td>
    <td width="10">:</td>
    <td width="250"><?=$data['no_surat']?></td>
  </tr>
  <tr>
    <td>Lampiran</td>
    <td>:</td>
    <td><?=$data['lampiran']?></td>
  </tr>
  <tr>
    <td>Perihal</td>
    <td>:</td>
    <td><b><?=$data['perihal']?></b></td>
  </tr>
</table>

<p>Kepada Yth,<br>Sdr. Ka. Bagian/Sub.Bagian/Bidang/Seksi/<br>&nbsp; &nbsp; &nbsp; &nbsp;Instalasi.<br>&nbsp; &nbsp; &nbsp; &nbsp;Di Lingkungan Balai Besar Laboratorium Kesehatan Palembang</p>
<?=$data['isi_surat']?>

<p align='right'><b>Kepala BBLK Palembang</b><br>
  <?php if ($data['status_surat']=='Telah divalidasi Kepala') { ?>
<qrcode value="https://simka.bblkpalembang.com" ec="M" style="border: none; width: 30mm;"></qrcode>
 <?php } else { ?>
<img src='../image/putih.png' width="10" height="25">
<?php } ?>
 <br>
Dokumen ini ditandatangani secara digital
<b><u>dr. Andi Yussianto, M.Epid</u><br>NIP. 197312072002121002</b></p>

</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->

<?php
$filename="surat-permohonan".$id_surat_permohonan.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';

 try
 {
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(30, 0, 20, 0));
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