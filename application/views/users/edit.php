<script src="<?php echo base_url();?>assets/js/1.8.2.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>

<script>
$(document).ready(function(){
  $("#divisi").change(function(){
      var divisi=$("#divisi").val();
      $.ajax({
	url:"<?php echo base_url();?>users/tampilkansubdivisi",
	data:"divisi=" + divisi ,
	success: function(html)
	{
            $("#subdivisi").html(html);
	}
	});
 });
});
</script>

<script>
  $( document ).ready(function() {
    $( "#jurusan" ).hide();
  });
 </script>

  <script>
$(document).ready(function(){
    $("#level").change(function(){
        var level = $("#level").val();  
        if(level==2)
            {
                 $( "#jurusan" ).show();
            }
            else
            {
                   $( "#jurusan" ).hide();  
            }
  });
});
</script>

<?php
echo form_open_multipart($this->uri->segment(1).'/edit');
echo "<input type='hidden' name='id' value='$r[id_users]'>";
$level=array(1=>'Admin',2=>'Pengurus',3=>'Anggota');
$class      ="class='form-control' id='level'";
if($this->session->userdata('level')==1)
{
    $param="";
}
else
{
	$param="";
}
?>

 <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Edit Record</h3>
  </div>  
 <div class="row">
    <div class="col-md-12 clearfix">
    <ul id="example-tabs" class="nav nav-tabs" data-toggle="tabs">
        <li class="active"><a href="#biodata">Pribadi</a></li>
        <li><a href="#orangtua">Orangtua</a></li>
    </ul>
 <div class="tab-content">
 <div class="tab-pane active" id="biodata">
 <table class="table table-responsive">		
	<tr>
		<td width="150">username</td>
		<td><?php echo inputan('text', 'username','col-sm-4','Username ..', 1, $r['username'],'');?></td>
	</tr>
  
	<tr>
		<td width="150">Password</td>
		<td><?php echo inputan('password', 'password','col-sm-3','ganti password', 1,'','');?></td>
	</tr>

	<tr>
	
		<td width="150">NIM, Nama</td>
		<td><?php echo inputan('text', 'nim','col-sm-2','Nim ..', 1, $r['nim'],'');?>
			<?php echo inputan('text', 'nama','col-sm-8','Nama ..', 1, $r['nama'],'');?>
		</td>
	</tr>
      
	<tr>
		<td width="150">Level</td>
		<td><div class="col-sm-3">
			<?php echo form_dropdown('level',$level,'',$class);?>
			</div>
		
		</td>
	</tr>
  
	<tr>
		<td>Tahun Agkatan</td>
		<td><?php echo buatcombo('tahun_angkatan','angkatan','col-sm-2','keterangan','id_angkatan','',''); ?>
		</td>
	</tr>
  
	<tr>
		<td>Gender</td>
		<td><div class="col-md-2">
			<?php  echo form_dropdown('gender',array('1'=>'Laki Laki','2'=>'Perempuan'),'',"class='form-control'");?>
			</div>
		</td>
	</tr>
										   
	<tr>
		<td>Tempat, Tanggal Lahir</td>
		<td><?php echo inputan('text', 'tempat_lahir','col-sm-6','Tempat Lahir ..', 0, $r['tempat_lahir'],'');?>
			<?php echo inputan('text', 'tanggal_lahir','col-sm-2','Tahun-Bln-Tgl ..', 0,$r['tanggal_lahir'],array('id'=>'datepicker'));?>
		</td>
	</tr>

 
    <tr>
		   <td width="050">Divisi / Subdivisi</td>
		   <td>
        <div class="col-sm-6">
            <?php
            $divisi=  getField('subdivisi', 'id_divisi', 'id_subdivisi', $r['id_subdivisi'])
            ?>
        <?php echo buatcombo('divisi', 'divisi', '', 'nama_divisi', 'id_divisi', $param, array('id'=>'divisi'))?>
        </div>
            <div class="col-sm-6">
         <?php echo editcombo('subdivisi', 'subdivisi', '', 'nama_subdivisi', 'id_subdivisi', array('id_divisi'=>$divisi), array('id'=>'subdivisi'),$r['id_subdivisi'])?>
            </div>
    </td>
    </tr>
	
	<tr>
		<td>Alamat</td>
		<td> <?php echo textarea('alamat', '', 'col-sm-02', 2, $r['alamat']);?>
	</td>
	</tr>
	
	<tr>
		<td>Telp</td>
		<td> <?php echo textarea('telp', '', 'col-sm-02', 1, $r['telp']);?></td>
	</tr>
	<tr>
		<td>Riwayat Keanggotaan</td>
		<td> <?php echo textarea('riwayat', '', 'col-sm-02', 1, '');?></td>
	</tr>
</table>
</div>

<div class="tab-pane" id="orangtua">
<table class="table table-responsive">
	<tr>
		<td width="150">Nama Ayah, Ibu</td>
		<td><?php echo inputan('text', 'nama_ayah','col-sm-6','Nama Ayah ..', 0, $r['nama_ayah'],'');?>
            <?php echo inputan('text', 'nama_ibu','col-sm-6','Nama Ibu ..', 0, $r['nama_ibu'],'');?>
        </td>
	</tr>

	<tr>
		<td>Pekerjaan Ayah, Ibu</td>
        <td><?php echo buatcombo('pekerjan_ayah','pekerjaan','col-sm-4','keterangan','id_pekerjaan','',''); ?>
			<?php echo buatcombo('pekerjaan_ibu','pekerjaan','col-sm-4','keterangan','id_pekerjaan','',''); ?>
		</td>
	</tr>

	<tr>
		<td>Alamat Ayah, Ibu</td>
		<td><?php echo textarea('alamat_ayah', '', 'col-sm-6', 2, $r['alamat_ayah'])?>
			<?php echo textarea('alamat_ibu', '', 'col-sm-6', 2, $r['alamat_ibu'])?>
		</td>
	</tr>

	<tr>
		<td>No HP Orang Tua</td>
		<td><?php echo inputan('text', 'no_hp_ortu','col-sm-3','No Hp Orang Tua ..', 0, $r['no_hp_ortu'],'');?>
		</td>
	</tr>

</table>
</div>                          
	<tr>
    <td></td>
    <td colspan="2"> 
		<input type="submit" name="submit" value="simpan" class="btn btn-danger  btn-sm">
        <?php echo anchor($this->uri->segment(1),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
	</td>
	</tr>
</div>
</form>