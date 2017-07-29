  <div class="panel panel-default">
    <div class="panel-heading">
      <h5 class="panel-title"><i class="icon-reading"></i> Detail  <?php echo $r['nama']; ?></h5>
    </div>
    <div class="panel-body">
    <table class="table table-bordered">
    	<tr>
    		<th>NIM</th>
    		<td><?php echo $r['username']; ?></td>
    	</tr>
    	<tr>
    		<th>Nama</th>
    		<td><?php echo $r['nama']; ?></td>
    	</tr>
    	<tr>
 		<th>Tempat Lahir</th>
    		<td><?php echo $r['tempat_lahir']; ?></td>
    	</tr>
    	<tr>
    		<th>Tanggal Lahir</th>
    		<td><?php echo $r['tanggal_lahir']; ?></td>
    	</tr>
    	<tr>
    		<th>Jenis Kelamin</th>
    		<td><?php if ($r['gender']==1)
                echo "Laki-laki";
                else echo "Perempuan";?></td>
    	</tr>
    	<tr>
    		<th>Alamat</th>
    		<td><?php echo $r['alamat']; ?></td>
    	</tr>
    	<tr>
    		<th>Telepon</th>
    		<td><?php echo $r['telp']; ?></td>
    	</tr>
    	<tr>
    		<th>Divisi</th>
    		<td><?php if ($r['divisi']==2) echo "Expedisi";
                        elseif ($r['divisi']==3) echo "Redaksi";
                        elseif ($r['divisi']==4) echo "PSDM";
                        elseif ($r['divisi']==5) echo "Jaringan Kerja";
                        elseif ($r['divisi']==6) echo "Perusahaan";
                        elseif ($r['divisi']==7) echo "Pengurus Harian";
                        else echo ""; 
                 ?></td>
    	</tr>
        <tr>
            <th>Subdivisi</th>
            <td><?php if ($r['id_subdivisi']== 1) echo "Expedisi";
                        elseif ($r['id_subdivisi']==2) echo "Pemimpin redaksi";
                        elseif ($r['id_subdivisi']==3) echo "Redaktur Bahasa";
                        elseif ($r['id_subdivisi']==4) echo "Redaktur Aristik";
                        elseif ($r['id_subdivisi']==5) echo "Redaktur Foto";
                        elseif ($r['id_subdivisi']==6) echo "Redpel Online";
                        elseif ($r['id_subdivisi']==7) echo "Redpel Buku";
                        elseif ($r['id_subdivisi']==8) echo "Redpel Majalah";
                        elseif ($r['id_subdivisi']==9) echo "Pemimpin PSDM";
                        elseif ($r['id_subdivisi']==10) echo "Litbang";
                        elseif ($r['id_subdivisi']==11) echo "Diskusi";
                        elseif ($r['id_subdivisi']==12) echo "Diklat dan Kaderisasi";
                        elseif ($r['id_subdivisi']==13) echo "Perpustakaan";
                        elseif ($r['id_subdivisi']==14) echo "Pemimpin JK";
                        elseif ($r['id_subdivisi']==15) echo "JK Eksternal";
                        elseif ($r['id_subdivisi']==16) echo "JK Internal";
                        elseif ($r['id_subdivisi']==17) echo "Pemimpin Perusahaan";
                        elseif ($r['id_subdivisi']==18) echo "EO";
                        elseif ($r['id_subdivisi']==19) echo "Iklan";
                        elseif ($r['id_subdivisi']==20) echo "Sirkulasi dan Produksi";
                        elseif ($r['id_subdivisi']==21) echo "PU";
                        elseif ($r['id_subdivisi']==22) echo "Sekretaris";
                        elseif ($r['id_subdivisi']==23) echo "Bendahara";
                    else { echo "";} ?>
             </td>
        </tr>
        <tr>
            <th>Angkatan Masuk Ekspresi</th>
            <td><?php
               if($r['id_angkatan']==1) echo "2010-2011";  
            elseif($r['id_angkatan']==2) echo "2011-2012"; 
            elseif($r['id_angkatan']==3) echo "2012-2013"; 
            elseif($r['id_angkatan']==4) echo "2013-2014"; 
            elseif($r['id_angkatan']==5) echo "2014-2015"; 
            elseif($r['id_angkatan']==6) echo "2015-2016"; 
            elseif($r['id_angkatan']==7) echo "2016-2017"; 
            elseif($r['id_angkatan']==8) echo "2017-2018"; 
            elseif($r['id_angkatan']==9) echo "2018-2019"; 
            elseif($r['id_angkatan']==10) echo "2020-2021";        
            else { echo "Belum terindex, hubungi admin";}
            ?></td>
        </tr>
         <tr>
            <th>Riwayat Keanggotaan</th>
            <td><?php echo $r['riwayat']; ?></td>
        </tr>                      
    </table>                      
    <tr>
    <td></td>
    <td colspan="2"> 
        <?php echo anchor($this->uri->segment(1),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
    </td>
    </tr>

  </div>
</div>