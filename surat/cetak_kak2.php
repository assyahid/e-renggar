<?php 
require __DIR__.'/../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
$id_proker = $_GET["id_proker"];
ob_start();
include_once("../config.php"); //buat koneksi ke database

$pegawai=mysqli_query($koneksi,"SELECT * FROM pegawai WHERE id_user = '".$_SESSION['id_user']."'")or die(mysql_error());
$peralatan=mysqli_query($koneksi,"SELECT * FROM peralatan WHERE id_user = '".$_SESSION['id_user']."'")or die(mysql_error());
$peralatan2=mysqli_query($koneksi,"SELECT * FROM peralatan WHERE id_user = '".$_SESSION['id_user']."'")or die(mysql_error());
$justifikasi =mysqli_query($koneksi,"SELECT * FROM justifikasi INNER JOIN barang ON barang.id_barang = justifikasi.id_barang WHERE id_user = '".$_SESSION['id_user']."' AND id_proker=".$id_proker)or die(mysql_error());

?>

<html > <!-- Bagian halaman HTML yang akan konvert -->
<head>
  <meta content="text/html;" />
  <title>Kerangkan Acuan Kegiatan</title>
</head>
<body>
  <p style="text-align: center;line-height: 0.6;font-size: 15px;"><b>KERANGKA ACUAN KEGIATAN / TERM OF REFERANCE<br>
    USULAN PEMBELIAN ALAT<br>
    BAGIAN/BIDANG/SUB.BAGIAN/SEKSI/INSTALASI TEKNOLOGI INFORMASI<br>
    BALAI BESAR LABORATORIUM KESEHATAN PALEMBANG<br>
  TAHUN ANGGARAN 2022</b>
</p>

<p>
  <p style="font-size: 13px;">A. GAMBARAN UMUM</p><p style="font-size: 13px;margin-top: -5px;">Berisikan uraian singkat sebagai kata pengantar, Tupoksi Instalasi kaitannya dalam struktur organisasi, visi dan misi BBLK Palembang 
  </p>
</p>

<p style="margin-top: -60px;">
  <p style="font-size: 13px;">B. TUGAS POKOK</p><p style="font-size: 13px;margin-top: -5px;">Tugas Pokok Bagian/Bidang/Sub. Bagian/Seksi/Instalasi/Unit Kerja (Sesuai dengan Permenkes No.52 Tahun 2020, tanggal 26 Oktober 2020). 
  </p>
</p>

<p style="margin-top: -60px;margin-bottom: -30px;">
  <p style="font-size: 13px;">C. KEADAAN SAAT INI (JUMLAH SDM, PERALATAN)</p><p style="font-size: 13px;margin-top: -5px;">Memuat uraian singkat tentang kondisi yang ada pada Bagian/ Bidang/ Sub.Bagian/ Seksi/ Instalasi/ Unit Kerja, dapat berupa Jumlah SDM dan Peralatan <br>Catatan : untuk data ketenagaan agar disusun sesuai table berikut :
  </p>
</p>

<p style="text-align: center;"><b>Tabel. 1</b></p>
<p style="text-align: center;margin-top: -20px;margin-bottom: -20px;">Data Pegawai Pada Bagian/Bidang/Sub Bagian/Seksi/Instalasi Teknologi Informasi</p>

<table cellpadding="100" border="1" style="width: 300px;" style="border-collapse: collapse;"  align="center">
  <tr>
    <td style="padding: 5px;">NO</td>
    <td style="padding: 5px;">NAMA/NIP</td>
    <td style="padding: 5px;">PANGKAT/GOLONGAN</td>
    <td style="padding: 5px;">PENDIDIKAN TERAKHIR</td>
    <td style="padding: 5px;">KETERANGAN</td>
  </tr>
  <?php 
  $index = 0;
  while($d=mysqli_fetch_array($pegawai)){
    ?>
    <tr style="text-align: center;">
      <td style="padding: 5px;"><?= $index+1; ?></td>
      <td style="padding: 5px;"><?= $d["nama"]; ?></td>
      <td style="padding: 5px;"><?= $d["jabatan"]; ?></td>
      <td style="padding: 5px;"><?= $d["pendidikan"]; ?></td>
      <td style="padding: 5px;"><?= $d["keterangan"]; ?></td>
    </tr>
    <?php  $index++; } ?>
  </table>

  <p style="text-align: center;"><b>Tabel. 2</b></p>
  <p style="text-align: center;margin-top: -20px;margin-bottom: -20px;">Daftar Peralatan (Alat Kesehatan / Alat Lab) Yang Ada Di Instalasi</p>

  <table cellpadding="100" border="1" style="width: 300px;" style="border-collapse: collapse;"  align="center">
    <tr>
      <td style="padding: 5px;">NO</td>
      <td style="padding: 5px;">NAMA/JENIS PERALATAN</td>
      <td style="padding: 5px;">SATUAN</td>
      <td style="padding: 5px;">JUMLAH ALAT YANG TERSEDIA</td>
      <td style="padding: 5px;">KETERANGAN<br>(kondisi alat saat ini)</td>
    </tr>
    <?php 
    $index = 0;
    while($x=mysqli_fetch_array($peralatan)){
      ?>
      <tr style="text-align: center;">
        <td style="padding: 5px;"><?= $index+1; ?></td>
        <td style="padding: 5px;"><?= $x["nama_peralatan"]; ?></td>
        <td style="padding: 5px;"><?= $x["satuan"]; ?></td>
        <td style="padding: 5px;"><?= $x["jumlah"]; ?></td>
        <td style="padding: 5px;"><?= $x["keterangan"]; ?></td>
      </tr>
      <?php  $index++; } ?>

    </table>


    <p style="margin-top: -20px;">
      <p style="font-size: 13px;">D. JUSTIFIKASI KEBUTUHAN PERALATAN KESEHATAN</p><p style="font-size: 13px;margin-top: -5px;">Memuat uraian Justifikasi Kebutuhan Peralatan Kesehatan / Laboratorium pada Bagian/ Bidang/ Sub.Bagian/ Seksi/ Instalasi/ Unit Kerja. Catatan : untuk data ketenagaan agar disusun sesuai table berikut :
      </p>
    </p>

    <table cellpadding="100" border="1" style="width: 300px;" style="border-collapse: collapse;"  align="center">
      <tr>
        <td style="padding: 5px;">NO</td>
        <td style="padding: 5px;">NAMA/JENIS PERALATAN</td>
        <td style="padding: 5px;">SATUAN</td>
        <td style="padding: 5px;">JUMLAH ALAT YANG TERSEDIA</td>
        <td style="padding: 5px;">KETERANGAN<br>(kondisi alat saat ini)</td>
      </tr>
      <tr style="text-align: center;">
        <td style="padding: 5px;">TR</td>
        <td style="padding: 5px;">TR</td>
        <td style="padding: 5px;">TR</td>
        <td style="padding: 5px;">TR</td>
        <td style="padding: 5px;">TR</td>
      </tr>
    </table>





    <p align='left'><b>Kepala BBLK Palembang</b><br>
      <img src='../image/putih.png' width="10" height="25">
      <br>
      <b><u>dr. Andi Yussianto, M.Epid</u><br>NIP. 197312072002121002</b></p>

      <p align='right'><b>Kepala BBLK Palembang</b><br>
        <img src='../image/putih.png' width="10" height="25">
        <br>
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
  $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(30, 20, 20, 20));
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