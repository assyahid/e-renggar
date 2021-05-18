<?php include 'header.php'; ?>	
	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Pegawai Non PNS</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Data Pegawai</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="pegawai_non_pns.php?data">Pegawai Non PNS</a>
							</li>
						</ul>
					</div>
					<?php if(isset($_GET['data'])){ ?>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-default">
                <span class="fas fa-plus"></span> Input Data</button></h4>
									
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="multi-filter-select" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>NIP (Nomor Identitas Pegawai)</th>
										            <th>Nama</th>
										            <th>Jabatan</th>
										            <th>Pendidikan Terkahir</th>
													<th>Opsi</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>No</th>
													<th>NIP (Nomor Identitas Pegawai)</th>
										            <th>Nama</th>
										            <th>Jabatan</th>
										            <th>Pendidikan Terkahir</th>
													<th>Opsi</th>
												</tr>
											</tfoot>
											<tbody>
											<?php
										        $sql = "SELECT * FROM pegawai_non_pns";
										        $query = mysqli_query($koneksi,$sql);
										        $no=1;
										        while ($a = mysqli_fetch_array($query)) :?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $a['nip'] ?></td>
													<td><?php echo $a['nama'] ?></td>
											        <td><?php $id_pegawai_non_pns= $a['id_pegawai_non_pns']; 
											        	$sql=mysqli_query($koneksi,"SELECT * FROM `riwayat_jabatan_non` where id_pegawai_non_pns='$id_pegawai_non_pns' ORDER BY id_riwayat_jabatan_non DESC");
											        	$data=mysqli_fetch_array($sql);

											        	if (isset($data['jabatan'])!=NULL) {
											        		echo $data['jabatan'];
											        	} else {
											        		echo "<span class='badge badge-warning'>Data belum di update</span>";
											        	}

											        ?></td>
											        <td><?php $id_pegawai_non_pns= $a['id_pegawai_non_pns']; 
											        	$sql=mysqli_query($koneksi,"SELECT * FROM `riwayat_pendidikan_non` where id_pegawai_non_pns='$id_pegawai_non_pns' ORDER BY id_riwayat_pendidikan_non DESC");
											        	$data=mysqli_fetch_array($sql);

											        	if (isset($data['pendidikan'])!=NULL) {
											        		echo $data['pendidikan'];
											        	} else {
											        		echo "<span class='badge badge-warning'>Data belum di update</span>";
											        	}

											        ?></td>
													<td><a class="blue" href="?lengkapidata&id_pegawai_non_pns=<?php echo $a['id_pegawai_non_pns']; ?>" title='Lengkapi Data'>
															<i class="ace-icon fa fa-plus bigger-130"></i>
														</a>

														<a class="blue" href="?detail&id_pegawai_non_pns=<?php echo $a['id_pegawai_non_pns']; ?>"  title='Detail'>
															<i class="ace-icon fa fa-search-plus bigger-130"></i>
														</a>

														<a class="green" href="?edit&id_pegawai_non_pns=<?php echo $a['id_pegawai_non_pns']; ?>"  title='Edit'>
															<i class="ace-icon fa fa-edit bigger-130"></i>
														</a>

														<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapus&id_pegawai_non_pns=<?php echo $a['id_pegawai_non_pns']; ?>' }" class="red"><i class="ace-icon fa fa-trash bigger-130"  title='Hapus'></i></a>
													</td>
												</tr>
												<?php endwhile;?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					  <?php } ?>

<?php
if(isset($_GET['hapus'])){
$id_pegawai_non_pns=$_GET['id_pegawai_non_pns'];
$query2 = "DELETE FROM pegawai_non_pns WHERE id_pegawai_non_pns='$id_pegawai_non_pns'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak  // Jika Sukses, Lakukan :  
echo '<script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="?data";
    //]]>
  </script>'; // Redirect ke halaman index.php
} else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='?data'>Kembali</a>";
}
  }
?>

<?php if(isset($_GET['edit'])){ ?>
<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Edit Data Users</h4>
								</div>
								<div class="card-body">
									<?php
$id_pegawai_non_pns=$_GET['id_pegawai_non_pns'];
$det=mysqli_query($koneksi,"SELECT * FROM pegawai_non_pns where id_pegawai_non_pns='$id_pegawai_non_pns' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  
 
  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
    <div class="form-group">
		<label><font color="">Data Identitas</font></label>
	</div>


	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama*</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="nama" value="<?=$d['nama']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> NIP (Nomor Identitas Pegawai)</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="nip" value="<?=$d['nip']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nomor Urut Pegawai</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="no_urut" value="<?=$d['no_urut']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> NIK (Nomor Induk Kependudukan)</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="nik" value="<?=$d['nik']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Jenis Kelamin </label>

					<div class="col-sm-9">
						<select name="jk" class="form-control">
			                <option value="<?=$d['jk']?>"><?=$d['nama']?></option>
			                <option value="Laki-laki">Laki-laki</option>
			                <option value="Perempuan">Perempuan</option>
		                </select>
					</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Tempat Lahir</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="tempat_lahir" value="<?=$d['tempat_lahir']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Tanggal Lahir</label>

		<div class="col-sm-9">
			<input type="date" id="form-field-1-1" placeholder="" name="tgl_lahir" value="<?=$d['tgl_lahir']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Agama </label>

					<div class="col-sm-9">
						<select name="agama" class="form-control">
			                <option value="<?=$d['agama']?>"><?=$d['nama']?></option>
			                <option value="Islam">Islam</option>
			                <option value="Kristen">Kristen</option>
			                <option value="Hindu">Hindu</option>
			                <option value="Budha">Budha</option>
			                <option value="Khong Hu Cu">Khong Hu Cu</option>
			                <option value="Katolik">Katolik</option>
		                </select>
					</div>
	</div>

	<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Status Perkawinan </label>

					<div class="col-sm-9">
						<select name="status_kawin" class="form-control">
			                <option value="<?=$d['status_kawin']?>"><?=$d['status_kawin']?></option>
			                <option value="Belum Menikah">Belum Menikah</option>
			                <option value="Menikah">Menikah</option>
			                <option value="Janda/Duda">Janda/Duda</option>
		                </select>
					</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Alamat</label>

		<div class="col-sm-9">
			<textarea input type="text" id="form-field-1-1" placeholder="" name="alamat" class="form-control col-xs-10 col-sm-6" /><?=$d['alamat']?></textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> No. Telp</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="no_telp" value="<?=$d['no_telp']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>


	<div class="form-group">
		<label><font color="">Data Kepegawaian</font></label>
	</div>


	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Status Kepegawaian</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="status_kepegawaian" value="<?=$d['status_kepegawaian']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Sumber Dana</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="sumber_dana" value="<?=$d['sumber_dana']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> TMT Awal</label>

		<div class="col-sm-9">
			<input type="date" id="form-field-1-1" placeholder="" name="tmt_awal" value="<?=$d['tmt_awal']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Pendidikan Terakhir</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="pendidikan_terakhir" value="<?=$d['pendidikan_terakhir']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Jabatan Saat Ini</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="jabatan_saat_ini" value="<?=$d['jabatan_saat_ini']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> TMT Jabatan Saat Ini</label>

		<div class="col-sm-9">
			<input type="date" id="form-field-1-1" placeholder="" name="tmt_jabatan_saat_ini" value="<?=$d['tmt_jabatan_saat_ini']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label><font color="">Tempat Kerja Sekarang</font></label>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Organisasi</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="organisasi" value="<?=$d['organisasi']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Satuan Kerja</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="satuan_kerja" value="<?=$d['satuan_kerja']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>


	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Unit Organisasi</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="unit_organisasi" value="<?=$d['unit_organisasi']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Unit Kerja</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="unit_kerja" value="<?=$d['unit_kerja']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>




	<div class="form-group">
		<label><font color="">Data Akun</font></label>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Email</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="email" value="<?=$d['email']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Username</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="username" value="<?=$d['username']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Password </label>

					<div class="col-sm-9">
						<input type="password" id="form-field-2" placeholder="" name="password" value="<?=$d['password']?>" class="form-control col-xs-10 col-sm-6" />
					</div>
	</div>
  
   </div>
        <!-- /.box-body -->
        <div class="card-footer">
        <a class="btn btn-info" href="?data"><span class="glyphicon glyphicon-arrow-left"></span>  Back</a>
          <input type="submit" name="submit1" class="btn btn-primary" value="Update">
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

								</div>
						</div>
					</div>
				</div>

<?php
if(isset($_POST['submit'])){
$id_pegawai_non_pns = $_POST['id_pegawai_non_pns'];
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$no_urut = $_POST['no_urut'];
$nik = $_POST['nik'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$agama = $_POST['agama'];
$status_kawin = $_POST['status_kawin'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$status_kepegawaian = $_POST['status_kepegawaian'];
$sumber_dana = $_POST['sumber_dana'];
$tmt_awal = $_POST['tmt_awal'];
$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$jabatan_saat_ini = $_POST['jabatan_saat_ini'];
$organisasi = $_POST['organisasi'];
$satuan_kerja = $_POST['status_kerja'];
$unit_organisasi = $_POST['unit_organisasi'];
$unit_kerja = $_POST['unit_kerja'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];


$query = "UPDATE
 `pegawai_non_pns`
SET
  `nama` = '$nama',
  `nip` = '$nip',
  `no_urut` = '$no_urut',
  `nik` = '$nik',
  `tempat_lahir` = '$tempat_lahir',
  `tgl_lahir` = '$tgl_lahir',
  `jk` = '$jk',
  `agama` = '$agama',
  `status_kawin` = '$status_kawin',
  `alamat` = '$alamat',
  `no_telp` = '$no_telp',
  `status_kepegawaian` = '$status_kepegawaian',
  `sumber_dana` = '$sumber_dana',
  `tmt_awal` = '$tmt_awal',
  `pendidikan_terakhir` = '$pendidikan_terakhir',
  `jabatan_saat_ini` = '$jabatan_saat_ini',
  `organisasi` = '$organisasi',
  `satuan_kerja` = '$satuan_kerja',
  `unit_organisasi` = '$unit_organisasi',
  `unit_kerja` = '$unit_kerja',
  `email` = '$email',
  `username` = '$username',
  `password` = '$password'
WHERE `id_pegawai_non_pns` = '$id_pegawai_non_pns';


";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :    
echo '<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Diupdate");
    window.location="?data";
    //]]>
  </script>'; // Redirect ke halaman index.php  
}else{    // Jika Gagal, Lakukan :    
echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
echo "<br><a href='?data'>Kembali Ke Form</a>";  
}
}
}}
?>


<?php if(isset($_GET['detail'])){ ?>
 <!-- Default box -->

 
	<div class="row">
							<div class="col-xs-12">
      
<?php
$id_pegawai_non_pns=$_GET['id_pegawai_non_pns'];
$det=mysqli_query($koneksi,"SELECT * FROM pegawai_non_pns where id_pegawai_non_pns='$id_pegawai_non_pns' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  

<center><h3><b>BALAI BESAR LABORATORIUM KESEHATAN PALEMBANG<br> DAFTAR RIWAYAT HIDUP PEGAWAI</b></h3></center>

<br>

<table class="table table-responsive">
	<tr>
		<td colspan="3"><label><b><i>I. IDENTITAS PRIBADI</i></b></label></td>
	</tr>
	<tr>
		<td><label><font color="">Nama</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['nama']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">NIP</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['nip']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">No Urut</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['no_urut']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">NIK</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['nik']?></font></label></td>
	</tr>

	<tr>
		<td><label><font color="">Tempat/Tanggal Lahir</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['tempat_lahir']?>, <?php echo $d['tgl_lahir']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Jenis Kelamin</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['jk']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Agama</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['agama']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Status Perkawinan</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['status_kawin']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Alamat</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['alamat']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">No. Telp</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['no_telp']?></font></label></td>
	</tr>
	
	<tr>
		<td colspan="3"><label><b><i>II.KEPEGAWAIAN</i></b></label></td>
	</tr>
	
	<tr>
		<td><label><font color="">Status Kepegawaian</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['status_kepegawaian']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Sumber Dana</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['sumber_dana']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">TMT Awal</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['tmt_awal']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Pendidikan Terakhir</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['pendidikan_terakhir']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Jabatan Saat Ini</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['jabatan_saat_ini']?></font></label></td>
	</tr>
	
	<tr>
		<td colspan="3"><label><b><i>III. TEMPAT KERJA SEKARANG</i></b></label></td>
	</tr>
	<tr>
		<td><label><font color="">Organisasi</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['organisasi']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Satuan Kerja</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['satuan_kerja']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Unit Organisasi</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['unit_organisasi']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Unit Kerja</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['unit_kerja']?></font></label></td>
	</tr>
	
</table>

<h5><b><i>IV. RIWAYAT JABATAN</i></b></h5>
 <table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Jabatan / Eselon</th>
				<th>TMT Jabatan</th>
				<th>No & tanggal SK</th>
				<th>Satuan Kerja</th>
				<th>Kelas / Jabatan</th>
				<th>Keterangan</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai_non_pns = $_GET['id_pegawai_non_pns'];
        $sql = "SELECT * FROM riwayat_jabatan_non where id_pegawai_non_pns='$id_pegawai_non_pns'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['jabatan'] ?></td>
		<td><?php echo $a['tmt'] ?></td>
		<td><?php echo $a['no_sk'] ?><br> <?php echo $a['tgl_sk'] ?></td>
		<td><?php echo $a['satuan_kerja'] ?></td>
		<td><?php echo $a['kelas_jabatan'] ?></td>
		<td><?php echo $a['keterangan'] ?></td>
	</tr>
<?php endwhile;?>
</tbody>
</table>


<h5><b><i>V. RIWAYAT PENDIDIKAN</i></b></h5>
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Pendidikan</th>
				<th>Nama Sekolah</th>
				<th>Tahun</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai_non_pns=$_GET['id_pegawai_non_pns'];
        $sql = "SELECT * FROM riwayat_pendidikan_non where id_pegawai_non_pns='$id_pegawai_non_pns'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['pendidikan'] ?></td>
		<td><?php echo $a['nama_sekolah'] ?></td>
		<td><?php echo $a['tahun'] ?></td>
	</tr>
<?php endwhile;?>
</tbody>
</table>



<h5><b><i>VII. RIWAYAT PELATIHAN JABATAN</i></b></h5>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pelatihan</th>
				<th>Lembaga Pelaksana</th>
				<th>Tahun Pelatihan</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai_non_pns = $_GET['id_pegawai_non_pns'];
        $sql = "SELECT * FROM riwayat_pelatihan_non where id_pegawai_non_pns='$id_pegawai_non_pns'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['nama_pelatihan'] ?></td>
		<td><?php echo $a['lembaga_pelaksana'] ?></td>
		<td><?php echo $a['tahun_pelatihan'] ?></td>
	</tr>
<?php endwhile;?>
</tbody>
</table>



<h5><b><i>VI. RIWAYAT KELUARGA</i></b></h5>
<table class="tabel table-responsive">
	<tr>
		<td><label><font color="">Nama</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['nama_suami_istri']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Tanggal Lahir</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['tgl_lahir_suami_istri']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Pekerjaan</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['pekerjaan_suami_istri']?></font></label></td>
	</tr>
</table>
 <table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Status</th>
			</tr>
		</thead>

		<tbody>
			<?php
        $sql = "SELECT * FROM riwayat_keluarga_non where id_pegawai_non_pns='$id_pegawai_non_pns'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['nama'] ?></td>
		<td><?php echo $a['tgl_lahir'] ?></td>
		<td><?php echo $a['jk'] ?></td>
		<td><?php echo $a['status'] ?></td>
	</tr>
<?php endwhile;?>
</tbody>
</table>
<?php } }
?>









<?php if(isset($_GET['lengkapidata'])){ ?>
<?php $id_pegawai_non_pns = $_GET['id_pegawai_non_pns']; ?>
<a href="?lengkapidata&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-info">Semua Data</button></a>
<a href="?jabatan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-success">Jabatan</button></a>
<a href="?pendidikan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-primary">Pendidikan</button></a>
<a href="?pelatihanjabatan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-warning">Riwayat Pelatihan</button></a>
<a href="?keluarga&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-success">Riwayat Keluarga</button></a>

<br>
<br>


<h3>Riwayat Pendidikan</h3>
 <table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Pendidikan</th>
				<th>Nama Sekolah</th>
				<th>Tahun</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai_non_pns=$_GET['id_pegawai_non_pns'];
        $sql = "SELECT * FROM riwayat_pendidikan_non where id_pegawai_non_pns='$id_pegawai_non_pns'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['pendidikan'] ?></td>
		<td><?php echo $a['nama_sekolah'] ?></td>
		<td><?php echo $a['tahun'] ?></td>
	</tr>
<?php endwhile;?>
</tbody>
</table>



<h3>Riwayat Jabatan</h3>
 <table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Jabatan</th>
				<th>TMT</th>
				<th>No & tanggal SK</th>
				<th>Satuan Kerja</th>
				<th>Kelas / Jabatan</th>
				<th>Keterangan</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai_non_pns = $_GET['id_pegawai_non_pns'];
        $sql = "SELECT * FROM riwayat_jabatan_non where id_pegawai_non_pns='$id_pegawai_non_pns'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['jabatan'] ?></td>
		<td><?php echo $a['tmt'] ?></td>
		<td><?php echo $a['no_sk'] ?><br> <?php echo $a['tgl_sk'] ?></td>
		<td><?php echo $a['satuan_kerja'] ?></td>
		<td><?php echo $a['kelas_jabatan'] ?></td>
		<td><?php echo $a['keterangan'] ?></td>
	</tr>
<?php endwhile;?>
</tbody>
</table>


<h3>Riwayat Pelatihan</h3>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pelatihan</th>
				<th>Lembaga Pelaksana</th>
				<th>Negara Pelaksana</th>
				<th>Tahun Pelatihan</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai_non_pns = $_GET['id_pegawai_non_pns'];
        $sql = "SELECT * FROM riwayat_pelatihan_non where id_pegawai_non_pns='$id_pegawai_non_pns'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['nama_pelatihan'] ?></td>
		<td><?php echo $a['lembaga_pelaksana'] ?></td>
		<td><?php echo $a['negara_pelaksana'] ?></td>
		<td><?php echo $a['tahun'] ?></td>
	</tr>
<?php endwhile;?>
</tbody>
</table>



<h3>Riwayat Keluarga</h3>
 <table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Status</th>
			</tr>
		</thead>

		<tbody>
			<?php
        $sql = "SELECT * FROM riwayat_keluarga_non where id_pegawai_non_pns='$id_pegawai_non_pns'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['nama'] ?></td>
		<td><?php echo $a['tgl_lahir'] ?></td>
		<td><?php echo $a['jk'] ?></td>
		<td><?php echo $a['status'] ?></td>
	</tr>
<?php endwhile;?>
</tbody>
</table>

<?php } ?>





<?php if(isset($_GET['pendidikan'])){ ?>
	<?php $id_pegawai_non_pns = $_GET['id_pegawai_non_pns']; ?>
<a href="?lengkapidata&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-info">Semua Data</button></a>
<a href="?jabatan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-success">Jabatan</button></a>
<a href="?pendidikan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-primary">Pendidikan</button></a>
<a href="?pelatihanjabatan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-warning">Riwayat Pelatihan</button></a>
<a href="?keluarga&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-success">Riwayat Keluarga</button></a>

<br>
<br>

<form class="form-horizontal" role="form" method="post" action="">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pendidikan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="pendidikan" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Sekolah </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="nama_sekolah" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Lulus </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="tahun" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>


	<div class="space-4"></div>


	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="submit" name="actpendidikan">
				<i class="ace-icon fa fa-check bigger-110"></i>
				Submit
			</button>

			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="ace-icon fa fa-undo bigger-110"></i>
				Reset
			</button>
		</div>
	</div>
</form>
<?php
if(isset($_POST['actpendidikan'])){
$id_pegawai_non_pns = $_GET['id_pegawai_non_pns'];
$pendidikan = $_POST['pendidikan'];
$nama_sekolah = $_POST['nama_sekolah'];
$tahun = $_POST['tahun'];

$query = "INSERT INTO `riwayat_pendidikan_non` (
  `id_riwayat_pendidikan_non`,
  `id_pegawai_non_pns`,
  `pendidikan`,
  `nama_sekolah`,
  `tahun`
)
VALUES
  (
    '',
    '$id_pegawai_non_pns',
    '$pendidikan',
    '$nama_sekolah',
    '$tahun'
  );


";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :   ?> 
<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="pegawai_non_pns.php?pendidikan&id_pegawai_non_pns=<?php echo $id_pegawai_non_pns?>";
    //]]>
  </script>
<?php }else{    // Jika Gagal, Lakukan :    
echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
echo "<br><a href='?data'>Kembali Ke Form</a>";  
}
}
?>

        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th>No</th>
				<th>Pendidikan</th>
				<th>Nama Sekolah</th>
				<th>Tahun</th>
				<th>Opsi</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai_non_pns=$_GET['id_pegawai_non_pns'];
        $sql = "SELECT * FROM riwayat_pendidikan_non where id_pegawai_non_pns='$id_pegawai_non_pns'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td class="center">
			<label class="pos-rel">
				<input type="checkbox" class="ace" />
				<span class="lbl"></span>
			</label>
		</td>

		<td>
			<?php echo $no++; ?>
		</td>
		<td><?php echo $a['pendidikan'] ?></td>
		<td><?php echo $a['nama_sekolah'] ?></td>
		<td><?php echo $a['tahun'] ?></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				
				<a class="green" href="?editpendidikan&id_riwayat_pendidikan_non=<?php echo $a['id_riwayat_pendidikan_non']; ?>">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>

				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuspendidikan&id_riwayat_pendidikan_non=<?php echo $a['id_riwayat_pendidikan_non']; ?>&id_pegawai_non_pns=<?php echo $a['id_pegawai_non_pns']; ?>' }" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>

			</div>

			<div class="hidden-md hidden-lg">
				<div class="inline pos-rel">
					<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
						<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
					</button>

					<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

						<li>
							<a href="?editpendidikan&id_riwayat_pendidikan_non=<?php echo $a['id_riwayat_pendidikan_non']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
								<span class="green">
									<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
								</span>
							</a>
						</li>

						<li><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuspendidikan&id_riwayat_pendidikan_non=<?php echo $a['id_riwayat_pendidikan_non']; ?>&id_pegawai_non_pns=<?php echo $a['id_pegawai_non_pns']; ?>' }" class="tooltip-error" data-rel="tooltip" title="Delete"><span class="red">
									<i class="ace-icon fa fa-trash-o bigger-120"></i>
								</span></a>


						</li>
					</ul>
				</div>
			</div>
		</td>
	</tr>
<?php endwhile;?>
</tbody>
</table>

<?php } ?>




<?php
  if(isset($_GET['hapuspendidikan'])){
    $id_riwayat_pendidikan_non=$_GET['id_riwayat_pendidikan_non'];
    $id_pegawai_non_pns=$_GET['id_pegawai_non_pns'];
$query2 = "DELETE FROM riwayat_pendidikan_non WHERE id_riwayat_pendidikan_non='$id_riwayat_pendidikan_non'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ ?>
<script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="?pendidikan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>";
    //]]>
  </script>
<?php } else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='?data'>Kembali</a>";
}
  }
?>


<?php if(isset($_GET['editpendidikan'])){ ?>
 <!-- Default box -->

 
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Pendidikan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
      
<?php
$id_riwayat_pendidikan_non=$_GET['id_riwayat_pendidikan_non'];
$det=mysqli_query($koneksi,"SELECT * FROM riwayat_pendidikan_non where id_riwayat_pendidikan_non='$id_riwayat_pendidikan_non' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  
 
  <form action="" method="post" enctype="multipart/form-data">
  	<input type="hidden" id="form-field-1" placeholder="" name="id_pegawai_non_pns" value="<?=$d['id_pegawai_non_pns']?>" class="form-control col-xs-10 col-sm-6" />
    <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pendidikan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="pendidikan" value="<?=$d['pendidikan']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Sekolah </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="nama_sekolah" value="<?=$d['nama_sekolah']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="tahun" value="<?=$d['tahun']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

   </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <a class="btn btn-info" href="?data"><span class="glyphicon glyphicon-arrow-left"></span>  Back</a>
          <input type="submit" name="acteditpendidikan" class="btn btn-primary" value="Save">
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  
  <?php 
}
?>
<?php  if(isset($_POST['acteditpendidikan'])){
$id_riwayat_pendidikan_non=$_GET['id_riwayat_pendidikan_non'];
$id_pegawai_non_pns = $_POST['id_pegawai_non_pns'];
$pendidikan = $_POST['pendidikan'];
$nama_sekolah = $_POST['nama_sekolah'];
$tahun = $_POST['tahun'];


    $update=mysqli_query($koneksi,"UPDATE
 `riwayat_pendidikan_non`
SET
  `id_pegawai_non_pns` = '$id_pegawai_non_pns',
  `pendidikan` = '$pendidikan',
  `nama_sekolah` = '$nama_sekolah',
  `tahun` = '$tahun'
WHERE `id_riwayat_pendidikan_non` = '$id_riwayat_pendidikan_non';

 ") or die ("gagal update "); ?>
    <script type="text/javascript">
        //<![CDATA[
        alert ("Edit Success");
        window.location="?pendidikan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>";
        //]]>
    </script>
    
     <?php   }
?>
<?php } ?>


<?php if(isset($_GET['jabatan'])){ ?>
	<?php $id_pegawai_non_pns = $_GET['id_pegawai_non_pns']; ?>
<a href="?lengkapidata&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-info">Semua Data</button></a>
<a href="?jabatan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-success">Jabatan</button></a>
<a href="?pendidikan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-primary">Pendidikan</button></a>
<a href="?pelatihanjabatan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-warning">Riwayat Pelatihan</button></a>
<a href="?keluarga&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-success">Riwayat Keluarga</button></a>

<br>
<br>

<form class="form-horizontal" role="form" method="post" action="">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Satuan Kerja </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="satuan_kerja" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jabatan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="jabatan" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> TMT </label>

		<div class="col-sm-9">
			<input type="date" id="form-field-1" placeholder="" name="tmt" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No SK </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="no_sk" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal SK </label>

		<div class="col-sm-9">
			<input type="date" id="form-field-1" placeholder="" name="tgl_sk" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>


	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelas / Jabatan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="kelas_jabatan" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Keterangan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="keterangan" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>


	<div class="space-4"></div>


	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="submit" name="actjabatan">
				<i class="ace-icon fa fa-check bigger-110"></i>
				Submit
			</button>

			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="ace-icon fa fa-undo bigger-110"></i>
				Reset
			</button>
		</div>
	</div>
</form>
<?php
if(isset($_POST['actjabatan'])){
$id_pegawai_non_pns = $_GET['id_pegawai_non_pns'];
$jabatan = $_POST['jabatan'];
$tmt = $_POST['tmt'];
$no_sk = $_POST['no_sk'];
$tgl_sk = $_POST['tgl_sk'];
$satuan_kerja = $_POST['satuan_kerja'];
$kelas_jabatan = $_POST['kelas_jabatan'];
$keterangan = $_POST['keterangan'];

$query = "INSERT INTO `riwayat_jabatan_non` (
  `id_riwayat_jabatan_non`,
  `id_pegawai_non_pns`,
  `jabatan`,
  `satuan_kerja`,
  `tmt`,
  `no_sk`,
  `tgl_sk`,
  `kelas_jabatan`,
  `keterangan`
)
VALUES
  (
    '',
    '$id_pegawai_non_pns',
    '$jabatan',
    '$satuan_kerja',
    '$tmt',
    '$no_sk',
    '$tgl_sk',
    '$kelas_jabatan',
    '$keterangan'
  );


";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :   ?> 
<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="pegawai_non_pns.php?jabatan&id_pegawai_non_pns=<?php echo $id_pegawai_non_pns?>";
    //]]>
  </script>
<?php }else{    // Jika Gagal, Lakukan :    
echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
echo "<br><a href='?data'>Kembali Ke Form</a>";  
}
}
?>

        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th>No</th>
				<th>Satuan Kerja</th>
				<th>Jabatan</th>
				<th>TMT</th>
				<th>No & tanggal SK</th>
				<th>Kelas / Jabatan</th>
				<th>Keterangan</th>
				<th>Opsi</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai_non_pns = $_GET['id_pegawai_non_pns'];
        $sql = "SELECT * FROM riwayat_jabatan_non where id_pegawai_non_pns='$id_pegawai_non_pns'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td class="center">
			<label class="pos-rel">
				<input type="checkbox" class="ace" />
				<span class="lbl"></span>
			</label>
		</td>

		<td>
			<?php echo $no++; ?>
		</td>
		<td><?php echo $a['satuan_kerja'] ?></td>
		<td><?php echo $a['jabatan'] ?></td>
		<td><?php echo $a['tmt'] ?></td>
		<td><?php echo $a['no_sk'] ?><br> <?php echo $a['tgl_sk'] ?></td>
		<td><?php echo $a['kelas_jabatan'] ?></td>
		<td><?php echo $a['keterangan'] ?></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				
				<a class="green" href="?editjabatan&id_riwayat_jabatan_non=<?php echo $a['id_riwayat_jabatan_non']; ?>">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>

				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapusjabatan&id_riwayat_jabatan_non=<?php echo $a['id_riwayat_jabatan_non']; ?>&id_pegawai_non_pns=<?php echo $a['id_pegawai_non_pns']; ?>' }" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>

			</div>

			<div class="hidden-md hidden-lg">
				<div class="inline pos-rel">
					<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
						<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
					</button>

					<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

						<li>
							<a href="?editjabatan&id_riwayat_jabatan_non=<?php echo $a['id_riwayat_jabatan_non']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
								<span class="green">
									<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
								</span>
							</a>
						</li>

						<li><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapusjabatan&id_riwayat_jabatan_non=<?php echo $a['id_riwayat_jabatan_non']; ?>&id_pegawai_non_pns=<?php echo $a['id_pegawai_non_pns']; ?>' }" class="tooltip-error" data-rel="tooltip" title="Delete"><span class="red">
									<i class="ace-icon fa fa-trash-o bigger-120"></i>
								</span></a>


						</li>
					</ul>
				</div>
			</div>
		</td>
	</tr>
<?php endwhile;?>
</tbody>
</table>

<?php } ?>




<?php
  if(isset($_GET['hapusjabatan'])){
    $id_riwayat_jabatan_non=$_GET['id_riwayat_jabatan_non'];
    $id_pegawai_non_pns=$_GET['id_pegawai_non_pns'];
$query2 = "DELETE FROM riwayat_jabatan_non WHERE id_riwayat_jabatan_non='$id_riwayat_jabatan_non'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ ?>
<script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="?jabatan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>";
    //]]>
  </script>
<?php } else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='?data'>Kembali</a>";
}
  }
?>


<?php if(isset($_GET['editjabatan'])){ ?>
 <!-- Default box -->

 
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Jabatan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
      
<?php
$id_riwayat_jabatan_non=$_GET['id_riwayat_jabatan_non'];
$det=mysqli_query($koneksi,"SELECT * FROM riwayat_jabatan_non where id_riwayat_jabatan_non='$id_riwayat_jabatan_non' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  
 
  <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
  	<input type="hidden" id="form-field-1" placeholder="" name="id_pegawai_non_pns" value="<?=$d['id_pegawai_non_pns']?>" class="form-control col-xs-10 col-sm-6" />
   <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Satuan Kerja </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="satuan_kerja" value="<?=$d['satuan_kerja']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jabatan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="jabatan" value="<?=$d['jabatan']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> TMT </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="tmt" value="<?=$d['tmt']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No SK </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="no_sk" value="<?=$d['no_sk']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal SK </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="tgl_sk" value="<?=$d['tgl_sk']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelas / Jabatan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="kelas_jabatan" value="<?=$d['kelas_jabatan']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Keterangan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="keterangan" value="<?=$d['keterangan']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

   </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <a class="btn btn-info" href="?data"><span class="glyphicon glyphicon-arrow-left"></span>  Back</a>
          <input type="submit" name="acteditjabatan" class="btn btn-primary" value="Save">
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  
  <?php 
}
?>
<?php  if(isset($_POST['acteditjabatan'])){
$id_riwayat_jabatan_non=$_GET['id_riwayat_jabatan_non'];
$id_pegawai_non_pns = $_POST['id_pegawai_non_pns'];
$jabatan = $_POST['jabatan'];
$tmt = $_POST['tmt'];
$no_sk = $_POST['no_sk'];
$tgl_sk = $_POST['tgl_sk'];
$satuan_kerja = $_POST['satuan_kerja'];
$kelas_jabatan = $_POST['kelas_jabatan'];
$keterangan = $_POST['keterangan'];

    $update=mysqli_query($koneksi,"UPDATE
 `riwayat_jabatan_non`
SET
  `id_pegawai_non_pns` = '$id_pegawai_non_pns',
  `jabatan` = '$jabatan',
  `satuan_kerja` = '$satuan_kerja',
  `tmt` = '$tmt',
  `no_sk` = '$no_sk',
  `tgl_sk` = '$tgl_sk',
  `kelas_jabatan` = '$kelas_jabatan',
  `keterangan` = '$keterangan'
WHERE `id_riwayat_jabatan_non` = '$id_riwayat_jabatan_non';



 ") or die ("gagal update "); ?>
    <script type="text/javascript">
        //<![CDATA[
        alert ("Edit Success");
        window.location="?jabatan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>";
        //]]>
    </script>
    
     <?php   }
?>
<?php } ?>


<?php if(isset($_GET['pelatihanjabatan'])){ ?>
		<?php $id_pegawai_non_pns = $_GET['id_pegawai_non_pns']; ?>
<a href="?lengkapidata&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-info">Semua Data</button></a>
<a href="?jabatan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-success">Jabatan</button></a>
<a href="?pendidikan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-primary">Pendidikan</button></a>
<a href="?pelatihanjabatan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-warning">Riwayat Pelatihan</button></a>
<a href="?keluarga&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-success">Riwayat Keluarga</button></a>

<br>
<br>

<form class="form-horizontal" role="form" method="post" action="">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Pelatihan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="nama_pelatihan" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Lembaga Pelaksana </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="lembaga_pelaksana" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Negara </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="negara_pelaksana" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Pelatihan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="tahun" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	
	<div class="space-4"></div>


	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="submit" name="actpelatihanjabatan">
				<i class="ace-icon fa fa-check bigger-110"></i>
				Submit
			</button>

			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="ace-icon fa fa-undo bigger-110"></i>
				Reset
			</button>
		</div>
	</div>
</form>
<?php
if(isset($_POST['actpelatihanjabatan'])){
$id_pegawai_non_pns = $_GET['id_pegawai_non_pns'];
$nama_pelatihan = $_POST['nama_pelatihan'];
$lembaga_pelaksana = $_POST['lembaga_pelaksana'];
$negara_pelaksana = $_POST['negara_pelaksana'];
$tahun = $_POST['tahun'];

$query = "INSERT INTO `riwayat_pelatihan_non` (
  `id_riwayat_pelatihan_non`,
  `id_pegawai_non_pns`,
  `nama_pelatihan`,
  `lembaga_pelaksana`,
  `negara_pelaksana`,
  `tahun`
)
VALUES
  (
    '',
    '$id_pegawai_non_pns',
    '$nama_pelatihan',
    '$lembaga_pelaksana',
    '$negara_pelaksana',
    '$tahun'
  );

";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :   ?> 
<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="pegawai_non_pns.php?pelatihanjabatan&id_pegawai_non_pns=<?php echo $id_pegawai_non_pns?>";
    //]]>
  </script>
<?php }else{    // Jika Gagal, Lakukan :    
echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
echo "<br><a href='?data'>Kembali Ke Form</a>";  
}
}
?>

        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th>No</th>
				<th>Nama Pelatihan</th>
				<th>Lembaga Pelaksana</th>
				<th>Negara Pelaksana</th>
				<th>Tahun Pelatihan</th>
				<th>Opsi</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai_non_pns = $_GET['id_pegawai_non_pns'];
        $sql = "SELECT * FROM riwayat_pelatihan_non where id_pegawai_non_pns='$id_pegawai_non_pns'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td class="center">
			<label class="pos-rel">
				<input type="checkbox" class="ace" />
				<span class="lbl"></span>
			</label>
		</td>

		<td>
			<?php echo $no++; ?>
		</td>
		<td><?php echo $a['nama_pelatihan'] ?></td>
		<td><?php echo $a['lembaga_pelaksana'] ?></td>
		<td><?php echo $a['negara_pelaksana'] ?></td>
		<td><?php echo $a['tahun'] ?></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				
				<a class="green" href="?editpelatihanjabatan&id_riwayat_pelatihan_non=<?php echo $a['id_riwayat_pelatihan_non']; ?>">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>

				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuspelatihanjabatan&id_riwayat_pelatihan_non=<?php echo $a['id_riwayat_pelatihan_non']; ?>&id_pegawai_non_pns=<?php echo $a['id_pegawai_non_pns']; ?>' }" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>

			</div>

			<div class="hidden-md hidden-lg">
				<div class="inline pos-rel">
					<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
						<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
					</button>

					<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

						<li>
							<a href="?editpelatihanjabatan&id_riwayat_pelatihan_non=<?php echo $a['id_riwayat_pelatihan_non']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
								<span class="green">
									<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
								</span>
							</a>
						</li>

						<li><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuspelatihanjabatan&id_riwayat_pelatihan_non=<?php echo $a['id_riwayat_pelatihan_non']; ?>&id_pegawai_non_pns=<?php echo $a['id_pegawai_non_pns']; ?>' }" class="tooltip-error" data-rel="tooltip" title="Delete"><span class="red">
									<i class="ace-icon fa fa-trash-o bigger-120"></i>
								</span></a>


						</li>
					</ul>
				</div>
			</div>
		</td>
	</tr>
<?php endwhile;?>
</tbody>
</table>

<?php } ?>




<?php
  if(isset($_GET['hapuspelatihanjabatan'])){
    $id_riwayat_pelatihan_non=$_GET['id_riwayat_pelatihan_non'];
    $id_pegawai_non_pns=$_GET['id_pegawai_non_pns'];
$query2 = "DELETE FROM riwayat_pelatihan_non WHERE id_riwayat_pelatihan_non='$id_riwayat_pelatihan_non'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ ?>
<script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="?pelatihanjabatan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>";
    //]]>
  </script>
<?php } else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='?data'>Kembali</a>";
}
  }
?>


<?php if(isset($_GET['editpelatihanjabatan'])){ ?>
 <!-- Default box -->

 
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Pelatihan Jabatan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
      
<?php
$id_riwayat_pelatihan_non=$_GET['id_riwayat_pelatihan_non'];
$det=mysqli_query($koneksi,"SELECT * FROM riwayat_pelatihan_non where id_riwayat_pelatihan_non='$id_riwayat_pelatihan_non' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  
 
  <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
  	<input type="hidden" id="form-field-1" placeholder="" name="id_pegawai_non_pns" value="<?=$d['id_pegawai_non_pns']?>" class="form-control col-xs-10 col-sm-6" />
  <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Pelatihan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" value="<?=$d['nama_pelatihan']?>" name="nama_pelatihan" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Lembaga Pelaksana </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" value="<?=$d['lembaga_pelaksana']?>" name="lembaga_pelaksana" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Negara Pelaksana </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" value="<?=$d['negara_pelaksana']?>" name="negara_pelaksana" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Pelatihan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="tahun" value="<?=$d['tahun']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>
   </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <a class="btn btn-info" href="?data"><span class="glyphicon glyphicon-arrow-left"></span>  Back</a>
          <input type="submit" name="acteditpelatihanjabatan" class="btn btn-primary" value="Save">
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  
  <?php 
}
?>
<?php  if(isset($_POST['acteditpelatihanjabatan'])){
$id_riwayat_pelatihan_non=$_GET['id_riwayat_pelatihan_non'];
$id_pegawai_non_pns = $_POST['id_pegawai_non_pns'];
$nama_pelatihan = $_POST['nama_pelatihan'];
$lembaga_pelaksana = $_POST['lembaga_pelaksana'];
$negara_pelaksana = $_POST['negara_pelaksana'];
$tahun = $_POST['tahun'];

    $update=mysqli_query($koneksi,"UPDATE
`riwayat_pelatihan_non`
SET
  `id_pegawai_non_pns` = '$id_pegawai_non_pns',
  `nama_pelatihan` = '$nama_pelatihan',
  `lembaga_pelaksana` = '$lembaga_pelaksana',
   `negara_pelaksana` = '$negara_pelaksana',
  `tahun` = '$tahun'
WHERE `id_riwayat_pelatihan_non` = '$id_riwayat_pelatihan_non';


 ") or die ("gagal update "); ?>
    <script type="text/javascript">
        //<![CDATA[
        alert ("Edit Success");
        window.location="?pelatihanjabatan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>";
        //]]>
    </script>
    
     <?php   }
?>
<?php } ?>





<?php if(isset($_GET['keluarga'])){ ?>
		<?php $id_pegawai_non_pns = $_GET['id_pegawai_non_pns']; ?>
<a href="?lengkapidata&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-info">Semua Data</button></a>
<a href="?jabatan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-success">Jabatan</button></a>
<a href="?pendidikan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-primary">Pendidikan</button></a>
<a href="?pelatihanjabatan&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-warning">Riwayat Pelatihan</button></a>
<a href="?keluarga&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>"><button class="btn btn-success">Riwayat Keluarga</button></a>

<br>
<br>
<h3>Data Keluarga</h3>

<form class="form-horizontal" role="form" method="post" action="">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="nama" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Lahir </label>

		<div class="col-sm-9">
			<input type="date" id="form-field-1" placeholder="" name="tgl_lahir" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Kelamin </label>

		<div class="col-sm-9">
			<select class="form-control col-xs-10 col-sm-6" name="jk">
				<option value="Laki-laki">Laki-laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="status" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>


	
	<div class="space-4"></div>


	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="submit" name="actkeluarga">
				<i class="ace-icon fa fa-check bigger-110"></i>
				Submit
			</button>

			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="ace-icon fa fa-undo bigger-110"></i>
				Reset
			</button>
		</div>
	</div>
</form>
<?php
if(isset($_POST['actkeluarga'])){
$id_pegawai_non_pns = $_GET['id_pegawai_non_pns'];
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$status = $_POST['status'];

$query = "INSERT INTO `riwayat_keluarga_non` (
  `id_riwayat_keluarga_non`,
  `id_pegawai_non_pns`,
  `nama`,
  `tgl_lahir`,
  `jk`,
  `status`
)
VALUES
  (
    '',
    '$id_pegawai_non_pns',
    '$nama',
    '$tgl_lahir',
    '$jk',
    '$status'
  );


";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :   ?> 
<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="pegawai_non_pns.php?keluarga&id_pegawai_non_pns=<?php echo $id_pegawai_non_pns?>";
    //]]>
  </script>
<?php }else{    // Jika Gagal, Lakukan :    
echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
echo "<br><a href='?data'>Kembali Ke Form</a>";  
}
}
?>

        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th>No</th>
				<th>Nama</th>
				<th>Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Status</th>
				<th>Opsi</th>
			</tr>
		</thead>

		<tbody>
			<?php
        $sql = "SELECT * FROM riwayat_keluarga_non where id_pegawai_non_pns='$id_pegawai_non_pns'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td class="center">
			<label class="pos-rel">
				<input type="checkbox" class="ace" />
				<span class="lbl"></span>
			</label>
		</td>

		<td>
			<?php echo $no++; ?>
		</td>
		<td><?php echo $a['nama'] ?></td>
		<td><?php echo $a['tgl_lahir'] ?></td>
		<td><?php echo $a['jk'] ?></td>
		<td><?php echo $a['status'] ?></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				
				<a class="green" href="?editkeluarga&id_riwayat_keluarga_non=<?php echo $a['id_riwayat_keluarga_non']; ?>">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>

				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuskeluarga&id_riwayat_keluarga_non=<?php echo $a['id_riwayat_keluarga_non']; ?>&id_pegawai_non_pns=<?php echo $a['id_pegawai_non_pns']; ?>' }" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>

			</div>

			<div class="hidden-md hidden-lg">
				<div class="inline pos-rel">
					<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
						<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
					</button>

					<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

						<li>
							<a href="?editkeluarga&id_riwayat_keluarga_non=<?php echo $a['id_riwayat_keluarga_non']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
								<span class="green">
									<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
								</span>
							</a>
						</li>

						<li><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuskeluarga&id_riwayat_keluarga_non=<?php echo $a['id_riwayat_keluarga_non']; ?>&id_pegawai_non_pns=<?php echo $a['id_pegawai_non_pns']; ?>' }" class="tooltip-error" data-rel="tooltip" title="Delete"><span class="red">
									<i class="ace-icon fa fa-trash-o bigger-120"></i>
								</span></a>


						</li>
					</ul>
				</div>
			</div>
		</td>
	</tr>
<?php endwhile;?>
</tbody>
</table>

<?php } ?>




<?php
  if(isset($_GET['hapuskeluarga'])){
    $id_riwayat_keluarga_non=$_GET['id_riwayat_keluarga_non'];
    $id_pegawai_non_pns=$_GET['id_pegawai_non_pns'];
$query2 = "DELETE FROM riwayat_keluarga_non WHERE id_riwayat_keluarga_non='$id_riwayat_keluarga_non'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ ?>
<script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="?keluarga&id_pegawai_non_pns=<?=$id_pegawai_non_pns?>";
    //]]>
  </script>
<?php } else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='?data'>Kembali</a>";
}
  }
?>


<?php if(isset($_GET['editkeluarga'])){ ?>
 <!-- Default box -->

 
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Riwayat Keluarga</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
      
<?php
$id_riwayat_keluarga_non=$_GET['id_riwayat_keluarga_non'];
$det=mysqli_query($koneksi,"SELECT * FROM riwayat_keluarga_non where id_riwayat_keluarga_non='$id_riwayat_keluarga_non' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  
 
  <form class="form-horizontal" role="form" method="post" action="">
  	<input type="hidden" id="form-field-1" placeholder="" value="<?=$d['id_pegawai_non_pns']?>" name="id_pegawai_non_pns" class="form-control col-xs-10 col-sm-6" />
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" value="<?=$d['nama']?>" name="nama" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Lahir </label>

		<div class="col-sm-9">
			<input type="date" id="form-field-1" placeholder="" value="<?=$d['tgl_lahir']?>" name="tgl_lahir" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jenis  Kelamin </label>

		<div class="col-sm-9">
			<select class="form-control" name="jk">
				<option value="<?=$d['jk']?>" selected><?=$d['jk']?></option>
				<option value="Laki-laki">Laki-laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" value="<?=$d['status']?>" name="status" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>
	
	<div class="space-4"></div>


	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="submit" name="acteditkeluarga">
				<i class="ace-icon fa fa-check bigger-110"></i>
				Submit
			</button>

			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="ace-icon fa fa-undo bigger-110"></i>
				Reset
			</button>
		</div>
	</div>
</form>
<?php
if(isset($_POST['acteditkeluarga'])){
$id_pegawai_non_pns = $_POST['id_pegawai_non_pns'];
$id_riwayat_keluarga_non = $_GET['id_riwayat_keluarga_non'];
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$status = $_POST['status'];

$query = "UPDATE
 `riwayat_keluarga_non`
set
  `id_pegawai_non_pns` = '$id_pegawai_non_pns',
  `nama` = '$nama',
  `tgl_lahir` = '$tgl_lahir',
  `jk` = '$jk',
  `status` = '$status'
where `id_riwayat_keluarga_non` = '$id_riwayat_keluarga_non';


";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :   ?> 
<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="pegawai_non_pns.php?keluarga&id_pegawai_non_pns=<?php echo $id_pegawai_non_pns?>";
    //]]>
  </script>
<?php }else{    // Jika Gagal, Lakukan :    
echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
echo "<br><a href='?data'>Kembali Ke Form</a>";  
}
}
}
}
?>














<!--tambah -->
<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
               <form action="" method="post" class="niceform" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nama </label>
              <input name="nama" type="text" class="form-control" placeholder="nama Lengkap ..">
            </div>
            <div class="form-group">
              <label>Username </label>
              <input name="username" type="text" class="form-control" placeholder="Username ..">
            </div>
            <div class="form-group">
              <label>Password </label>
              <input name="password" type="text" class="form-control" placeholder="Password ..">
            </div>
            <div class="form-group">
              <label>Level </label>
              <select name="level" class="form-control">
                <option >.:pilih level:.</option>
                <option value="admin">admin</option>
                <option value="kepala">kepala</option>
              </select>
            </div>
             

<?php
if(isset($_POST['submit'])){
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

$query = "INSERT INTO user 
  (id_user, 
  nama, 
  username, 
  PASSWORD, 
  LEVEL
  )
  VALUES
  ('', 
  '$nama', 
  '$username', 
  '$password', 
  '$level'
  );

";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :    
echo '<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="?data";
    //]]>
  </script>'; // Redirect ke halaman index.php  
}else{    // Jika Gagal, Lakukan :    
echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";    
echo "<br><a href='?data'>Kembali Ke Form</a>";  
}
}
?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" name="submit" class="btn btn-primary" value="Save"> 
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>













				</div>
			</div>

<?php include 'footer.php'?>