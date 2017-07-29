<style>
th{
	text-align:center;
}
</style>

<div class="panel panel-default" style="padding:10px">
<div class="panel-body">
	<h3 class="text-center text-primary"> Penilaian Anggota </h3>
	<hr>
	<h5>Anggota dapat dinilai berkala  untuk tiap minggunya sesuai dengan kesepakatan pengurus</h5>
	<hr>
  <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Petunjuk</button>
	<button class="btn btn-primary btn-sm">
	Minggu ke: <?php echo $this->uri->segment(4);?></button>
  <!-- Split button -->
    <div class="btn-group">
    <button class="btn btn-warning btn-sm">angkatan : <?php
      if(isset($tabel['angkatan'])){
        foreach ($tabel['angkatan'] as $key) {
        if($key['id_angkatan']==$this->uri->segment(3)){
        echo $key['keterangan'];
        $default_ket = $key['keterangan'];
        break;
        };
      }
    }?>
    </button>
    <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">
      <span class="caret"></span>
      <span class="sr-only">Toggle Dropdown</span>
    </button>
  <ul class="dropdown-menu" role="menu">
  <?php
    foreach($tabel['angkatan'] as $newdata){  ?>
      <li><a href="<?php echo base_url('index.php/input/'.$this->uri->segment(2).'/'.$newdata['id_angkatan'].'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7)); ?>">  <?php echo $newdata['keterangan'];?></a></li>
      <li></li>
  <?php } ?>
  </ul>
  </div>


	<!-- menampilkan tanggal -->
	<!-- Split button -->
	<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tampilkanTanggal">Tanggal : 
		<?php 
		if(isset($keterangan['tgl']))
		echo $keterangan['tgl'];
 else
 echo $this->uri->segment(6).'-'.$this->uri->segment(7).'-'.$this->uri->segment(5);
		?>
	</button> 		
</div>


<form id="inputField" method="post" action="<?php echo base_url('index.php/input/simpan'); ?>">
<div class="row clearfix">
<div class="col-md-12 column">
 	<div class="row clearfix">
 	<div class="col-md-12 column">
		<input type = "hidden" name = "namaTabel" value="<?php echo $this->uri->segment(2);?>"></input>
	 	<input type = "hidden" name = "angkatanId" value="<?php echo $this->uri->segment(3);?>"></input>
	 	<input type = "hidden" name = "minggu" value="<?php echo $this->uri->segment(4);?>"></input>
 		<input type = "hidden" name = "tahun" value="<?php echo $this->uri->segment(5);?>"></input>
 		<input type = "hidden" name = "hari" value="<?php echo $this->uri->segment(6);?>"></input>
 		<input type = "hidden" name = "bulan" value="<?php echo $this->uri->segment(7);?>"></input>
   	
 		<table border="2" class="table table table-striped table-bordered table-condensed table-hover">
 		<thead>
 		<tr>
 		<th class="tengah" width="15px" rowspan="2">No</th>
 		<th class="tengah" width="20%" rowspan="2">Nama</th>
 		<th class="tengah" width="18%" colspan="2">Redaksi</th>
 		<th class="tengah" width="18%" colspan="2">PSDM</th>
 		<th class="tengah" width="18%" colspan="2">JK</th>
 		<th class="tengah" width="18%" colspan="2">Perusahaan</th>
 		<th class="tengah" width="18%" rowspan="2" width="30x">	Jumlah</th>
 		</tr>
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
	 	</thead>
 	
	 	<tbody>
  		<?php
  		$no	=1; 
  		?>
  		<?php 
   		foreach ($tabel['tabel'] as $key ) {
        // echo json_encode($key);
   		?>
      
<!--error di id_users.... undefined index-->
    	<tr id= "<?php echo $key['id_users'] ?>">
	    	<td><?php echo $no; $no++;?></td>
    		<td>
    		<?php if($key['nama']!='') echo $key['nama'];
     		else echo '' ;?>
        </td>
    		<td align="center">
        <input size="5"  id="penilaianredaksi1" name ="<?php if($key['id_users']!='') echo $key['id_users'];
        else echo '' ;?>_penilaianredaksi1" onkeypress="return isNumber(event, 1)" onkeyup="setJumlah(<?php echo $key['id_users'] ?>)" value="<?php echo $key['penilaianredaksi1']?>"></input></td>
	    	<td><input size="5"  id="penilaianredaksi2" name ="<?php if($key['id_users']!='') echo $key['id_users'];
     		else echo '' ;?>_penilaianredaksi2" onkeypress="return isNumber(event, 1)" onkeyup="setJumlah(<?php echo $key['id_users'] ?>)" value="<?php echo $key['penilaianredaksi2']?>"></input></td>
    		<td><input size="5"  id="penilaianpsdm2" name ="<?php if($key['id_users']!='') echo $key['id_users'];
     		else echo '' ;?>_penilaianpsdm2" onkeypress="return isNumber(event, 1)" onkeyup="setJumlah(<?php echo $key['id_users'] ?>)" value="<?php echo $key['penilaianpsdm2']?>"></input></td>
    		<td><input size="5"  id="penilaianpsdm1" name ="<?php if($key['id_users']!='') echo $key['id_users'];
     		else echo '' ;?>_penilaianpsdm1" onkeypress="return isNumber(event, 1)" onkeyup="setJumlah(<?php echo $key['id_users'] ?>)" value="<?php echo $key['penilaianpsdm1']?>"></input></td>
    		<td><input size="5"  id="penilaianjk2" name ="<?php if($key['id_users']!='') echo $key['id_users'];
     		else echo '' ;?>_penilaianjk2" onkeypress="return isNumber(event, 1)" onkeyup="setJumlah(<?php echo $key['id_users'] ?>)" value="<?php echo $key['penilaianjk2']?>"></input></td>
    		<td><input size="5"  id="penilaianjk1" name ="<?php if($key['id_users']!='') echo $key['id_users'];
     		else echo '' ;?>_penilaianjk1" onkeypress="return isNumber(event, 1)" onkeyup="setJumlah(<?php echo $key['id_users'] ?>)" value="<?php echo $key['penilaianjk1']?>"></input></td>
			  <td><input size="5"  id="penilaianperusahaan1" name ="<?php if($key['id_users']!='') echo $key['id_users'];
     		else echo '' ;?>_penilaianperusahaan1" onkeypress="return isNumber(event, 1)" onkeyup="setJumlah(<?php echo $key['id_users'] ?>)" value="<?php echo $key['penilaianperusahaan1']?>"></input></td>
    		<td><input size="5"  id="penilaianperusahaan2" name ="<?php if($key['id_users']!='') echo $key['id_users'];
     		else echo '' ;?>_penilaianperusahaan2" onkeypress="return isNumber(event, 1)" onkeyup="setJumlah(<?php echo $key['id_users'] ?>)" value="<?php echo $key['penilaianperusahaan2']?>"></input></td>		

    		<td id ="jumlah"><?php $nilai = $key['penilaianredaksi2'] *1+$key['penilaianpsdm2']*1+$key['penilaianjk2']*1+$key['penilaianperusahaan2']*1+ $key['penilaianredaksi1'] *1+$key['penilaianpsdm1']*1+$key['penilaianjk1']*1+$key['penilaianperusahaan1']*1; echo $nilai; ?></td>
   	 	</tr>
   		<?php
   		}
   		?>
  	</tbody>
 	</table>

	<div class="pull-right">
	<button class="btn btn-primary" type="submit" onclick="alert('data berhasil diperbaharui')">
	Simpan</button>
	</div>
	</form>
 	</div>
 </div>
</div>
</div>
</div>
	

 <div id="tampilkanTanggal" class="modal fade" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
 <div class="modal-content">
   <form method="post" action="<?php echo base_url('index.php/input/tampilkan/'); ?>" >
 <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
   <h4 class="modal-title">Menampilkan </h4>
 </div>
 <div class="modal-body">
 	<input id='angkatanId' type="hidden" name='angkatanId' value="<?php echo $this->uri->segment(3)?>"></input>	
 	<input id='jenisTabel' type="hidden" name='jenisTabel' value="<?php echo $this->uri->segment(2)?>"></input>	
 	<div class="row" style="margin-bottom:10px">
	   <div class="col-md-2 col-sm-3">
	 	<label>Tanggal </label>
	   </div>
	   <div class="col-md-3 col-sm-2">
	   	<input  name='hari'></input>
	 </div>
	 <!-- <div class="col-md-1 col-sm-1"></div> -->
	 <div class="col-md-3 col-sm-3">
	 	<select class="form-control" name="bulan" value='<?php echo $this->uri->segment(5); ?>'> 
  <option value="1">Januari </option> 
  <option value="2">Februari </option> 
  <option value="3">Maret </option> 
  <option value="4">April </option> 
  <option value="5">Mei </option> 
  <option value="6">Juni </option> 
  <option value="7">Juli </option> 
  <option value="8">Agustus </option> 
  <option value="9">September </option> 
  <option value="10">Oktober </option> 
  <option value="11">November </option> 
  <option value="12">Desember </option> 
  </select>
	 </div>
	 <div class="col-md-4 col-sm-3">
	 	<input  name='tahun'></input>
	   </div>
 </div>	
 </div>
 <div class="modal-footer">
  <div class="pull-left">
    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button>
  </div>
   <button class="btn btn-primary btn-sm" type="submit"  ><span class="glyphicon glyphicon-search"></span> Tampilkan</button>
 </div>
   </form>
 </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
 </div>

<script type="text/javascript">
function isNumber(evt, vals) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if(vals == 0){
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }
    }
    else if(vals == 1){
      if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
        return false;
      }
    }
    return true;
  }

function setket(id_angkatan){
	  $('#inputField #id_angkatan').val(id_angkatan);
   };
   
function setJumlah(id){
  $('#'+id+' #penilaianredaksi1').keyup(function(){
  if ($(this).val() > 100){
    alert("Maksimal 100");
    $(this).val('100');
  }
});
  $('#'+id+' #penilaianredaksi2').keyup(function(){
  if ($(this).val() > 100){
    alert("Maksimal 100");
    $(this).val('100');
  }
});
  $('#'+id+' #penilaianpsdm1').keyup(function(){
  if ($(this).val() > 100){
    alert("Maksimal 100");
    $(this).val('100');
  }
});
  $('#'+id+' #penilaianpsdm2').keyup(function(){
  if ($(this).val() > 100){
    alert("Maksimal 100");
    $(this).val('100');
  }
});
  $('#'+id+' #penilaianjk1').keyup(function(){
  if ($(this).val() > 100){
    alert("Maksimal 100");
    $(this).val('100');
  }
});
  $('#'+id+' #penilaianjk2').keyup(function(){
  if ($(this).val() > 100){
    alert("Maksimal 100");
    $(this).val('100');
  }
});
  $('#'+id+' #penilaianperusahaan1').keyup(function(){
  if ($(this).val() > 100){
    alert("Maksimal 100");
    $(this).val('100');
  }
});
  $('#'+id+' #penilaianperusahaan2').keyup(function(){
  if ($(this).val() > 100){
    alert("Maksimal 100");
    $(this).val('100');
  }
});
	 var jumlah_btn = ($('#'+id+' #penilaianredaksi2').val())*1 + ($('#'+id+' #penilaianpsdm2').val())*1 + ($('#'+id+' #penilaianjk2').val())*1+ ($('#'+id+' #penilaianperusahaan2').val())*1;
	 var jumlah_jtn = $('#'+id+' #penilaianredaksi1').val()*1 + $('#'+id+' #penilaianpsdm1').val()*1 + $('#'+id+' #penilaianjk1').val()*1+ ($('#'+id+' #penilaianperusahaan1').val())*1;
	 //alert(jumlah_jtn);
	$('#'+id+' > #jumlah_jtn').html(jumlah_jtn);
	$('#'+id+' #jumlah_btn').html(jumlah_btn);
	$('#'+id+' #jumlah').html(jumlah_jtn+jumlah_btn);
	};
</script>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
 <div class="modal-content">
   <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel">Petunjuk Pengelolaan Data Pengguna</h4>
   </div>
   <div class="modal-body">
   1. Penilaian anggota merupakan menu yang tersedia untuk pengguna pada level pengurus atau admin. </br>
   2. Penlaian dapat dilakukan dengan mengisi kolom-kolom penilaian. </br>
   3. Sebelum melakukan penilaian, pengurus harus memilih angkatan & tanggal penilaian (secara default angkatan pertama dan tanggal hari ini).</br>
   4. Penilaian dapat dilakukan sesuai dengan tanggal yang disepakati pengurus. </br></br>
   <b>catatan </b>: penilaian akan disimpan per minggu. Jika mengalami kesulitan silakan menghubungi admin.

   </div>
   <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
 </div>
  </div>
</div>