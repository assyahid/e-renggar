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
    <th width="150">JENIS BELANJA</th>
    <th width="100">MEREK</th>
    <th width="200">SPESIFIKASI</th>
    <th>HARGA</th>
    <th><?php echo wordwrap("JUMLAH YANG TERSEDIA DI UNIT KERJA",10,'<br />', true) ?></th>
    <th>KONDISI</th>
    <th><?php echo wordwrap("JUMLAH KEBUTUHAN ALAT BARU (UNIT)",10,'<br />', true) ?></th>
    <th width="200">JUSTIFIKASI</th>
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
<p>Catatan 
  * Untuk kondisi alat diisi (Baik/Rusak Ringan/Rusak Berat)
  * Apabila alat dalam kondisi Rusak atau Tidak Layak Pakai harap diusulkan penghapusan barang bmn ditujukan kepada Kepala BBLK Palembang cc Subkoordinator Keuangan dan BMN
  * Justifikasi Kebutuhan diisi alasan kebutuhan alat yang diusulkan secara rinci dan jelas</p>
<?php $q=mysqli_query($koneksi,"SELECT * FROM users where id_user='$data[id_user]'"); 
$u=mysqli_fetch_array($q);
?>  
<?php $kepala=mysqli_query($koneksi,"SELECT * FROM users where id_user=1"); $tk=mysqli_fetch_array($kepala);?>
<?php $koor=mysqli_query($koneksi,"SELECT * FROM users where id_user=2"); $tkor=mysqli_fetch_array($koor);?>
<?php $kasubbag=mysqli_query($koneksi,"SELECT * FROM users where id_user=3"); $tkas=mysqli_fetch_array($kasubbag);?>
<?php $atasan=mysqli_query($koneksi,"SELECT * FROM users where id_user='$u[atasan]'"); $at=mysqli_fetch_array($atasan);  ?>


<table >
  <tr>
    <td width="200"><?php echo $tk['nama'] ?></td>
    <td width="200"><?php echo $tkor['nama'] ?></td>
    <td width="200"><?php echo $tkas['nama'] ?></td>
    <td width="200"><?php echo $at['nama'] ?></td>
    <td width="200"><?=$u['nama_instalasi']?></td>
  </tr>
  <tr>
    <td><?php if($a['persetujuan'] == "divalidasi oleh Kepala BBLK Palembang") { ?><qrcode value="https://simka.bblkpalembang.com" ec="S" style="border: none; width: 20mm;"></qrcode>
    <?php }  ?></td>
    <td><?php if ($a['persetujuan'] == "divalidasi oleh Koordinator Tata Usaha") { ?>
      <qrcode value="https://simka.bblkpalembang.com" ec="S" style="border: none; width: 20mm;"></qrcode> 
      <?php } elseif ($a['persetujuan'] == "divalidasi oleh Kepala BBLK Palembang") { ?>
      <qrcode value="https://simka.bblkpalembang.com" ec="S" style="border: none; width: 20mm;"></qrcode> 
      <?php } ?></td>
    <td><?php if ($a['persetujuan'] == "divalidasi oleh Kasubbag Administrasi Umum") { ?>
      <qrcode value="https://simka.bblkpalembang.com" ec="S" style="border: none; width: 20mm;"></qrcode>
   <?php } elseif ($a['persetujuan'] == "divalidasi oleh Koordinator Tata Usaha") { ?>
      <qrcode value="https://simka.bblkpalembang.com" ec="S" style="border: none; width: 20mm;"></qrcode> 
      <?php } elseif ($a['persetujuan'] == "divalidasi oleh Kepala BBLK Palembang") { ?>
      <qrcode value="https://simka.bblkpalembang.com" ec="S" style="border: none; width: 20mm;"></qrcode> 
      <?php } ?></td>
    <td><?php if($a['persetujuan'] == "divalidasi oleh Kasi / Sub Koordinator") { ?>
      <qrcode value="https://simka.bblkpalembang.com" ec="S" style="border: none; width: 20mm;"></qrcode>
    <?php }  elseif ($a['persetujuan'] == "divalidasi oleh Kasubbag Administrasi Umum") { ?>
      <qrcode value="https://simka.bblkpalembang.com" ec="S" style="border: none; width: 20mm;"></qrcode>
   <?php } elseif ($a['persetujuan'] == "divalidasi oleh Koordinator Tata Usaha") { ?>
      <qrcode value="https://simka.bblkpalembang.com" ec="S" style="border: none; width: 20mm;"></qrcode> 
      <?php } elseif ($a['persetujuan'] == "divalidasi oleh Kepala BBLK Palembang") { ?>
      <qrcode value="https://simka.bblkpalembang.com" ec="S" style="border: none; width: 20mm;"></qrcode> 
      <?php } ?></td>
    <td><qrcode value="https://simka.bblkpalembang.com" ec="S" style="border: none; width: 20mm;"></qrcode></td>
  </tr>
  <tr>
    
    <td><?=$tk['nama_kepala_instalasi']?><br>NIP.<?=$tk['nip']?></td>
    <td><?=$tkor['nama_kepala_instalasi']?><br>NIP.<?=$tkor['nip']?></td>
    <td><?=$tkas['nama_kepala_instalasi']?><br>NIP.<?=$tkas['nip']?></td>
    <td><?=$at['nama_kepala_instalasi']?><br>NIP.<?=$at['nip']?></td>
    <td><?=$u['nama_kepala_instalasi']?><br>NIP.<?=$u['nip']?></td>
  </tr>
</table>         
<!-- <p align='right'><b><?=$u['nama_instalasi']?></b><br>
<qrcode value="https://simka.bblkpalembang.com" ec="S" style="border: none; width: 20mm;"></qrcode>
<b><u><?=$u['nama_kepala_instalasi']?></u><br>NIP.<?=$u['nip']?></b></p> -->



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
  $html2pdf = new HTML2PDF('L','F4','en', false, 'ISO-8859-15',array(20, 0, 20, 0));
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