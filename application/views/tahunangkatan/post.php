<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">

    
    <?php
echo form_open_multipart($this->uri->segment(1).'/post');
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Tambah Tahun Angkatan</h3>
  </div>
  <div class="panel-body">
<table class="table table-bordered">
    <tr>
    <td width="150">Angkatan</td><td>
        <?php echo inputan('text', 'tahun','col-sm-4','Contoh: 2012-2013', 1, '','');?>
    </td>
    </tr>
    <tr>
         <td></td><td colspan="2"> 
            <input type="submit" name="submit" value="simpan" class="btn btn-danger  btn-sm">
            <?php echo anchor($this->uri->segment(1),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
        </td></tr>
    
</table>
  </div></div>
</form> 