<?php include 'header.php'; ?>	
	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Pegawai</h4>
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
								<a href="pegawai.php?data">Pegawai</a>
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
													<th width="250px">NIP</th>
										            <th>Nama</th>
										            <th>Jabatan</th>
										            <th>Pendidikan Terkahir</th>
										            <th>Keterangan</th>
										            <th>Id User</th>
													<th width="90px">Opsi</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>No</th>
													<th width="250px">NIP</th>
										            <th>Nama</th>
										            <th>Jabatan</th>
										            <th>Pendidikan Terkahir</th>
										            <th>Keterangan</th>
										            <th>Id User</th>
													<th>Opsi</th>
												</tr>
											</tfoot>
											<tbody>
											<?php
									        $query = mysqli_query($koneksi,"SELECT * FROM pegawai");
									        $no=1;
									        while ($a = mysqli_fetch_array($query)) :?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $a['nip'] ?></td>
													<td><?php echo $a['nama'] ?></td>
													<td><?php echo $a['jabatan'] ?></td>
													<td><?php echo $a['pendidikan'] ?></td>
													<td><?php echo $a['keterangan'] ?></td>
													<td><?php echo $a['id_user'] ?></td>
													<td><a class="blue" href="?lengkapidata&id_pegawai=<?php echo $a['id_pegawai']; ?>" title='Lengkapi Data'>
															<i class="ace-icon fa fa-plus bigger-130"></i>
														</a>

														<a class="blue" href="?detail&id_pegawai=<?php echo $a['id_pegawai']; ?>"  title='Detail'>
															<i class="ace-icon fa fa-search-plus bigger-130"></i>
														</a>

														<a class="green" href="?edit&id_pegawai=<?php echo $a['id_pegawai']; ?>"  title='Edit'>
															<i class="ace-icon fa fa-edit bigger-130"></i>
														</a>

														<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapus&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="red"><i class="ace-icon fa fa-trash bigger-130"  title='Hapus'></i></a>
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
    $id_pegawai=$_GET['id_pegawai'];
$query2 = "DELETE FROM pegawai_pns WHERE id_pegawai='$id_pegawai'";
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
$id_pegawai=$_GET['id_pegawai'];
$det=mysqli_query($koneksi,"SELECT * FROM pegawai_pns where id_pegawai='$id_pegawai' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?> 

 <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
		<label><font color="">Data Identitas</font></label>
		<input type="hidden" id="form-field-1" placeholder="" name="id_pegawai" value="<?php echo $d['id_pegawai']?>" class="form-control col-xs-10 col-sm-6" />
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NIP/NRP Lama* </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="nip_lama" value="<?php echo $d['nip_lama']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> NIP/NRP Baru </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="nip_baru" value="<?php echo $d['nip_baru']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> No. Kartu Pegawai</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="no_karpeg" value="<?php echo $d['no_karpeg']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama*</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="nama" value="<?php echo $d['nama']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Jenis Kelamin </label>

					<div class="col-sm-9">
						<select name="jk" class="form-control">
			                <option value="<?php echo $d['jk']?>"><?php echo $d['jk']?></option>
			                <option value="Laki-laki">Laki-laki</option>
			                <option value="Perempuan">Perempuan</option>
		                </select>
					</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Tempat Lahir</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="tempat_lahir" value="<?php echo $d['tempat_lahir']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Tanggal Lahir</label>

		<div class="col-sm-9">
			<input type="date" id="form-field-1-1" placeholder="" name="tgl_lahir" value="<?php echo $d['tgl_lahir']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Agama </label>

					<div class="col-sm-9">
						<select name="agama" class="form-control">
			                <option value="<?php echo $d['agama'];?>"><?php echo $d['agama'];?></option>
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
			                <option value="<?php echo $d['status_kawin'];?>"><?php echo $d['status_kawin'];?></option>
			                <option value="Belum Menikah">Belum Menikah</option>
			                <option value="Menikah">Menikah</option>
			                <option value="Janda/Duda">Janda/Duda</option>
		                </select>
					</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Alamat</label>

		<div class="col-sm-9">
			<textarea input type="text" id="form-field-1-1" placeholder="" name="alamat"  class="form-control col-xs-10 col-sm-6" /><?php echo $d['alamat'];?></textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> No. Telp</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="no_telp" value="<?php echo $d['no_telp'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> NIK</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="nik" value="<?php echo $d['nik'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> NPWP</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="npwp" value="<?php echo $d['npwp'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label><font color="">Data Kepegawaian</font></label>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> TMT CPNS</label>

		<div class="col-sm-9">
			<input type="date" id="form-field-1-1" placeholder="" name="tmt_cpns" value="<?php echo $d['tmt_cpns'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> TMT PNS</label>

		<div class="col-sm-9">
			<input type="date" id="form-field-1-1" placeholder="" name="tmt_pns" value="<?php echo $d['tmt_pns'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Status Kepegawaian</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="status_kepegawaian" value="<?php echo $d['status_kepegawaian'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Jenis Kepegawaian</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="jenis_kepegawaian" value="<?php echo $d['jenis_kepegawaian'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Status Hukuman Disiplin</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="status_hukuman_disiplin" value="<?php echo $d['status_hukuman_disiplin'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Pendidikan Terakhir</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="pendidikan_terakhir" value="<?php echo $d['pendidikan_terakhir'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Jabatan Saat Ini</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="jabatan_saat_ini" value="<?php echo $d['jabatan_saat_ini'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> TMT Jabatan Saat Ini</label>

		<div class="col-sm-9">
			<input type="date" id="form-field-1-1" placeholder="" name="tmt_jabatan_saat_ini" value="<?php echo $d['tmt_jabatan_saat_ini'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Masa Kerja Golongan</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="masa_kerja_golongan" value="<?php echo $d['masa_kerja_golongan'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Eselon</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="eselon" value="eselon" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label><font color="">Tempat Kerja Sekarang</font></label>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Organisasi</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="organisasi" value="<?php echo $d['organisasi'];?>" value="Direktorat Jenderal Pelayanan Kesehatan" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Satuan Kerja</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="satuan_kerja"  value="<?php echo $d['satuan_kerja'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Satuan Organisasi</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="satuan_organisasi" value="<?php echo $d['satuan_organisasi'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Unit Organisasi</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="unit_organisasi" value="<?php echo $d['unit_organisasi'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Unit Kerja</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="unit_kerja" value="<?php echo $d['unit_kerja'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>



	<div class="form-group">
		<label><font color="">Data Akun</font></label>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Email</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="email" value="<?php echo $d['email'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Username</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="username" value="<?php echo $d['username'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Password </label>

					<div class="col-sm-9">
						<input type="password" id="form-field-2" placeholder="" name="password" value="<?php echo $d['password'];?>" class="form-control col-xs-10 col-sm-6" />
					</div>
				</div>


	<div class="form-group">
		<label><font color="">Data Keluarga</font></label>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Suami / Istri</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="nama_suami_istri" value="<?php echo $d['nama_suami_istri'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Tanggal Lahir</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="tgk_lahir_suami_istri" value="<?php echo $d['tgl_lahir_suami_istri'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Pekerjaan</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="pekerjaan_suami_istri" value="<?php echo $d['pekerjaan_suami_istri'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> No Seri Karsu / Karis</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="no_seri" value="<?php echo $d['no_seri'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label><font color="">Data Gaji</font></label>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Gaji</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="gaji" value="<?php echo $d['gaji'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Pajak</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="pajak" value="<?php echo $d['pajak'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>



	<div class="form-group">
		<label><font color="red">Kontak yang bisa dihubungi dalam keadaan darurat</font></label>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"><font color="red"> Nama</font></label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="nama_kontak" value="<?php echo $d['nama_kontak'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"><font color="red"> Hubungan</font></label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="hubungan" value="<?php echo $d['hubungan'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"><font color="red"> No Handphone</font></label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="no_hp_kontak" value="<?php echo $d['no_hp_kontak'];?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Status KPE </label>

					<div class="col-sm-9">
						<select name="status_kpe" class="form-control">
							
			                <option value="Belum KPE">Belum KPE</option>
			                <option value="Sudah Foto">Sudah Foto</option>
			                <option value="Cetak KPE">Cetak KPE</option>
			                <option value="Terima KPE">Terima KPE</option>
		                </select>
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
}
?>
<?php  
if(isset($_POST['submit1'])){
$id_user=$_GET['id_user'];
$nama = $_POST['nama'];
$nip_baru = $_POST['nip_baru'];
$nip_lama = $_POST['nip_lama'];
$no_karpeg = $_POST['no_karpeg'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$agama = $_POST['agama'];
$status_kawin = $_POST['status_kawin'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$nik = $_POST['nik'];
$npwp = $_POST['npwp'];
$email = $_POST['email'];
$nama_kontak = $_POST['nama_kontak'];
$hubungan = $_POST['hubungan'];
$no_hp_kontak = $_POST['no_hp_kontak'];
$tmt_cpns = $_POST['tmt_cpns'];
$tmt_pns = $_POST['tmt_pns'];
$status_kepegawaian = $_POST['status_kepegawaian'];
$jenis_kepegawaian = $_POST['jenis_kepegawaian'];
$status_hukuman_disiplin = $_POST['status_hukuman_disiplin'];
$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$jabatan_saat_ini = $_POST['jabatan_saat_ini'];
$tmt_jabatan_saat_ini = $_POST['tmt_jabatan_saat_ini'];
$masa_kerja_golongan = $_POST['masa_kerja_golongan'];
$eselon = $_POST['eselon'];
$organisasi = $_POST['organisasi'];
$satuan_kerja = $_POST['status_kerja'];
$satuan_organisasi = $_POST['satuan_organisasi'];
$unit_organisasi = $_POST['unit_organisasi'];
$unit_kerja = $_POST['unit_kerja'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama_suami_istri = $_POST['nama_suami_istri'];
$tgl_lahir_suami_istri = $_POST['tgl_lahir_suami_istri'];
$pekerjaan_suami_istri = $_POST['pekerjaan_suami_istri'];
$no_seri = $_POST['no_seri'];
$gaji = $_POST['gaji'];
$pajak = $_POST['pajak'];

    $update=mysqli_query($koneksi,"
UPDATE `pegawai_pns` 
	SET
	`nama` = '$nama', 
	`nip_baru` = '$nip_baru', 
	`nip_lama` = '$nip_lama', 
	`no_karpeg` = '$no_karpeg', 
	`tempat_lahir` = '$tempat_lahir', 
	`tgl_lahir` = '$tgl_lahir', 
	`jk` = '$jk', 
	`agama` = '$agama', 
	`status_kawin` = '$status_kawin', 
	`alamat` = '$alamat', 
	`no_telp` = '$no_telp', 
	`nik` = '$nik', 
	`npwp` = '$npwp', 
	`email` = '$email', 
	`nama_kontak` = '$nama_kontak', 
	`hubungan` = '$hubungan', 
	`no_hp_kontak` = '$no_hp_kontak', 
	`tmt_cpns` = '$tmt_cpns', 
	`tmt_pns` = '$tmt_pns', 
	`status_kepegawaian` = '$status_kepegawaian', 
	`jenis_kepegawaian` = '$jenis_kepegawaian', 
	`status_hukuman_disiplin` = '$status_hukuman_disiplin', 
	`pendidikan_terakhir` = '$pendidikan_terakhir', 
	`jabatan_saat_ini` = '$jabatan_saat_ini', 
	`tmt_jabatan_saat_ini` = '$tmt_jabatan_saat_ini', 
	`masa_kerja_golongan` = '$masa_kerja_golongan', 
	`eselon` = '$eselon', 
	`organisasi` = '$organisasi', 
	`satuan_kerja` = '$satuan_kerja', 
	`satuan_organisasi` = '$satuan_organisasi', 
	`unit_organisasi` = '$unit_organisasi', 
	`unit_kerja` = '$unit_kerja', 
	`username` = '$username', 
	`password` = '$password', 
	`nama_suami_istri` = '$nama_suami_istri', 
	`tgl_lahir_suami_istri` = '$tgl_lahir_suami_istri', 
	`pekerjaan_suami_istri` = '$pekerjaan_suami_istri', 
	`no_seri` = '$no_seri', 
	`gaji` = '$gaji', 
	`pajak` = '$pajak'
	
	WHERE
	`id_pegawai` = '$id_pegawai' ;
  ") or die ("gagal update ");
    echo '<script type="text/javascript">
        //<![CDATA[
        alert ("Edit Success");
        window.location="?data";
        //]]>
    </script>';
    
        }
?>
<?php } ?>


<?php if(isset($_GET['detail'])){ ?>
<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"></h4>
								</div>
								<div class="card-body">      
<?php
$id_pegawai=$_GET['id_pegawai'];
$det=mysqli_query($koneksi,"SELECT * FROM pegawai_pns where id_pegawai='$id_pegawai' ")or die(mysql_error());
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
		<td><label><font color="">NIP/NRP Baru</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['nip_baru']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">NIP/NRP Lama</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['nip_lama']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">No. Kartu Pegawai</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['no_karpeg']?></font></label></td>
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
		<td><label><font color="">NIK</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['nik']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">NPWP</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['npwp']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Email</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['email']?></font></label></td>
	</tr>
	<tr>
		<td colspan="3"><label><font color="red">Kontak yang bisa dihubungi dalam keadaan darurat</font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Nama</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['nama_kontak']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Hubungan</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['hubungan']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">No. HP</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['no_hp_kontak']?></font></label></td>
	</tr>
	<tr>
		<td colspan="3"><label><b><i>II.KEPEGAWAIAN</i></b></label></td>
	</tr>
	<tr>
		<td><label><font color="">TMT CPNS</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['tmt_cpns']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">TMT PNS</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['tmt_pns']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Status Kepegawaian</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['status_kepegawaian']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Jenis Kepegawaian</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['jenis_kepegawaian']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Status Hukuman Disiplin</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['status_hukuman_disiplin']?></font></label></td>
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
		<td><label><font color="">TMT Jabatan Saat Ini</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['tmt_jabatan_saat_ini']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Masa Kerja Golongan</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['masa_kerja_golongan']?></font></label></td>
	</tr>
	<tr>
		<td><label><font color="">Eselon</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['eselon']?></font></label></td>
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
		<td><label><font color="">Satuan Organisasi</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['satuan_organisasi']?></font></label></td>
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
<h5><b><i>IV. RIWAYAT KEPANGKATAN</i></b></h5>
 <table class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>No</th>
														<th>Pangkat</th>
														<th>Golongan</th>
														<th>TMT</th>
														<th>No & Tanggal SK</th>
														<th>Pejabat Penandatangan</th>
													</tr>
												</thead>

												<tbody>
													<?php
		$id_pegawai = $_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_pangkat where id_pegawai='$id_pegawai'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
													<tr>
														<td><?php echo $no++; ?></td>
														<td><?php echo $a['pangkat'] ?></td>
														<td><?php echo $a['golongan'] ?></td>
														<td><?php echo $a['tmt'] ?></td>
														<td><?php echo $a['no_sk'] ?><br><?php echo $a['tgl_sk'] ?></td>
														<td><?php echo $a['pejabat_penandatangan'] ?></td>
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
		$id_pegawai=$_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_pendidikan where id_pegawai='$id_pegawai'";
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



<h5><b><i>VI. RIWAYAT JABATAN</i></b></h5>
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
		$id_pegawai = $_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_jabatan where id_pegawai='$id_pegawai'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['jabatan_eselon'] ?></td>
		<td><?php echo $a['tmt_jabatan'] ?></td>
		<td><?php echo $a['no_sk'] ?><br> <?php echo $a['tgl_sk'] ?></td>
		<td><?php echo $a['satuan_kerja'] ?></td>
		<td><?php echo $a['kelas_jabatan'] ?></td>
		<td><?php echo $a['keterangan'] ?></td>
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
		$id_pegawai = $_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_pelatihan_jabatan where id_pegawai='$id_pegawai'";
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

<h5><b><i>VIII. RIWAYAT PELATIHAN TEKNIS</i></b></h5>
   <table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pelatihan</th>
				<th>Lembaga Pelaksana</th>
				<th>Negara</th>
				<th>Tahun Pelatihan</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai=$_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_pelatihan_teknis where id_pegawai='$id_pegawai'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['pelatihan_teknis'] ?></td>
		<td><?php echo $a['lembaga_teknis'] ?></td>
		<td><?php echo $a['negara'] ?></td>
		<td><?php echo $a['tahun_teknis'] ?></td>
	</tr>
<?php endwhile;?>
</tbody>
</table>


<h3>IX. RIWAYAT PENGHARGAAN</h3>
<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Penghargaan</th>
				<th>No & Tanggal SK</th>
				<th>Instansi Pemberi</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai = $_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_penghargaan where id_pegawai='$id_pegawai'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['nama_penghargaan'] ?></td>
		<td><?php echo $a['no_sk'] ?><br><?php echo $a['tgl_sk'] ?></td>
		<td><?php echo $a['instansi_pemberi'] ?></td>
	</tr>
<?php endwhile;?>
</tbody>
</table>


<h5><b><i>X. RIWAYAT KINERJA</i></b></h5>
  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Jabatan</th>
				<th>Tahun Penilaian</th>
				<th>Nilai PPKPNS</th>
				<th>Instansi</th>
				<th>Organisasi</th>
				<th>Satuan Kerja</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai =$_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_kinerja where id_pegawai='$id_pegawai'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['nama_jabatan'] ?></td>
		<td><?php echo $a['tahun_penilaian'] ?></td>
		<td><?php echo $a['nilai_ppkpns'] ?></td>
		<td><?php echo $a['instansi'] ?></td>
		<td><?php echo $a['organisasi'] ?></td>
		<td><?php echo $a['satuan_kerja'] ?></td>
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
	<tr>
		<td><label><font color="">No. Seri Karis / Karsu</font></label></td>
		<td>:</td>
		<td><label><font color=""><?php echo $d['no_seri']?></font></label></td>
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
        $sql = "SELECT * FROM riwayat_keluarga where id_pegawai='$id_pegawai'";
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
	</div>
						</div>
					</div>
				</div>
<?php } }
?>


<?php if(isset($_GET['lengkapidata'])){ ?>
<?php $id_pegawai = $_GET['id_pegawai']; ?>
<a href="?lengkapidata&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Semua Data</button></a>
<a href="?pangkat&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Pangkat</button></a>
<a href="?pendidikan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Pendidikan</button></a>
<a href="?jabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Jabatan</button></a>
<a href="?pelatihanjabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-warning">Riwayat Pelatihan Jabatan</button></a>
<a href="?pelatihanteknis&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-danger">Riwayat Pelatihan Teknis</button></a>
<a href="?penghargaan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Riwayat Penghargaan</button></a>
<a href="?kinerja&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Riwayat Kinerja</button></a>
<a href="?keluarga&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Riwayat Keluarga</button></a>

<br>
<br>

<h3>Riwayat Pangkat</h3>
 <table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>No</th>
														<th>Pangkat</th>
														<th>Golongan</th>
														<th>TMT</th>
														<th>No & Tanggal SK</th>
														<th>Pejabat Penandatangan</th>
													</tr>
												</thead>

												<tbody>
													<?php
		$id_pegawai = $_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_pangkat where id_pegawai='$id_pegawai'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
													<tr>
														<td><?php echo $no++; ?></td>
														<td><?php echo $a['pangkat'] ?></td>
														<td><?php echo $a['golongan'] ?></td>
														<td><?php echo $a['tmt'] ?></td>
														<td><?php echo $a['no_sk'] ?><br><?php echo $a['tgl_sk'] ?></td>
														<td><?php echo $a['pejabat_penandatangan'] ?></td>
													</tr>
											 <?php endwhile;?>
												</tbody>
											</table>

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
		$id_pegawai=$_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_pendidikan where id_pegawai='$id_pegawai'";
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
		$id_pegawai = $_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_jabatan where id_pegawai='$id_pegawai'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['jabatan_eselon'] ?></td>
		<td><?php echo $a['tmt_jabatan'] ?></td>
		<td><?php echo $a['no_sk'] ?><br> <?php echo $a['tgl_sk'] ?></td>
		<td><?php echo $a['satuan_kerja'] ?></td>
		<td><?php echo $a['kelas_jabatan'] ?></td>
		<td><?php echo $a['keterangan'] ?></td>
	</tr>
<?php endwhile;?>
</tbody>
</table>


<h3>Riwayat Pelatihan Jabatan</h3>
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
		$id_pegawai = $_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_pelatihan_jabatan where id_pegawai='$id_pegawai'";
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


<h3>Riwayat Pelatihan Teknis</h3>
   <table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pelatihan</th>
				<th>Lembaga Pelaksana</th>
				<th>Negara</th>
				<th>Tahun Pelatihan</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai=$_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_pelatihan_teknis where id_pegawai='$id_pegawai'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['pelatihan_teknis'] ?></td>
		<td><?php echo $a['lembaga_teknis'] ?></td>
		<td><?php echo $a['negara'] ?></td>
		<td><?php echo $a['tahun_teknis'] ?></td>
	</tr>
<?php endwhile;?>
</tbody>
</table>


<h3>Riwayat Penghargaan</h3>
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Penghargaan</th>
				<th>No & Tanggal SK</th>
				<th>Instansi Pemberi</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai = $_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_penghargaan where id_pegawai='$id_pegawai'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['nama_penghargaan'] ?></td>
		<td><?php echo $a['no_sk'] ?><br><?php echo $a['tgl_sk'] ?></td>
		<td><?php echo $a['instansi_pemberi'] ?></td>
	</tr>
<?php endwhile;?>
</tbody>
</table>


<h3>Riwayat Kinerja</h3>
  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Jabatan</th>
				<th>Tahun Penilaian</th>
				<th>Nilai PPKPNS</th>
				<th>Instansi</th>
				<th>Organisasi</th>
				<th>Satuan Kerja</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai =$_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_kinerja where id_pegawai='$id_pegawai'";
        $query = mysqli_query($koneksi,$sql);
        $no=1;
        while ($a = mysqli_fetch_array($query)) :?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $a['nama_jabatan'] ?></td>
		<td><?php echo $a['tahun_penilaian'] ?></td>
		<td><?php echo $a['nilai_ppkpns'] ?></td>
		<td><?php echo $a['instansi'] ?></td>
		<td><?php echo $a['organisasi'] ?></td>
		<td><?php echo $a['satuan_kerja'] ?></td>
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
        $sql = "SELECT * FROM riwayat_keluarga where id_pegawai='$id_pegawai'";
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



<?php if(isset($_GET['pangkat'])){ ?>
	<?php $id_pegawai = $_GET['id_pegawai']; ?>
<a href="?lengkapidata&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Semua Data</button></a>
<a href="?pangkat&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Pangkat</button></a>
<a href="?pendidikan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Pendidikan</button></a>
<a href="?jabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Jabatan</button></a>
<a href="?pelatihanjabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-warning">Riwayat Pelatihan Jabatan</button></a>
<a href="?pelatihanteknis&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-danger">Riwayat Pelatihan Teknis</button></a>
<a href="?penghargaan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Riwayat Penghargaan</button></a>
<a href="?kinerja&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Riwayat Kinerja</button></a>
<a href="?keluarga&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Riwayat Keluarga</button></a>

<br>
<br>

<form class="form-horizontal" role="form" method="post" action="">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pangkat </label>

		<div class="col-sm-9">
			<select class="form-control" name="pangkat">
				<option value="Pembina Utama">Pembina Utama</option>
				<option value="Pembina Utama Madya">Pembina Utama Madya</option>
				<option value="Pembina Utama Muda">Pembina Utama Muda</option>
				<option value="Pembina Tingkat I">Pembina Tingkat I</option>
				<option value="Pembina">Pembina</option>
				<option value="Penata Tingkat I">Penata Tingkat I</option>
				<option value="Penata">Penata</option>
				<option value="Penata Muda Tingkat I">Penata Muda Tingkat I</option>
				<option value="Penata Muda">Penata Muda</option>
				<option value="Pengatur Tingkat I">Pengatur Tingkat I</option>
				<option value="Pengatur">Pengatur</option>
				<option value="Pengatur Muda Tingkat I">Pengatur Muda Tingkat I</option>
				<option value="Pengatur Muda">Pengatur Muda</option>
				<option value="Juru Tingkat I">Juru Tingkat I</option>
				<option value="Juru">Juru</option>
				<option value="Juru Muda Tingkat I">Juru Muda Tingkat I</option>
				<option value="Juru Muda">Juru Muda</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Golongan </label>

		<div class="col-sm-9">
			<select class="form-control" name="golongan">
				<option value="IV/e">IV/e</option>
				<option value="IV/d">IV/d</option>
				<option value="IV/c">IV/c</option>
				<option value="IV/b">IV/b</option>
				<option value="IV/a">IV/a</option>
				<option value="III/d">III/d</option>
				<option value="III/c">III/c</option>
				<option value="III/b">III/b</option>
				<option value="III/a">III/a</option>
				<option value="II/d">II/d</option>
				<option value="II/c">II/c</option>
				<option value="II/b">II/b</option>
				<option value="II/a">II/a</option>
				<option value="I/d">I/d</option>
				<option value="I/c">I/c</option>
				<option value="I/b">I/b</option>
				<option value="I/a">I/a</option>
			</select>
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
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pejabat Penandatangan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="pejabat_penandatangan" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="space-4"></div>


	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="submit" name="actpangkat">
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
if(isset($_POST['actpangkat'])){
$id_pegawai = $_GET['id_pegawai'];
$pangkat = $_POST['pangkat'];
$golongan = $_POST['golongan'];
$tmt = $_POST['tmt'];
$no_sk = $_POST['no_sk'];
$tgl_sk = $_POST['tgl_sk'];
$pejabat_penandatangan = $_POST['pejabat_penandatangan'];


$query = "INSERT INTO `riwayat_pangkat` (
  `id_riwayat_pangkat`,
  `id_pegawai`,
  `pangkat`,
  `golongan`,
  `tmt`,
  `no_sk`,
  `tgl_sk`,
  `pejabat_penandatangan`
)
VALUES
  (
    '',
    '$id_pegawai',
    '$pangkat',
    '$golongan',
    '$tmt',
    '$no_sk',
    '$tgl_sk',
    '$pejabat_penandatangan'
  );


";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan : ?>   
	<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="pegawai_pns.php?pangkat&id_pegawai=<?php echo $id_pegawai?>";
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
														<th>Pangkat</th>
														<th>Golongan</th>
														<th>TMT</th>
														<th>No & Tanggal SK</th>
														<th>Pejabat Penandatangan</th>
														<th>Opsi</th>
													</tr>
												</thead>

												<tbody>
													<?php
		$id_pegawai = $_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_pangkat where id_pegawai='$id_pegawai'";
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
														<td><?php echo $a['pangkat'] ?></td>
														<td><?php echo $a['golongan'] ?></td>
														<td><?php echo $a['tmt'] ?></td>
														<td><?php echo $a['no_sk'] ?><br><?php echo $a['tgl_sk'] ?></td>
														<td><?php echo $a['pejabat_penandatangan'] ?></td>
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																
																<a class="green" href="?editpangkat&id_riwayat_pangkat=<?php echo $a['id_riwayat_pangkat']; ?>">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuspangkat&id_riwayat_pangkat=<?php echo $a['id_riwayat_pangkat']; ?>&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>

															</div>

															<div class="hidden-md hidden-lg">
																<div class="inline pos-rel">
																	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																		<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

																		<li>
																			<a href="?editpangkat&id_riwayat_pangkat=<?php echo $a['id_riwayat_pangkat']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuspangkat&id_riwayat_pangkat=<?php echo $a['id_riwayat_pangkat']; ?>&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="tooltip-error" data-rel="tooltip" title="Delete"><span class="red">
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
  if(isset($_GET['hapuspangkat'])){
    $id_riwayat_pangkat=$_GET['id_riwayat_pangkat'];
    $id_pegawai=$_GET['id_pegawai'];
$query2 = "DELETE FROM riwayat_pangkat WHERE id_riwayat_pangkat='$id_riwayat_pangkat'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ ?>
<script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="?pangkat&id_pegawai=<?=$id_pegawai?>";
    //]]>
  </script>
<?php } else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='?data'>Kembali</a>";
}
  }
?>


<?php if(isset($_GET['editpangkat'])){ ?>
 <!-- Default box -->

 
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Pangkat</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
      
<?php
$id_riwayat_pangkat=$_GET['id_riwayat_pangkat'];
$det=mysqli_query($koneksi,"SELECT * FROM riwayat_pangkat where id_riwayat_pangkat='$id_riwayat_pangkat' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  
 
  <form action="" method="post" enctype="multipart/form-data">
  	<input type="hidden" id="form-field-1" placeholder="" name="id_pegawai" value="<?=$d['id_pegawai']?>" class="form-control col-xs-10 col-sm-6" />
    <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pangkat </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="pangkat" value="<?=$d['pangkat']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Golongan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="golongan" value="<?=$d['golongan']?>" class="form-control col-xs-10 col-sm-6" />
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
			<input type="date" id="form-field-1" placeholder="" name="tgl_sk" value="<?=$d['tgl_sk']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pejabat Penandatangan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="pejabat_penandatangan" value="<?=$d['pejabat_penandatangan']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>
  
   </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <a class="btn btn-info" href="?data"><span class="glyphicon glyphicon-arrow-left"></span>  Back</a>
          <input type="submit" name="acteditpangkat" class="btn btn-primary" value="Save">
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  
  <?php 
}
?>
<?php  if(isset($_POST['acteditpangkat'])){
$id_riwayat_pangkat=$_GET['id_riwayat_pangkat'];
$id_pegawai = $_POST['id_pegawai'];
$pangkat = $_POST['pangkat'];
$golongan = $_POST['golongan'];
$tmt = $_POST['tmt'];
$no_sk = $_POST['no_sk'];
$tgl_sk = $_POST['tgl_sk'];
$pejabat_penandatangan = $_POST['pejabat_penandatangan'];

    $update=mysqli_query($koneksi,"UPDATE
 `riwayat_pangkat`
SET
  `id_pegawai` = '$id_pegawai',
  `pangkat` = '$pangkat',
  `golongan` = '$golongan',
  `tmt` = '$tmt',
  `no_sk` = '$no_sk',
  `tgl_sk` = '$tgl_sk',
  `pejabat_penandatangan` = '$pejabat_penandatangan'
WHERE `id_riwayat_pangkat` = '$id_riwayat_pangkat';

 ") or die ("gagal update "); ?>
    <script type="text/javascript">
        //<![CDATA[
        alert ("Edit Success");
        window.location="?pangkat&id_pegawai=<?=$id_pegawai?>";
        //]]>
    </script>
    
     <?php   }
?>
<?php } ?>


<?php if(isset($_GET['pendidikan'])){ ?>
	<?php $id_pegawai = $_GET['id_pegawai']; ?>
<a href="?lengkapidata&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Semua Data</button></a>
<a href="?pangkat&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Pangkat</button></a>
<a href="?pendidikan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Pendidikan</button></a>
<a href="?jabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Jabatan</button></a>
<a href="?pelatihanjabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-warning">Riwayat Pelatihan Jabatan</button></a>
<a href="?pelatihanteknis&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-danger">Riwayat Pelatihan Teknis</button></a>
<a href="?penghargaan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Riwayat Penghargaan</button></a>
<a href="?kinerja&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Riwayat Kinerja</button></a>
<a href="?keluarga&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Riwayat Keluarga</button></a>

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
$id_pegawai = $_GET['id_pegawai'];
$pendidikan = $_POST['pendidikan'];
$nama_sekolah = $_POST['nama_sekolah'];
$tahun = $_POST['tahun'];

$query = "INSERT INTO `riwayat_pendidikan` (
  `id_riwayat_pendidikan`,
  `id_pegawai`,
  `pendidikan`,
  `nama_sekolah`,
  `tahun`
)
VALUES
  (
    '',
    '$id_pegawai',
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
    window.location="pegawai_pns.php?pendidikan&id_pegawai=<?php echo $id_pegawai?>";
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
		$id_pegawai=$_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_pendidikan where id_pegawai='$id_pegawai'";
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
				
				<a class="green" href="?editpendidikan&id_riwayat_pendidikan=<?php echo $a['id_riwayat_pendidikan']; ?>">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>

				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuspendidikan&id_riwayat_pendidikan=<?php echo $a['id_riwayat_pendidikan']; ?>&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>

			</div>

			<div class="hidden-md hidden-lg">
				<div class="inline pos-rel">
					<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
						<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
					</button>

					<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

						<li>
							<a href="?editpendidikan&id_riwayat_pendidikan=<?php echo $a['id_riwayat_pendidikan']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
								<span class="green">
									<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
								</span>
							</a>
						</li>

						<li><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuspendidikan&id_riwayat_pendidikan=<?php echo $a['id_riwayat_pendidikan']; ?>&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="tooltip-error" data-rel="tooltip" title="Delete"><span class="red">
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
    $id_riwayat_pendidikan=$_GET['id_riwayat_pendidikan'];
    $id_pegawai=$_GET['id_pegawai'];
$query2 = "DELETE FROM riwayat_pendidikan WHERE id_riwayat_pendidikan='$id_riwayat_pendidikan'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ ?>
<script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="?pendidikan&id_pegawai=<?=$id_pegawai?>";
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
$id_riwayat_pendidikan=$_GET['id_riwayat_pendidikan'];
$det=mysqli_query($koneksi,"SELECT * FROM riwayat_pendidikan where id_riwayat_pendidikan='$id_riwayat_pendidikan' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  
 
  <form action="" method="post" enctype="multipart/form-data">
  	<input type="hidden" id="form-field-1" placeholder="" name="id_pegawai" value="<?=$d['id_pegawai']?>" class="form-control col-xs-10 col-sm-6" />
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
$id_riwayat_pendidikan=$_GET['id_riwayat_pendidikan'];
$id_pegawai = $_POST['id_pegawai'];
$pendidikan = $_POST['pendidikan'];
$nama_sekolah = $_POST['nama_sekolah'];
$tahun = $_POST['tahun'];


    $update=mysqli_query($koneksi,"UPDATE
 `riwayat_pendidikan`
SET
  `id_pegawai` = '$id_pegawai',
  `pendidikan` = '$pendidikan',
  `nama_sekolah` = '$nama_sekolah',
  `tahun` = '$tahun'
WHERE `id_riwayat_pendidikan` = '$id_riwayat_pendidikan';

 ") or die ("gagal update "); ?>
    <script type="text/javascript">
        //<![CDATA[
        alert ("Edit Success");
        window.location="?pendidikan&id_pegawai=<?=$id_pegawai?>";
        //]]>
    </script>
    
     <?php   }
?>
<?php } ?>


<?php if(isset($_GET['jabatan'])){ ?>
	<?php $id_pegawai = $_GET['id_pegawai']; ?>
<a href="?lengakapidata&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Semua Data</button></a>	
<a href="?pangkat&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Pangkat</button></a>
<a href="?pendidikan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Pendidikan</button></a>
<a href="?jabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Jabatan</button></a>
<a href="?pelatihanjabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-warning">Riwayat Pelatihan Jabatan</button></a>
<a href="?pelatihanteknis&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-danger">Riwayat Pelatihan Teknis</button></a>
<a href="?penghargaan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Riwayat Penghargaan</button></a>
<a href="?kinerja&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Riwayat Kinerja</button></a>
<a href="?keluarga&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Riwayat Keluarga</button></a>

<br>
<br>

<form class="form-horizontal" role="form" method="post" action="">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jabatan/Eselon </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="jabatan_eselon" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> TMT Jabatan </label>

		<div class="col-sm-9">
			<input type="date" id="form-field-1" placeholder="" name="tmt_jabatan" class="form-control col-xs-10 col-sm-6" />
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
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Satuan Kerja </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="satuan_kerja" class="form-control col-xs-10 col-sm-6" />
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
$id_pegawai = $_GET['id_pegawai'];
$jabatan_eselon = $_POST['jabatan_eselon'];
$tmt_jabatan = $_POST['tmt_jabatan'];
$no_sk = $_POST['no_sk'];
$tgl_sk = $_POST['tgl_sk'];
$satuan_kerja = $_POST['satuan_kerja'];
$kelas_jabatan = $_POST['kelas_jabatan'];
$keterangan = $_POST['keterangan'];

$query = "INSERT INTO `riwayat_jabatan` (
  `id_riwayat_jabatan`,
  `id_pegawai`,
  `jabatan_eselon`,
  `tmt_jabatan`,
  `no_sk`,
  `tgl_sk`,
  `satuan_kerja`,
  `kelas_jabatan`,
  `keterangan`
)
VALUES
  (
    '',
    '$id_pegawai',
    '$jabatan_eselon',
    '$tmt_jabatan',
    '$no_sk',
    '$tgl_sk',
    '$satuan_kerja',
    '$kelas_jabatan',
    '$keterangan'
  );


";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :   ?> 
<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="pegawai_pns.php?jabatan&id_pegawai=<?php echo $id_pegawai?>";
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
				<th>Jabatan / Eselon</th>
				<th>TMT Jabatan</th>
				<th>No & tanggal SK</th>
				<th>Satuan Kerja</th>
				<th>Kelas / Jabatan</th>
				<th>Keterangan</th>
				<th>Opsi</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai = $_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_jabatan where id_pegawai='$id_pegawai'";
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
		<td><?php echo $a['jabatan_eselon'] ?></td>
		<td><?php echo $a['tmt_jabatan'] ?></td>
		<td><?php echo $a['no_sk'] ?><br> <?php echo $a['tgl_sk'] ?></td>
		<td><?php echo $a['satuan_kerja'] ?></td>
		<td><?php echo $a['kelas_jabatan'] ?></td>
		<td><?php echo $a['keterangan'] ?></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				
				<a class="green" href="?editjabatan&id_riwayat_jabatan=<?php echo $a['id_riwayat_jabatan']; ?>">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>

				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapusjabatan&id_riwayat_jabatan=<?php echo $a['id_riwayat_jabatan']; ?>&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>

			</div>

			<div class="hidden-md hidden-lg">
				<div class="inline pos-rel">
					<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
						<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
					</button>

					<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

						<li>
							<a href="?editjabatan&id_riwayat_jabatan=<?php echo $a['id_riwayat_jabatan']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
								<span class="green">
									<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
								</span>
							</a>
						</li>

						<li><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapusjabatan&id_riwayat_jabatan=<?php echo $a['id_riwayat_jabatan']; ?>&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="tooltip-error" data-rel="tooltip" title="Delete"><span class="red">
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
    $id_riwayat_jabatan=$_GET['id_riwayat_jabatan'];
    $id_pegawai=$_GET['id_pegawai'];
$query2 = "DELETE FROM riwayat_jabatan WHERE id_riwayat_jabatan='$id_riwayat_jabatan'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ ?>
<script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="?jabatan&id_pegawai=<?=$id_pegawai?>";
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
$id_riwayat_jabatan=$_GET['id_riwayat_jabatan'];
$det=mysqli_query($koneksi,"SELECT * FROM riwayat_jabatan where id_riwayat_jabatan='$id_riwayat_jabatan' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  
 
  <form action="" method="post" enctype="multipart/form-data">
  	<input type="hidden" id="form-field-1" placeholder="" name="id_pegawai" value="<?=$d['id_pegawai']?>" class="form-control col-xs-10 col-sm-6" />
   <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jabatan/Eselon </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="jabatan_eselon" value="<?=$d['jabatan_eselon']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> TMT Jabatan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="tmt_jabatan" value="<?=$d['tmt_jabatan']?>" class="form-control col-xs-10 col-sm-6" />
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
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Satuan Kerja </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="satuan_kerja" value="<?=$d['satuan_kerja']?>" class="form-control col-xs-10 col-sm-6" />
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
$id_riwayat_jabatan=$_GET['id_riwayat_jabatan'];
$id_pegawai = $_POST['id_pegawai'];
$jabatan_eselon = $_POST['jabatan_eselon'];
$tmt_jabatan = $_POST['tmt_jabatan'];
$no_sk = $_POST['no_sk'];
$tgl_sk = $_POST['tgl_sk'];
$satuan_kerja = $_POST['satuan_kerja'];
$kelas_jabatan = $_POST['kelas_jabatan'];
$keterangan = $_POST['keterangan'];

    $update=mysqli_query($koneksi,"UPDATE
  `riwayat_jabatan`
SET
  `id_pegawai` = '$id_pegawai',
  `jabatan_eselon` = '$jabatan_eselon',
  `tmt_jabatan` = '$tmt_jabatan',
  `no_sk` = '$no_sk',
  `tgl_sk` = '$tgl_sk',
  `satuan_kerja` = '$satuan_kerja',
  `kelas_jabatan` = '$kelas_jabatan',
  `keterangan` = '$keterangan'
WHERE `id_riwayat_jabatan` = '$id_riwayat_jabatan';


 ") or die ("gagal update "); ?>
    <script type="text/javascript">
        //<![CDATA[
        alert ("Edit Success");
        window.location="?jabatan&id_pegawai=<?=$id_pegawai?>";
        //]]>
    </script>
    
     <?php   }
?>
<?php } ?>


<?php if(isset($_GET['pelatihanjabatan'])){ ?>
	<?php $id_pegawai = $_GET['id_pegawai']; ?>
<a href="?lengkapidata&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Semua Data</button></a>
<a href="?pangkat&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Pangkat</button></a>
<a href="?pendidikan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Pendidikan</button></a>
<a href="?jabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Jabatan</button></a>
<a href="?pelatihanjabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-warning">Riwayat Pelatihan Jabatan</button></a>
<a href="?pelatihanteknis&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-danger">Riwayat Pelatihan Teknis</button></a>
<a href="?penghargaan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Riwayat Penghargaan</button></a>
<a href="?kinerja&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Riwayat Kinerja</button></a>
<a href="?keluarga&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Riwayat Keluarga</button></a>

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
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Pelatihan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="tahun_pelatihan" class="form-control col-xs-10 col-sm-6" />
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
$id_pegawai = $_GET['id_pegawai'];
$nama_pelatihan = $_POST['nama_pelatihan'];
$lembaga_pelaksana = $_POST['lembaga_pelaksana'];
$tahun_pelatihan = $_POST['tahun_pelatihan'];

$query = "INSERT INTO `riwayat_pelatihan_jabatan` (
  `id_riwayat_pelatihan_jabatan`,
  `id_pegawai`,
  `nama_pelatihan`,
  `lembaga_pelaksana`,
  `tahun_pelatihan`
)
VALUES
  (
    '',
    '$id_pegawai',
    '$nama_pelatihan',
    '$lembaga_pelaksana',
    '$tahun_pelatihan'
  );


";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :   ?> 
<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="pegawai_pns.php?pelatihanjabatan&id_pegawai=<?php echo $id_pegawai?>";
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
				<th>Tahun Pelatihan</th>
				<th>Opsi</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai = $_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_pelatihan_jabatan where id_pegawai='$id_pegawai'";
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
		<td><?php echo $a['tahun_pelatihan'] ?></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				
				<a class="green" href="?editpelatihanjabatan&id_riwayat_pelatihan_jabatan=<?php echo $a['id_riwayat_pelatihan_jabatan']; ?>">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>

				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuspelatihanjabatan&id_riwayat_pelatihan_jabatan=<?php echo $a['id_riwayat_pelatihan_jabatan']; ?>&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>

			</div>

			<div class="hidden-md hidden-lg">
				<div class="inline pos-rel">
					<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
						<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
					</button>

					<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

						<li>
							<a href="?editpelatihanjabatan&id_riwayat_pelatihan_jabatan=<?php echo $a['id_riwayat_pelatihan_jabatan']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
								<span class="green">
									<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
								</span>
							</a>
						</li>

						<li><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuspelatihanjabatan&id_riwayat_pelatihan_jabatan=<?php echo $a['id_riwayat_pelatihan_jabatan']; ?>&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="tooltip-error" data-rel="tooltip" title="Delete"><span class="red">
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
    $id_riwayat_pelatihan_jabatan=$_GET['id_riwayat_pelatihan_jabatan'];
    $id_pegawai=$_GET['id_pegawai'];
$query2 = "DELETE FROM riwayat_pelatihan_jabatan WHERE id_riwayat_pelatihan_jabatan='$id_riwayat_pelatihan_jabatan'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ ?>
<script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="?pelatihanjabatan&id_pegawai=<?=$id_pegawai?>";
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
$id_riwayat_pelatihan_jabatan=$_GET['id_riwayat_pelatihan_jabatan'];
$det=mysqli_query($koneksi,"SELECT * FROM riwayat_pelatihan_jabatan where id_riwayat_pelatihan_jabatan='$id_riwayat_pelatihan_jabatan' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  
 
  <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
  	<input type="hidden" id="form-field-1" placeholder="" name="id_pegawai" value="<?=$d['id_pegawai']?>" class="form-control col-xs-10 col-sm-6" />
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
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Pelatihan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="tahun_pelatihan" value="<?=$d['tahun_pelatihan']?>" class="form-control col-xs-10 col-sm-6" />
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
$id_riwayat_pelatihan_jabatan=$_GET['id_riwayat_pelatihan_jabatan'];
$id_pegawai = $_POST['id_pegawai'];
$nama_pelatihan = $_POST['nama_pelatihan'];
$lembaga_pelaksana = $_POST['lembaga_pelaksana'];
$tahun_pelatihan = $_POST['tahun_pelatihan'];

    $update=mysqli_query($koneksi,"UPDATE
`riwayat_pelatihan_jabatan`
SET
  `id_pegawai` = '$id_pegawai',
  `nama_pelatihan` = '$nama_pelatihan',
  `lembaga_pelaksana` = '$lembaga_pelaksana',
  `tahun_pelatihan` = '$tahun_pelatihan'
WHERE `id_riwayat_pelatihan_jabatan` = '$id_riwayat_pelatihan_jabatan';


 ") or die ("gagal update "); ?>
    <script type="text/javascript">
        //<![CDATA[
        alert ("Edit Success");
        window.location="?pelatihanjabatan&id_pegawai=<?=$id_pegawai?>";
        //]]>
    </script>
    
     <?php   }
?>
<?php } ?>



<?php if(isset($_GET['pelatihanteknis'])){ ?>
	<?php $id_pegawai = $_GET['id_pegawai']; ?>
<a href="?lengkapidata&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Semua Data</button></a>
<a href="?pangkat&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Pangkat</button></a>
<a href="?pendidikan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Pendidikan</button></a>
<a href="?jabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Jabatan</button></a>
<a href="?pelatihanjabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-warning">Riwayat Pelatihan Jabatan</button></a>
<a href="?pelatihanteknis&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-danger">Riwayat Pelatihan Teknis</button></a>
<a href="?penghargaan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Riwayat Penghargaan</button></a>
<a href="?kinerja&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Riwayat Kinerja</button></a>
<a href="?keluarga&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Riwayat Keluarga</button></a>

<br>
<br>

<h4>Data Riwayat Pelatihan Teknis</h4>

<form class="form-horizontal" role="form" method="post" action="">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Pelatihan</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="pelatihan_teknis" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Lembaga Pelaksana </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="lembaga_teknis" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Negara </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="negara" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Pelatihan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="tahun_teknis" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	
	<div class="space-4"></div>


	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="submit" name="actpelatihanteknis">
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
if(isset($_POST['actpelatihanteknis'])){
$id_pegawai = $_GET['id_pegawai'];
$pelatihan_teknis = $_POST['pelatihan_teknis'];
$lembaga_teknis = $_POST['lembaga_teknis'];
$negara = $_POST['negara'];
$tahun_teknis = $_POST['tahun_teknis'];

$query = "INSERT into `riwayat_pelatihan_teknis` (
  `id_riwayat_pelatihan_teknis`,
  `id_pegawai`,
  `pelatihan_teknis`,
  `lembaga_teknis`,
  `negara`,
  `tahun_teknis`
)
values
  (
    '',
    '$id_pegawai',
    '$pelatihan_teknis',
    '$lembaga_teknis',
    '$negara',
    '$tahun_teknis'
  );


";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :   ?> 
<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="pegawai_pns.php?pelatihanteknis&id_pegawai=<?php echo $id_pegawai?>";
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
				<th>Negara</th>
				<th>Tahun Pelatihan</th>
				<th>Opsi</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai=$_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_pelatihan_teknis where id_pegawai='$id_pegawai'";
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
		<td><?php echo $a['pelatihan_teknis'] ?></td>
		<td><?php echo $a['lembaga_teknis'] ?></td>
		<td><?php echo $a['negara'] ?></td>
		<td><?php echo $a['tahun_teknis'] ?></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				
				<a class="green" href="?editpelatihanteknis&id_riwayat_pelatihan_teknis=<?php echo $a['id_riwayat_pelatihan_teknis']; ?>">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>

				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuspelatihanteknis&id_riwayat_pelatihan_teknis=<?php echo $a['id_riwayat_pelatihan_teknis']; ?>&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>

			</div>

			<div class="hidden-md hidden-lg">
				<div class="inline pos-rel">
					<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
						<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
					</button>

					<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

						<li>
							<a href="?editpelatihanteknis&id_riwayat_pelatihan_teknis=<?php echo $a['id_riwayat_pelatihan_teknis']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
								<span class="green">
									<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
								</span>
							</a>
						</li>

						<li><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuspelatihanteknis&id_riwayat_pelatihan_teknis=<?php echo $a['id_riwayat_pelatihan_teknis']; ?>&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="tooltip-error" data-rel="tooltip" title="Delete"><span class="red">
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
  if(isset($_GET['hapuspelatihanteknis'])){
    $id_riwayat_pelatihan_teknis=$_GET['id_riwayat_pelatihan_teknis'];
    $id_pegawai=$_GET['id_pegawai'];
$query2 = "DELETE FROM riwayat_pelatihan_teknis WHERE id_riwayat_pelatihan_teknis='$id_riwayat_pelatihan_teknis'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ ?>
<script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="?pelatihanteknis&id_pegawai=<?=$id_pegawai?>";
    //]]>
  </script>
<?php } else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='?data'>Kembali</a>";
}
  }
?>


<?php if(isset($_GET['editpelatihanteknis'])){ ?>
 <!-- Default box -->

 
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Pelatihan Teknis</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
      
<?php
$id_riwayat_pelatihan_teknis=$_GET['id_riwayat_pelatihan_teknis'];
$det=mysqli_query($koneksi,"SELECT * FROM riwayat_pelatihan_teknis where id_riwayat_pelatihan_teknis='$id_riwayat_pelatihan_teknis' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  
 
  <form action="" method="post" enctype="multipart/form-data">
  	<input type="hidden" id="form-field-1" placeholder="" name="id_pegawai" value="<?=$d['id_pegawai']?>" class="form-control col-xs-10 col-sm-6" />
  <div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Pelatihan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" value="<?=$d['pelatihan_teknis']?>" name="pelatihan_teknis" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Lembaga Pelaksana </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" value="<?=$d['lembaga_teknis']?>" name="lembaga_teknis" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Negara </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" value="<?=$d['negara']?>" name="negara" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Pelatihan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="tahun_teknis" value="<?=$d['tahun_teknis']?>" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>
   </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <a class="btn btn-info" href="?data"><span class="glyphicon glyphicon-arrow-left"></span>  Back</a>
          <input type="submit" name="acteditpelatihanteknis" class="btn btn-primary" value="Save">
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  
  <?php 
}
?>
<?php  if(isset($_POST['acteditpelatihanteknis'])){
$id_riwayat_pelatihan_teknis=$_GET['id_riwayat_pelatihan_teknis'];
$id_pegawai = $_POST['id_pegawai'];
$pelatihan_teknis = $_POST['pelatihan_teknis'];
$lembaga_teknis = $_POST['lembaga_teknis'];
$negara = $_POST['negara'];
$tahun_teknis = $_POST['tahun_teknis'];

    $update=mysqli_query($koneksi,"UPDATE
`riwayat_pelatihan_teknis`
SET
  `id_pegawai` = '$id_pegawai',
  `pelatihan_teknis` = '$pelatihan_teknis',
  `lembaga_teknis` = '$lembaga_teknis',
  `negara` = '$negara',
  `tahun_teknis` = '$tahun_teknis'
WHERE `id_riwayat_pelatihan_teknis` = '$id_riwayat_pelatihan_teknis';


 ") or die ("gagal update "); ?>
    <script type="text/javascript">
        //<![CDATA[
        alert ("Edit Success");
        window.location="?pelatihanteknis&id_pegawai=<?=$id_pegawai?>";
        //]]>
    </script>
    
     <?php   }
?>
<?php } ?>


<?php if(isset($_GET['penghargaan'])){ ?>
	<?php $id_pegawai = $_GET['id_pegawai']; ?>
<a href="?lengkapidata&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Lengkapi Data</button></a>
<a href="?pangkat&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Pangkat</button></a>
<a href="?pendidikan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Pendidikan</button></a>
<a href="?jabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Jabatan</button></a>
<a href="?pelatihanjabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-warning">Riwayat Pelatihan Jabatan</button></a>
<a href="?pelatihanteknis&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-danger">Riwayat Pelatihan Teknis</button></a>
<a href="?penghargaan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Riwayat Penghargaan</button></a>
<a href="?kinerja&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Riwayat Kinerja</button></a>
<a href="?keluarga&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Riwayat Keluarga</button></a>

<br>
<br>

<h3>Data Riwayat Penghargaan</h3>
<form class="form-horizontal" role="form" method="post" action="">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Penghargaan</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="nama_penghargaan" class="form-control col-xs-10 col-sm-6" />
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
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Instansi Pemberi </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="instansi_pemberi" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	
	<div class="space-4"></div>


	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="submit" name="actpenghargaan">
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
if(isset($_POST['actpenghargaan'])){
$id_pegawai = $_GET['id_pegawai'];
$nama_penghargaan = $_POST['nama_penghargaan'];
$no_sk = $_POST['no_sk'];
$tgl_sk = $_POST['tgl_sk'];
$instansi_pemberi = $_POST['instansi_pemberi'];

$query = "INSERT INTO `riwayat_penghargaan` (
  `id_riwayat_penghargaan`,
  `id_pegawai`,
  `nama_penghargaan`,
  `no_sk`,
  `tgl_sk`,
  `instansi_pemberi`
)
VALUES
  (
    '',
    '$id_pegawai',
    '$nama_penghargaan',
    '$no_sk',
    '$tgl_sk',
    '$instansi_pemberi'
  );


";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :   ?> 
<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="pegawai_pns.php?penghargaan&id_pegawai=<?php echo $id_pegawai?>";
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
				<th>Nama Penghargaan</th>
				<th>No & Tanggal SK</th>
				<th>Instansi Pemberi</th>
				<th>Opsi</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai = $_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_penghargaan where id_pegawai='$id_pegawai'";
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
		<td><?php echo $a['nama_penghargaan'] ?></td>
		<td><?php echo $a['no_sk'] ?><br><?php echo $a['tgl_sk'] ?></td>
		<td><?php echo $a['instansi_pemberi'] ?></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				
				<a class="green" href="?editpenghargaan&id_riwayat_penghargaan=<?php echo $a['id_riwayat_penghargaan']; ?>">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>

				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuspenghargaan&id_riwayat_penghargaan=<?php echo $a['id_riwayat_penghargaan']; ?>&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>

			</div>

			<div class="hidden-md hidden-lg">
				<div class="inline pos-rel">
					<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
						<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
					</button>

					<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

						<li>
							<a href="?editpenghargaan&id_riwayat_penghargaan=<?php echo $a['id_riwayat_penghargaan']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
								<span class="green">
									<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
								</span>
							</a>
						</li>

						<li><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuspenghargaan&id_riwayat_penghargaan=<?php echo $a['id_riwayat_penghargaan']; ?>&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="tooltip-error" data-rel="tooltip" title="Delete"><span class="red">
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
  if(isset($_GET['hapuspenghargaan'])){
    $id_riwayat_penghargaan=$_GET['id_riwayat_penghargaan'];
    $id_pegawai=$_GET['id_pegawai'];
$query2 = "DELETE FROM riwayat_penghargaan WHERE id_riwayat_penghargaan='$id_riwayat_penghargaan'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ ?>
<script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="?penghargaan&id_pegawai=<?=$id_pegawai?>";
    //]]>
  </script>
<?php } else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='?data'>Kembali</a>";
}
  }
?>


<?php if(isset($_GET['editpenghargaan'])){ ?>
 <!-- Default box -->

 
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Penghargaan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
      
<?php
$id_riwayat_penghargaan=$_GET['id_riwayat_penghargaan'];
$det=mysqli_query($koneksi,"SELECT * FROM riwayat_penghargaan where id_riwayat_penghargaan='$id_riwayat_penghargaan' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  
 
  <form action="" method="post" enctype="multipart/form-data">
  	<input type="hidden" id="form-field-1" placeholder="" name="id_pegawai" value="<?=$d['id_pegawai']?>" class="form-control col-xs-10 col-sm-6" />
  <div class="form-group">
		<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Penghargaan</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" value="<?=$d['nama_penghargaan']?>" name="nama_penghargaan" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No SK </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" value="<?=$d['no_sk']?>" name="no_sk" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal SK </label>

		<div class="col-sm-9">
			<input type="date" id="form-field-1" placeholder="" value="<?=$d['tgl_sk']?>" name="tgl_sk" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Instansi Pemberi </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" value="<?=$d['instansi_pemberi']?>" name="instansi_pemberi" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>
   </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <a class="btn btn-info" href="?data"><span class="glyphicon glyphicon-arrow-left"></span>  Back</a>
          <input type="submit" name="acteditpenghargaan" class="btn btn-primary" value="Save">
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  
  <?php 
}
?>
<?php  if(isset($_POST['acteditpenghargaan'])){
$id_riwayat_penghargaan=$_GET['id_riwayat_penghargaan'];
$id_pegawai = $_POST['id_pegawai'];
$nama_penghargaan = $_POST['nama_penghargaan'];
$no_sk = $_POST['no_sk'];
$tgl_sk = $_POST['tgl_sk'];
$instansi_pemberi = $_POST['instansi_pemberi'];

    $update=mysqli_query($koneksi,"UPDATE
 `riwayat_penghargaan`
set
  `id_pegawai` = '$id_pegawai',
  `nama_penghargaan` = '$nama_penghargaan',
  `no_sk` = '$no_sk',
  `tgl_sk` = '$tgl_sk',
  `instansi_pemberi` = '$instansi_pemberi'
where `id_riwayat_penghargaan` = '$id_riwayat_penghargaan';


 ") or die ("gagal update "); ?>
    <script type="text/javascript">
        //<![CDATA[
        alert ("Edit Success");
        window.location="?penghargaan&id_pegawai=<?=$id_pegawai?>";
        //]]>
    </script>
    
     <?php   }
?>
<?php } ?>


<?php if(isset($_GET['kinerja'])){ ?>
	<?php $id_pegawai = $_GET['id_pegawai']; ?>
<a href="?lengkapidata&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Semua Data</button></a>
<a href="?pangkat&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Pangkat</button></a>
<a href="?pendidikan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Pendidikan</button></a>
<a href="?jabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Jabatan</button></a>
<a href="?pelatihanjabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-warning">Riwayat Pelatihan Jabatan</button></a>
<a href="?pelatihanteknis&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-danger">Riwayat Pelatihan Teknis</button></a>
<a href="?penghargaan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Riwayat Penghargaan</button></a>
<a href="?kinerja&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Riwayat Kinerja</button></a>
<a href="?keluarga&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Riwayat Keluarga</button></a>

<br>
<br>

<h3>Data Riwayat Kinerja</h3>
<form class="form-horizontal" role="form" method="post" action="">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Jabatan</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="nama_jabatan" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Penilaian </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="tahun_penilaian" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai PPKPNS </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="nilai_ppkpns" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Instansi </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="instansi" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Organisasi </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="organisasi" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Satuan Kerja </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" name="satuan_kerja" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	
	<div class="space-4"></div>


	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="submit" name="actkinerja">
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
if(isset($_POST['actkinerja'])){
$id_pegawai = $_GET['id_pegawai'];
$nama_jabatan = $_POST['nama_jabatan'];
$tahun_penilaian = $_POST['tahun_penilaian'];
$nilai_ppkpns = $_POST['nilai_ppkpns'];
$instansi = $_POST['instansi'];
$organisasi = $_POST['organisasi'];
$satuan_kerja = $_POST['satuan_kerja'];

$query = "INSERT INTO `riwayat_kinerja` (
  `id_riwayat_kinerja`,
  `id_pegawai`,
  `nama_jabatan`,
  `tahun_penilaian`,
  `nilai_ppkpns`,
  `instansi`,
  `organisasi`,
  `satuan_kerja`
)
VALUES
  (
    '',
    '$id_pegawai',
    '$nama_jabatan',
    '$tahun_penilaian',
    '$nilai_ppkpns',
    '$instansi',
    '$organisasi',
    '$satuan_kerja'
  );


";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :   ?> 
<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="pegawai_pns.php?kinerja&id_pegawai=<?php echo $id_pegawai?>";
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
				<th>Nama Jabatan</th>
				<th>Tahun Penilaian</th>
				<th>Nilai PPKPNS</th>
				<th>Instansi</th>
				<th>Organisasi</th>
				<th>Satuan Kerja</th>
				<th>Opsi</th>
			</tr>
		</thead>

		<tbody>
			<?php
		$id_pegawai =$_GET['id_pegawai'];
        $sql = "SELECT * FROM riwayat_kinerja where id_pegawai='$id_pegawai'";
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
		<td><?php echo $a['nama_jabatan'] ?></td>
		<td><?php echo $a['tahun_penilaian'] ?></td>
		<td><?php echo $a['nilai_ppkpns'] ?></td>
		<td><?php echo $a['instansi'] ?></td>
		<td><?php echo $a['organisasi'] ?></td>
		<td><?php echo $a['satuan_kerja'] ?></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				
				<a class="green" href="?editkinerja&id_riwayat_kinerja=<?php echo $a['id_riwayat_kinerja']; ?>">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>

				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuskinerja&id_riwayat_kinerja=<?php echo $a['id_riwayat_kinerja']; ?>&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>

			</div>

			<div class="hidden-md hidden-lg">
				<div class="inline pos-rel">
					<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
						<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
					</button>

					<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

						<li>
							<a href="?editkinerja&id_riwayat_kinerja=<?php echo $a['id_riwayat_kinerja']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
								<span class="green">
									<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
								</span>
							</a>
						</li>

						<li><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuskinerja&id_riwayat_kinerja=<?php echo $a['id_riwayat_kinerja']; ?>&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="tooltip-error" data-rel="tooltip" title="Delete"><span class="red">
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
  if(isset($_GET['hapuskinerja'])){
    $id_riwayat_kinerja=$_GET['id_riwayat_kinerja'];
    $id_pegawai=$_GET['id_pegawai'];
$query2 = "DELETE FROM riwayat_kinerja WHERE id_riwayat_kinerja='$id_riwayat_kinerja'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ ?>
<script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="?kinerja&id_pegawai=<?=$id_pegawai?>";
    //]]>
  </script>
<?php } else {  // Jika Gagal, Lakukan :  
  echo "Data gagal dihapus. <a href='?data'>Kembali</a>";
}
  }
?>


<?php if(isset($_GET['editkinerja'])){ ?>
 <!-- Default box -->

 
 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Riwayat Kinerja</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
      
<?php
$id_riwayat_kinerja=$_GET['id_riwayat_kinerja'];
$det=mysqli_query($koneksi,"SELECT * FROM riwayat_kinerja where id_riwayat_kinerja='$id_riwayat_kinerja' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  
 
  <form class="form-horizontal" role="form" method="post" action="">
  	<input type="hidden" id="form-field-1" placeholder="" value="<?=$d['id_pegawai']?>" name="id_pegawai" class="form-control col-xs-10 col-sm-6" />
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Jabatan</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" value="<?=$d['nama_jabatan']?>" name="nama_jabatan" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tahun Penilaian </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" value="<?=$d['tahun_penilaian']?>" name="tahun_penilaian" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai PPKPNS </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" value="<?=$d['nilai_ppkpns']?>" name="nilai_ppkpns" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Instansi </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" value="<?=$d['instansi']?>" name="instansi" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Organisasi </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" placeholder="" value="<?=$d['organisasi']?>" name="organisasi" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Satuan Kerja </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1" value="<?=$d['satuan_kerja']?>" placeholder="" name="satuan_kerja" class="form-control col-xs-10 col-sm-6" />
		</div>
	</div>

	
	<div class="space-4"></div>


	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="submit" name="acteditkinerja">
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
if(isset($_POST['acteditkinerja'])){
$id_pegawai = $_POST['id_pegawai'];
$id_riwayat_kinerja = $_GET['id_riwayat_kinerja'];
$nama_jabatan = $_POST['nama_jabatan'];
$tahun_penilaian = $_POST['tahun_penilaian'];
$nilai_ppkpns = $_POST['nilai_ppkpns'];
$instansi = $_POST['instansi'];
$organisasi = $_POST['organisasi'];
$satuan_kerja = $_POST['satuan_kerja'];

$query = "UPDATE
 `riwayat_kinerja`
SET
  `id_pegawai` = '$id_pegawai',
  `nama_jabatan` = '$nama_jabatan',
  `tahun_penilaian` = '$tahun_penilaian',
  `nilai_ppkpns` = '$nilai_ppkpns',
  `instansi` = '$instansi',
  `organisasi` = '$organisasi',
  `satuan_kerja` = '$satuan_kerja'
WHERE `id_riwayat_kinerja` = '$id_riwayat_kinerja';

";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :   ?> 
<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="pegawai_pns.php?kinerja&id_pegawai=<?php echo $id_pegawai?>";
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


<?php if(isset($_GET['keluarga'])){ ?>
	<?php $id_pegawai = $_GET['id_pegawai']; ?>
<a href="?lengkapidata&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Semua Data</button></a>
<a href="?pangkat&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Pangkat</button></a>
<a href="?pendidikan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Pendidikan</button></a>
<a href="?jabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Jabatan</button></a>
<a href="?pelatihanjabatan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-warning">Riwayat Pelatihan Jabatan</button></a>
<a href="?pelatihanteknis&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-danger">Riwayat Pelatihan Teknis</button></a>
<a href="?penghargaan&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-info">Riwayat Penghargaan</button></a>
<a href="?kinerja&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-primary">Riwayat Kinerja</button></a>
<a href="?keluarga&id_pegawai=<?=$id_pegawai?>"><button class="btn btn-success">Riwayat Keluarga</button></a>

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
$id_pegawai = $_GET['id_pegawai'];
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$status = $_POST['status'];

$query = "INSERT INTO `riwayat_keluarga` (
  `id_riwayat_keluarga`,
  `id_pegawai`,
  `nama`,
  `tgl_lahir`,
  `jk`,
  `status`
)
VALUES
  (
    '',
    '$id_pegawai',
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
    window.location="pegawai_pns.php?keluarga&id_pegawai=<?php echo $id_pegawai?>";
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
        $sql = "SELECT * FROM riwayat_keluarga where id_pegawai='$id_pegawai'";
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
				
				<a class="green" href="?editkeluarga&id_riwayat_keluarga=<?php echo $a['id_riwayat_keluarga']; ?>">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>

				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuskeluarga&id_riwayat_keluarga=<?php echo $a['id_riwayat_keluarga']; ?>&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>

			</div>

			<div class="hidden-md hidden-lg">
				<div class="inline pos-rel">
					<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
						<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
					</button>

					<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

						<li>
							<a href="?editkeluarga&id_riwayat_keluarga=<?php echo $a['id_riwayat_keluarga']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
								<span class="green">
									<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
								</span>
							</a>
						</li>

						<li><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='?hapuskeluarga&id_riwayat_keluarga=<?php echo $a['id_riwayat_keluarga']; ?>&id_pegawai=<?php echo $a['id_pegawai']; ?>' }" class="tooltip-error" data-rel="tooltip" title="Delete"><span class="red">
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
    $id_riwayat_keluarga=$_GET['id_riwayat_keluarga'];
    $id_pegawai=$_GET['id_pegawai'];
$query2 = "DELETE FROM riwayat_keluarga WHERE id_riwayat_keluarga='$id_riwayat_keluarga'";
$sql2 = mysqli_query($koneksi,$query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ ?>
<script type="text/javascript">
    //<![CDATA[
    alert ("Berhasil Hapus");
    window.location="?keluarga&id_pegawai=<?=$id_pegawai?>";
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
$id_riwayat_keluarga=$_GET['id_riwayat_keluarga'];
$det=mysqli_query($koneksi,"SELECT * FROM riwayat_keluarga where id_riwayat_keluarga='$id_riwayat_keluarga' ")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>  
 
  <form class="form-horizontal" role="form" method="post" action="">
  	<input type="hidden" id="form-field-1" placeholder="" value="<?=$d['id_pegawai']?>" name="id_pegawai" class="form-control col-xs-10 col-sm-6" />
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
$id_pegawai = $_POST['id_pegawai'];
$id_riwayat_keluarga = $_GET['id_riwayat_keluarga'];
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$status = $_POST['status'];

$query = "UPDATE
 `riwayat_keluarga`
set
  `id_pegawai` = '$id_pegawai',
  `nama` = '$nama',
  `tgl_lahir` = '$tgl_lahir',
  `jk` = '$jk',
  `status` = '$status'
where `id_riwayat_keluarga` = '$id_riwayat_keluarga';


";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :   ?> 
<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="pegawai_pns.php?keluarga&id_pegawai=<?php echo $id_pegawai?>";
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







<!-- tambah -->
<div class="modal fade" id="modal-default">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
               <form action="" method="post" class="niceform" enctype="multipart/form-data">
            <form class="form-horizontal" role="form" method="post" action="">

	<div class="form-group">
		<label><font color="">Data Identitas</font></label>
	</div>

	<div class="form-group">
		<label class="" for="form-field-1"> NIP </label>

		<div class="col-sm-9">
			<input type="text" placeholder="" name="nip" class="form-control" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama*</label>

		<div class="col-sm-9">
			<input type="text"  placeholder="" name="nama" class="form-control" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Jabatan </label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="jabatan" class="form-control" />
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Pendidikan</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="pendidikan" class="form-control" />
		</div>
	</div>

	
	
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Keterangan</label>

		<div class="col-sm-9">
			<input type="text" id="form-field-1-1" placeholder="" name="keterangan" class="form-control" />
		</div>
	</div>



	<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Id User</label>

					<div class="col-sm-9">
						<select name="status_kpe" class="form-control">
			                <option value="Belum KPE">Belum KPE</option>
			                <option value="Sudah Foto">Sudah Foto</option>
			                <option value="Cetak KPE">Cetak KPE</option>
			                <option value="Terima KPE">Terima KPE</option>
		                </select>
					</div>
	</div>

             

<?php
if(isset($_POST['submit'])){
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$pendidikan = $_POST['pendidikan'];
$keterangan = $_POST['keterangan'];
$id_user = $_POST['id_user'];


$query = "INSERT INTO `pegawai` 
	(`id_pegawai`, 
	`nip`, 
	`nama`, 
	`jabatan`, 
	`pendidikan`, 
	`keterangan`, 
	`id_user`
	)
	VALUES
	('', 
	'$nip', 
	'$nama', 
	'$jabatan', 
	'$pendidikan', 
	'$keterangan', 
	'$id_user'
	);

";

$sql = mysqli_query($koneksi,$query); // Eksekusi/ Jalankan query dari variabel $query  
if($sql){ // Cek jika proses simpan ke database sukses atau tidak    // Jika Sukses, Lakukan :    
echo '<script type="text/javascript">
    //<![CDATA[
    alert ("Data Berhasil Dinput");
    window.location="pegawai_pns.php?data";
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