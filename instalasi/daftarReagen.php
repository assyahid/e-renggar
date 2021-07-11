<?php
if($_SERVER['REQUEST_METHOD']=="GET"){
 require '../config.php';
 daftarReagen($_GET['search']);
}
 
function daftarReagen($search){
 global $koneksi;
 
 if ($koneksi->connect_error) {
     die("Koneksi Gagal: " . $koneksi->connect_error);
 }
 
 $sql = "SELECT catalog_code,commodities.id as id_commodities, commodities.name as nama_barang,unit,kemasan,current_stock,price_per_unit,group_id,merk_id,commodity_groups.name as kategori FROM commodities inner join commodity_groups on commodities.group_id=commodity_groups.id where group_id=14 and commodities.name LIKE '%$search%'  ORDER BY commodities.name ASC";
 $result = $koneksi->query($sql);
 
 if ($result->num_rows > 0) {
     $list = array();
     $key=0;
     while($row = $result->fetch_assoc()) {
         $list[$key]['id'] = $row['id_commodities'];
         $list[$key]['text'] = $row['nama_barang']; 
         $list[$key]['text1'] = $row['current_stock']; 
     $key++;
     }
     echo json_encode($list);
 } else {
     echo "hasil kosong";
 }
 $koneksi->close();
}
 
?>