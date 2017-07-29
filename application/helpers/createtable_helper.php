<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');


function createTableInput($namatabel, $angkatanId, $minggu, $tahun){
	$CI =&get_instance();
	$CI->load->database();
	//======== digunakan untuk membuat struktur table ===============
	$sql = "SELECT * FROM  `users` WHERE id_angkatan=$angkatanId ORDER BY id_users" ; //edit 2
	$table=array();
	$query=$CI->db->query($sql)->result_array();
	$users= $query;
	foreach ($query as $key) {
			$table[$key['id_users']] ['nama']=$key['nama'];
			$index= "id_users"; //edit 1
			$table[$key['id_users']][$index] = $key['id_users'];
			$index= "penilaianperusahaan1";
			$table[$key['id_users']][$index]="" ;
			$index= "penilaianperusahaan2";
			$table[$key['id_users']][$index]="" ;
			$index= "penilaianjk1";
			$table[$key['id_users']][$index]="" ;
			$index= "penilaianjk2";
			$table[$key['id_users']][$index]="" ;
			$index= "penilaianpsdm1";
			$table[$key['id_users']][$index]="" ;
			$index= "penilaianpsdm2";
			$table[$key['id_users']][$index]="" ;
			$index= "penilaianredaksi1";
			$table[$key['id_users']][$index]="" ;
			$index= "penilaianredaksi2";
			$table[$key['id_users']][$index]="" ;
	}
	//================ digunakan untuk mengisi tabel ===================
	$sql = "SELECT *
			FROM " . $namatabel .
			" RIGHT JOIN users ON " . $namatabel .".id_users = users.id_users
			WHERE " . $namatabel .".id_angkatan = '" . $angkatanId ."'
			AND year( tgl ) = '" . $tahun ."'
			AND minggu = '" .  $minggu ."'";
	$query=$CI->db->query($sql)->result_array();
	foreach($query as $key){
			$index= "penilaianperusahaan1";
			$table[$key['id_users']][ $index]=$key['penilaianperusahaan1'] ;
			$index= "penilaianperusahaan2";
			$table[$key['id_users']][ $index]= $key['penilaianperusahaan2'] ;
			$index= "penilaianjk1";
			$table[$key['id_users']][ $index] = $key['penilaianjk1'] ;
			$index= "penilaianjk2";
			$table[$key['id_users']][ $index]= $key['penilaianjk2'] ;
			$index= "penilaianpsdm1";
			$table[$key['id_users']][ $index]= $key['penilaianpsdm1'] ;
			$index= "penilaianpsdm2";
			$table[$key['id_users']][ $index]=$key['penilaianpsdm2'] ;
			$index= "penilaianredaksi1";
			$table[$key['id_users']][ $index]=$key['penilaianredaksi1'] ;
			$index= "penilaianredaksi2";
			$table[$key['id_users']][ $index]= $key['penilaianredaksi2'] ;
	}
	return $table;
}


function convertXlsRekapBulan($title,$tabel,$angkatan){
	//$title = array berisi index 'tabel->masuk/keluar';'angkatan dari data' ; 'tahun dari data';'angkatanId-> angkatan default'
	//$tabel = array berisi index 'tabel -> isi tabel' ; 'angkatan -> daftar angkatan'
	//$tandatangan = array berisi index 'tempat', 'jabatan','nama','idNama'
	 header("Content-type: application/vnd-ms-excel");//x-msdownload");
 
	 // Mendefinisikan nama file ekspor "hasil-export.xls"
	 $namafile = "rekap-data-".(isset($title['tabel'])?$title['tabel']:' ').' tahun '.(isset($title['tahun'])?$title['tahun']:' ').".xls";
	 header("Content-Disposition: attachment; filename= $namafile");  
	 
	 // header("Expires: 0");
	 // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	 header('Content-Transfer-Encoding: binary');
	 header('Expires: 0');
	 header('Pragma: no-cache');

	 $angkatan = $tabel['angkatan'];
	 $tabelrekap = $tabel['tabel'];
?>		
<div class="panel panel-default" style="padding:10px">
         <div class="panel-body">
          	<div class="col-md-12 column">
			<h3 class=""  align="center">
				Laporan Penilaian
            <br> Bulan
            <?php 
            	switch($title['bulan'])
				{
				case '1': echo 'Januari';
				break;
				case '2': echo 'Februari';
				break;
				case '3': echo 'Maret';
				break;
				case '4': echo 'April';
				break;
				case '5': echo 'Mei';
				break;
				case '6': echo 'Juni';
				break;
				case '7': echo 'Juli';
				break;
				case '8': echo 'Agustus';
				break;
				case '9': echo 'September';
				break;
				case '10': echo 'Oktober';
				break;
				case '11': echo 'November';
				break;
				case '12': echo 'Desember';
				break;
				}
            ?>
			</h3>
			</div>
		
	<br>
	<br>
	<div class="row clearfix">
		<div class="col-md-12 column">
			<table border = "1" class="table table table-striped table-bordered table-condensed table-hover">
				<thead class="text-center">
				<tr>
				<th rowspan="2" width="15px" rowspan="2">
					No
				</th>
				<th rowspan="2" class="tengah" width="19%" rowspan="2">
					Nama
				</th>
				<th colspan="2" class="tengah" width="18%" colspan="2">
					Redaksi
				</th>
				<th colspan="2"  class="tengah" width="18%" colspan="2">
					PSDM
				</th>
					<th colspan="2"  class="tengah" width="18%" colspan="2">
					JK
				</th>
				<th colspan="2"  class="tengah" width="18%" colspan="2">
					Perusahaan
				</th>
				<th rowspan="2" class="tengah" width="20%" rowspan="2">
					Total 
				</th>
				</tr>
				</tr>
				</thead>
						
				<tbody>		
				<tr>
				<th class="tengah">Kemampuan Menulis</th>
				<th class="tengah">Layout/ Ilustrasi/ Foto</th>
				<th class="tengah">Kemampuan Berinteraksi</th>
				<th class="tengah">Kemampuan Berwacana</th>
				<th class="tengah">Penguasaan Isu</th>
				<th class="tengah">Kunjungan Lembaga</th>
				<th class="tengah">Aktivitas Kepanitiaan</th>
				<th class="tengah">Iklan/ Produksi/ Sirkulasi</th>													
				</tr>
				</tbody>
<?php 
	$no=0;
	if(!empty($tabelrekap) ){
	foreach($tabelrekap as $list){
		?> <tr><td><?php $no++; echo $no; ?> </td> <?php
		foreach($list as $array){
			?><td><?php
				if($array=="")
					echo "0";
				else echo $array;
			?>
			</td><?php
		} ?>
		</tr><?php
	}}
	else{
		?>
		<tr ><td colspan=11 style="text-align:center;"><h4>Data Tidak Ditemukan</h4></td></tr>
		<?php
	}
?>

<?php 
}
?>


