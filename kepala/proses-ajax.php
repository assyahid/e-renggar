<?php
include '../config.php';

$id_barang = $_POST['id_barang']; // Menerima NPM dari JQuery Ajax dari form
$s = mysqli_query($koneksi, "SELECT catalog_code,commodities.id as id_commodities, commodities.name as nama_barang,unit,kemasan,current_stock,price_per_unit,group_id,merk_id,commodity_groups.name as kategori FROM commodities inner join commodity_groups on commodities.group_id=commodity_groups.id where group_id=14 and commodities.id='$id_barang'"); // Ambil nama mahasiswa berdasarkan npm yang dikirim dari jquery ajax
$datax = mysqli_fetch_array($s);
$data = array( 
        'current_stock' => $datax['current_stock'],
        'unit' => $datax['unit'],
        'catalog_code' => $datax['catalog_code'],);
echo json_encode($data);
?>