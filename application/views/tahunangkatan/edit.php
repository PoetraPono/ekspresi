<h2 style="font-weight: normal;"><?php echo $title;?></h2>

    
    <?php
echo form_open($this->uri->segment(1).'/edit');
echo "<input type='hidden' name='id' value='$r[id_angkatan]'>";
?><div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Edit Record</h3>
  </div>
  <div class="panel-body">
<table class="table table-bordered">
        <tr>
    <td width="150">Tahun Akademik</td><td>
        <?php echo inputan('text', 'tahun','col-sm-4','Tahun Akademik ..', 1, $r['keterangan'],'');?>
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