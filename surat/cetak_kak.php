<?php 
require __DIR__.'/../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

ob_start();

$id_proker = $_GET["id_proker"];
include_once("../config.php"); //buat koneksi ke database

$proker =mysqli_query($koneksi,"SELECT * FROM proker INNER JOIN users ON users.id_user = proker.id_user  WHERE id_proker = '".$id_proker."'")or die(mysql_error());
$proker = mysqli_fetch_array($proker);

$id_user = $proker["id_user"];

$pegawai=mysqli_query($koneksi,"SELECT * FROM pegawai WHERE id_user = '".$id_user."'")or die(mysql_error());
$peralatan=mysqli_query($koneksi,"SELECT * FROM peralatan WHERE id_user = '".$id_user."'")or die(mysql_error());
$peralatan2=mysqli_query($koneksi,"SELECT * FROM peralatan WHERE id_user = '".$id_user."'")or die(mysql_error());
$justifikasi =mysqli_query($koneksi,"SELECT * FROM justifikasi INNER JOIN barang ON barang.id_barang = justifikasi.id_barang WHERE id_user = ".$id_user." AND id_proker=".$id_proker)or die(mysql_error());

$kepala = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE id_user = '".$id_user."' AND jabatan='kepala'")or die(mysql_error());
$kepala = mysqli_fetch_array($kepala);


$date = date('d-m-Y');

?>
<style type="text/css">
  @media print 
  {
    @page {
      size: A4; /* DIN A4 standard, Europe */
      margin: 20mm 20mm 20mm 20mm; /* atas,kanan
    }
    html, body {
      width: 210mm;
      /* height: 297mm; */
      height: 282mm;
      font-size: 11px;
      background: #FFF;
      overflow:visible;
    }
    body {
      padding-top:2mm;
    }
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group; }
    tfoot { display:table-footer-group; }
  }
</style>
<html > <!-- Bagian halaman HTML yang akan konvert -->
<head>
  <meta content="text/html;" />
  <title>Kerangkan Acuan Kegiatan</title>
</head>
<body>
  <div>
    <p style="text-align: center;font-size: 15px;"><b>KERANGKA ACUAN KEGIATAN / TERM OF REFERANCE<br>
      USULAN PEMBELIAN ALAT<br>
      BAGIAN/BIDANG/SUB.BAGIAN/SEKSI/INSTALASI <?= strtoupper($proker['nama_instalasi']) ?><br>
      BALAI BESAR LABORATORIUM KESEHATAN PALEMBANG<br>
      TAHUN ANGGARAN <?= date('Y') ?></b>
    </p>
    <div style="margin-top: <?= $_GET['margin']; ?>px;"></div>
    <p>
      <p style="font-size: 13px;">A. GAMBARAN UMUM</p><p style="font-size: 13px;">Berisikan uraian singkat sebagai kata pengantar, Tupoksi Instalasi kaitannya dalam struktur organisasi, visi dan misi BBLK Palembang 
      </p>
    </p>

    <p>
      <p style="font-size: 13px;">B. TUGAS POKOK</p><p style="font-size: 13px;">Tugas Pokok Bagian/Bidang/Sub. Bagian/Seksi/Instalasi/Unit Kerja (Sesuai dengan Permenkes No.52 Tahun 2020, tanggal 26 Oktober 2020). 
      </p>
    </p>

    <p style="">
      <p style="font-size: 13px;">C. KEADAAN SAAT INI (JUMLAH SDM, PERALATAN)</p><p style="font-size: 13px;">Memuat uraian singkat tentang kondisi yang ada pada Bagian/ Bidang/ Sub.Bagian/ Seksi/ Instalasi/ Unit Kerja, dapat berupa Jumlah SDM dan Peralatan <br>Catatan : untuk data ketenagaan agar disusun sesuai table berikut :
      </p>
    </p>
    <p style="text-align: center;"><b>Tabel. 1</b></p>
    <p style="text-align: center;">Data Pegawai Pada Bagian/Bidang/Sub Bagian/Seksi/Instalasi <?= $proker['nama_instalasi'] ?></p>

    <table cellpadding="100" cellspacing="0" border="1" style="width: 600px;"  align="center">
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
          <td style="padding: 5px;"><?= $d["pangkat_golongan"]; ?></td>
          <td style="padding: 5px;"><?= $d["pendidikan"]; ?></td>
          <td style="padding: 5px;"><?= $d["keterangan"]; ?></td>
        </tr>
        <?php  $index++; } ?>
      </table>

      <p style="text-align: center;"><b>Tabel. 2</b></p>
      <p style="text-align: center;">Daftar Peralatan (Alat Kesehatan / Alat Lab) Yang Ada Di Instalasi</p>

      <table cellpadding="100" cellspacing="0" border="1" style="width: 600px;"   align="center">
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
        <br>
        <br>
        <p>
          <p style="font-size: 13px;">D. JUSTIFIKASI KEBUTUHAN PERALATAN KESEHATAN</p><p style="font-size: 13px;margin-top: -5px;">Memuat uraian Justifikasi Kebutuhan Peralatan Kesehatan / Laboratorium pada Bagian/ Bidang/ Sub.Bagian/ Seksi/ Instalasi/ Unit Kerja. <br>Catatan : untuk data ketenagaan agar disusun sesuai table berikut :
          </p>
        </p>
        <p style="text-align: center;"><b>Tabel. 3</b></p>
        <p style="text-align: center;">Justifikasi Kebutuhan Alat Kesehatan / Alat Laboratorium Tahun 2022</p>
        <br>
        <table cellpadding="100" border="1" cellspacing="0" style="width: 600px;"    align="center">
          <tr>
            <td style="padding: 5px;">NO</td>
            <td style="padding: 5px;">NAMA ALAT</td>
            <td style="padding: 5px;">SPESIFIKASI UMUM</td>
            <td style="padding: 5px;">ALASAN KEBUTUHAN</td>
            <td style="padding: 5px;">MANFAAT</td>
            <td style="padding: 5px;">JUMLAH <br> (Unit)</td>
            <td style="padding: 5px;">KETERANGAN</td>
          </tr>
          <?php 
          $index = 0;
          while($d=mysqli_fetch_array($justifikasi)){
            ?>
            <tr style="text-align: center;">
              <td style="padding: 5px;"><?= $index+1; ?></td>
              <td style="padding: 5px;"><?= $d["nama_barang"]; ?></td>
              <td style="padding: 5px;"><?= $d["spesifikasi_umum"]; ?></td>
              <td style="padding: 5px;"><?= $d["alasan_kebutuhan"]; ?></td>
              <td style="padding: 5px;"><?= $d["manfaat"]; ?></td>
              <td style="padding: 5px;"><?= $d["jumlah_unit"]; ?></td>
              <td style="padding: 5px;"><?= $d["ket_justifikasi"]; ?></td>
            </tr>
            <?php  $index++; } ?>
          </table>



          <br>
          <br>
          <br>
          <br>
          <br>
          <table border="0" align="center" style="width: 100%;">
            <tr>
              <td style="width: 30%;text-align: center;">Mengetahui,<br>Kepala BBLK Palembang</td>
              <td style="width: 800px;"></td>
              <td style="width: 30%;text-align: center;" >Palembang, <?= $date; ?><br>Kepala Instalasi</td>
            </tr>
            <tr style="height: 80px;">
              <td style="text-align: center;"></td>
              <td style="width: 300px;"></td>
              <td style="text-align: center;">
                <?php if($proker['status'] == "diverifikasi"){  ?>
                  <img style="width: 50%;" id="TTE" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>&choe=UTF-8" title="Link to Google.com" />
                <?php   } ?>
              </td>
            </tr>
            <tr>
              <td style="text-align: center;">dr. Andi Yussianto, M.Epid<br>NIP. 197312072002121002</td>
              <td style="width: 300px;"></td>
              <td style="text-align: center;"><?= $kepala['nama']; ?><br>NIP. <?= $kepala['nip']; ?></td>
            </tr>
            <tr>

            </tr>
          </table>

      <!--   <p align='left'><b>Kepala BBLK Palembang</b><br>
          <img src='../image/putih.png' width="10" height="25">
          <br>
          <b><u>dr. Andi Yussianto, M.Epid</u><br>NIP. 197312072002121002</b></p> -->

         <!--  <p align='right'><b>Kepala BBLK Palembang</b><br>
            <img src='../image/putih.png' width="10" height="25">
            <br>
            <b><u>dr. Andi Yussianto, M.Epid</u><br>NIP. 197312072002121002</b></p> -->
          </div>
        </body>
        </html><!-- Akhir halaman HTML yang akan di konvert -->


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
           window.print();
         })
       </script>
