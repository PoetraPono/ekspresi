<div class="panel panel-default" style="padding:10px">
<div class="panel-body">
<div class="push" style="padding:0px 0px 0px 0px;">
<h3 class="text-center text-primary">
 Anggota LPM Ekspresi
 </h3>
 <hr>
<div><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Petunjuk</div>
<br>
<table id="example-datatables" class="table">
<thead>
    <tr>
        <th width="6px">No</th>
        <th width="20%">Nama</th>
        <th width="20%">Subdivisi</th>
        <th width="15%">Angkatan</th>
		<th>Telp/HP</th>   
        <th>Detail</th>
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
        <td><?php echo $r->nama;?></a></td>
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
        <td><a href="<?php echo base_url().''.$this->uri->segment(1).'/detail/'.$r->id_users;?>" data-toggle="tooltip" title="Lihat Detail" class="btn btn-xs btn-warning">Detail <i class="glyphicon glyphicon-eye-open"></i></a>
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
        <h4 class="modal-title" id="myModalLabel">Petunjuk Halaman Anggota</h4>
      </div>
      <div class="modal-body">
        1. Secara <i>default </i> data yang ditampilkan berjumlah 10. Namun, Pengguna dapat menentukan jumlah daftar yang ingin ditampilkan dengan memilih pada piihan 10, 20, 50, dan 100</br>
        2. Melakukan pencarian data anggota dapat dilakukan dengan mengisi 'kata kunci' pada kolom search, kata kunci dapat berupa nama, angkatan, divisi, dan lainnya<br>
        3. Pengguna dapat melakukan sortir pada masing masing data dengan melakukan klik pada <i>header</i> tabel
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>