<div class="panel panel-default" style="padding:10px">
<div class="panel-body">
<div class="push">
<h3 class="text-center text-primary">
 Tahun Angkatan Anggota
 </h3>
</div>

<hr>
<p><?php
echo anchor($this->uri->segment(1).'/post','Tambah Data',array('class'=>'btn btn-primary   btn-sm'))
?>
</p>
<table id="example-datatables" class="table table-striped table-bordered table-hover" width='100%'>
    <thead>
    <tr>                           
        <th width="2%">No</th>
        <th width="50%">Keterangan</th>
        <th width="5%">Aksi</th>
    </tr>
</thead>
<tbody>
<?php
$i=1;
foreach ($record as $r)
{
?>       
    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo strtoupper($r->keterangan);?></td>
        <td class="text-center">
            <div class="btn-group">
                <a href="<?php echo base_url().''.$this->uri->segment(1).'/edit/'.$r->id_angkatan;?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-success"><i class=" glyphicon glyphicon-pencil"></i></a>  
                <a href="<?php echo base_url().''.$this->uri->segment(1).'/delete/'.$r->id_angkatan;?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class=" glyphicon glyphicon-trash"></i></a>
             </div>
        </td>
    </tr>
<?php $i++;}?>
</tbody>
</table>
                    <!-- END Datatables -->
                    
