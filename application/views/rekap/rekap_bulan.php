<!DOCTYPE html>
<style>
th{
	text-align:center;
}
</style>
<br>
    <div class="panel panel-default" style="padding:10px">
         <div class="panel-body">
          	<div class="col-md-12 column">
			<h3 class="text-center text-primary">
				Laporan Penilaian Angkatan
				<?php
					if(isset($angkatan)){
					  	foreach ($angkatan as $key) {
					        if($key['id_angkatan']==$this->uri->segment(4)){
								echo $key['keterangan'];
							    $default_angkatan = $key['keterangan'];
							    break;
							};
						}
					}
				?>
            <br> Bulan
            <?php 
            	switch($this->uri->segment(5))
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
			<hr>
			</div>	

	<hr>
	<!-- button untuk download -->
    <div> 
    	<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#setting" > Tampilkan <span class="glyphicon glyphicon-arrow-down" style="padding-left:10px;"></span></button>
    &nbsp;&nbsp;
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#konfirmasi" > Unduh .xls <span class="glyphicon glyphicon-arrow-down" style="padding-left:10px;"></span></button>
    &nbsp;&nbsp;
    <!-- <button type="button" class="btn btn-default btn-sm" > Unduh .pdf <span class="glyphicon glyphicon-arrow-down" style="padding-left:10px;"></span></button> -->
    </div>
    <!--  end of download button -->
    <br>
	<div class="row clearfix">
		<div class="col-md-12 column">
			<table class="table table table-striped table-bordered table-condensed table-hover">
				<thead class="text-center" >
					<tr>
						<th width="15px" rowspan="2">
							No
						</th>
						<th class="tengah" width="19%" rowspan="2">
							Nama
						</th>
						<th class="tengah" width="18%" colspan="2">
							Redaksi
						</th>
						<th class="tengah" width="18%" colspan="2">
							PSDM
						</th>
						<th class="tengah" width="18%" colspan="2">
							JK
						</th>
						<th class="tengah" width="18%" colspan="2">
							Perusahaan
						</th>
						<th class="tengah" width="20%" rowspan="2">
							Total
						</th>
					</tr>
					</tr>
				</thead>
				
			<tbody >
				<tr bgcolor="#5ACBF5">
					<th> </th>
					<th> </th>
					<th class="tengah">Kemampuan Menulis</th>
					<th class="tengah">Layout/ Ilustrasi/ Foto</th>
					<th class="tengah">Kemampuan Berinteraksi</th>
					<th class="tengah">Kemampuan Berwacana</th>
					<th class="tengah">Penguasaan Isu</th>
					<th class="tengah">Kunjungan Lembaga</th>
					<th class="tengah">Aktivitas Kepanitiaan</th>
					<th class="tengah">Iklan/ Produksi/ Sirkulasi</th>								
					<th> </th>
					</tr>					
			</tbody>

<?php 
	$no=0;
	if(!empty($tabel) ){
	foreach($tabel as $list){
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
</table>
</div>
</div>
</div>
</div>
<!-- ============================================== -->
<!-- modal untuk tanda tangan  -->
<div id="konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" action="<?php echo base_url('index.php/rekapbulan/getExl/'); ?>" >
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Konfirmasi</h4>
                </div>
                <input type="hidden" name="angkatan" value="<?php echo $angkatanData; ?>">
                <input type="hidden" name="tahun" value="<?php echo $tahun; ?>">
                <input type="hidden" name="bulan" value="<?php echo $bulan; ?>">
                <div class="modal-body">
                   		Klik unduh untuk melanjutkan
					</div>
				<div class="modal-footer">
                    <div class="pull-left">
                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button>
                    </div>
                  <button class="btn btn-primary btn-sm" type="submit"  ><span class="glyphicon glyphicon-floppy-disk"></span> Unduh</button>
                </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- end of modal ttd-->	
    <!-- modal setting yang ditampilkan -->
    <div id="setting" class="modal fade" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" action="<?php echo base_url('index.php/rekapbulan/'); ?>" >
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Menampilkan data</h4>
                </div>
                <div class="modal-body">
                  <input class="col-sm-offset-2 col-sm-8" type="hidden" name="tabel" id="tabel" value="<?php echo $this->uri->segment(2);?>">
                	<div class="row" style="margin-bottom:10px">
	                  <div class="col-md-3 col-sm-3">
	                	<label>angkatan </label>
	                  </div>
	                  <div class="col-md-5 col-sm-5">
	                	<select class="form-control" name="angkatan" value='<?php echo $this->uri->segment(4); ?>'> 
                                <?php echo print_r($angkatan);  
                                foreach ($angkatan as $key ) {
                                //foreach ($data['angkatan'] as $key) {
                                ?>
                                <option value="<?php echo $key['id_angkatan']; ?>"> <?php echo $key['keterangan'] ?></option> 
								<?php }?>
						</select>
	                  </div>
                </div>
                <div class="row" style="margin-bottom:10px">
	                  <div class="col-md-3 col-sm-3">
	                	<label>Bulan </label>
	                  </div>
	                  <div class="col-md-3 col-sm-3">
	                  	<select class="form-control" name="bulan" value='<?php echo $this->uri->segment(5); ?>'> 
                            <option><?php echo $this->uri->segment(5); ?></option>
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
							<div class="col-md-1 col-sm-1"><b>Tahun</b>
							</div>
	                <div class="col-md-3 col-sm-3">
						<input  name="tahun" value="<?php echo $this->uri->segment(3); ?>"> 
	                </div>
                </div>
                </div>
                <div class="modal-footer">
                    <div class="pull-left">
                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button>
                    </div>
                  <button class="btn btn-primary btn-sm" type="submit"  ><span class="glyphicon glyphicon-open"></span> Tampilkan</button>
                </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->