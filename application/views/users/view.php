<div class="panel panel-default" style="padding:10px">
<div class="panel-body">
<div class="push">
<h3 class="text-center text-primary">
 Anggota LPM Ekspresi
 </h3>
</div>
<hr>
<?php
if($this->session->userdata('level')==1)
{
    $param="";
}
else
{
    $param="";
}
?>

<div>
	<?php echo anchor('users/post','Tambah Data',array('class'=>'btn btn-primary btn-sm'))
	?>
    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Petunjuk</div>

</br>
<?php echo $this->session->flashdata('pesanedit'); ?>

<table id="example-datatables" class="table table">
<thead>
    <tr>
        <th width="7">No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Gender</th>
        <th>Subdivisi</th>
        <th>Angkatan</th>
		<th>Telp/HP</th>
        <th width="80">Level</th>
       <!-- <th width="150">Last Login</th> -->
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    <?php
    $i=1;
  
    foreach ($record as $r)
    {
    $gender=$r->gender==1?'Laki Laki':'Perempuan';
    ?>
    <tr>
       
        <td><?php echo $i;?></td>
        <td><?php echo $r->nim;?></a></td>
        <td><?php echo $r->nama;?></a></td>
       
        <td><?php echo $gender;?></td>
        <td><?php
             if($r->id_subdivisi==1){ echo "Expedisi";}   
                elseif($r->id_subdivisi==2){ echo "Pemimpin Redaksi";} 
                elseif($r->id_subdivisi==3){ echo "Redaktur Bahasa";}
                elseif($r->id_subdivisi==4){ echo "Redaktur Aristik";}
                elseif($r->id_subdivisi==5){ echo "Redaktur Foto";}
                elseif($r->id_subdivisi==6){ echo "Redpel Online";}
                elseif($r->id_subdivisi==7){ echo "Redpel Buku";}
                elseif($r->id_subdivisi==8){ echo "Redpel Majalah";}
                elseif($r->id_subdivisi==9){ echo "Pemimpin PSDM";}
                elseif($r->id_subdivisi==10){ echo "Litbang";}
                elseif($r->id_subdivisi==11){ echo "Diskusi";}
                elseif($r->id_subdivisi==12){ echo "Diklat dan Kaderisasi";}
                elseif($r->id_subdivisi==13){ echo "Perpustakaan";}
                elseif($r->id_subdivisi==14){ echo "Pemimpin JK";}
                elseif($r->id_subdivisi==15){ echo "JK Eksternal";}
                elseif($r->id_subdivisi==16){ echo "JK Internal";}
                elseif($r->id_subdivisi==17){ echo "Pemimpin Perusahaan";}
                elseif($r->id_subdivisi==18){ echo "EO";}
                elseif($r->id_subdivisi==19){ echo "Iklan";}
                elseif($r->id_subdivisi==20){ echo "Sirkulasi dan Produksi";}
                elseif($r->id_subdivisi==21){ echo "PU";}
                elseif($r->id_subdivisi==22){ echo "Sekretaris";}
                elseif($r->id_subdivisi==23){ echo "Bendahara";}
             else { echo "";}
            ?>
        </td>
        <td><?php //harusnya bisa diambil dati tabel angkatan
            if($r->id_angkatan==1){ echo "2010-2011";  }   
            elseif($r->id_angkatan==2){ echo "2011-2012"; }
            elseif($r->id_angkatan==3){ echo "2012-2013"; }
            elseif($r->id_angkatan==4){ echo "2013-2014"; }
            elseif($r->id_angkatan==5){ echo "2014-2015"; }
            elseif($r->id_angkatan==6){ echo "2015-2016"; }
            elseif($r->id_angkatan==7){ echo "2016-2017"; }
            elseif($r->id_angkatan==8){ echo "2017-2018"; }
            elseif($r->id_angkatan==9){ echo "2018-2019"; }
            elseif($r->id_angkatan==10){ echo "2020-2021"; }
       
            else { echo "Belum terindex, hubungi admin";}
            ?>
        </td>
		<td><?php echo $r->telp;?></td>
         <td>
        <?php
            if($r->level==1){ echo "Admin"; }
            elseif($r->level==2){ echo "Pengurus"; }
            else { echo "anggota"; }
        ?>
        </td>
       <!-- <td><?php echo tgl_indo($r->last_login);?></td>-->

         <td width="120" class="text-center">
            <a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id_users;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-success"><i class=" glyphicon glyphicon-pencil"></i></a>
            <a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->id_users;?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class=" glyphicon glyphicon-trash"></i></a>
            <?php $data=$this->session->flashdata('pesan'); ?>
            </div> 
        </td>
    </tr>
    <?php $i++;}?>                          
	</tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Petunjuk Pengelolaan Data Pengguna</h4>
      </div>
      <div class="modal-body">
        1. Menambahkan data pengguna dilakukan dengan menekan tombol 'tambah data', kemudian mengisi form tambah pengguna </br>
        2. Mengedit data pengguna dapat dilakukan dengan menekan tombol 'edit' pada kolom aksi</br>
        3. Menghapus data pengguna dapat dilakukan dengan menekan tombol 'hapus' pada kolom aksi</br>
        4. Melakukan pencarian data anggota dapat dilakukan dengan mengisi 'kata kunci' pada kolom search, kata kunci dapat berupa nama, angkatan, divisi, dan lainnya
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>