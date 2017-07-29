<?php
if($this->session->userdata('id_users')=='')
{
redirect('auth/login');
}
?>
<!DOCTYPE html>

<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>S.I.P.P.A</title>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url()?>uadmin/css/main.css">
<link  href="<?php echo base_url();?>assets/images/xp.png" rel="shortcut icon">

<!--<link rel="stylesheet" href="<?php echo base_url();?>assets/themes/base/jquery.ui.all.css">-->
</head>

<body>
  <nav class="navbar navbar-fixed-top navbar-default">
  <div class="navbar-inner">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
    <span class="sr-only">Toggle navigation</span>
    MENU <span class="glyphicon glyphicon-arrow-down"></span>
    </button>
    
    <span class="navbar-brand">SIPPA EKSPRESI &nbsp <img height="25" src=<?php echo base_url();?>assets/images/logoxp.png></img><span>
  </div>

 <div class="collapse navbar-collapse navbar-ex1-collapse">
  <ul class="nav navbar-nav navbar-right">
    <?php
    $mainmenu=$this->db->get_where('mainmenu',array('aktif'=>'y','level'=>$this->session->userdata('level')))->result();
    foreach ($mainmenu as $m)
    {
    // cek sub menu
    $submenu=$this->db->get_where('submenu',array('id_mainmenu'=>$m->id_mainmenu,'aktif'=>'y'));
    if($submenu->num_rows()>0)
    {
    //looping
    echo "<li class='dropdown'>
    <a href='javascript:void(0)' class='dropdown-toggle' data-toggle='dropdown'> <i class='".$m->icon."'></i> ".strtoupper($m->nama_mainmenu)." <b class='caret'></b></a>
    <ul class='dropdown-menu'>";
    foreach ($submenu->result() as $s)
    {
    echo "<li>".anchor($s->link,'<i class="'.$s->icon.'"></i> '.strtoupper($s->nama_submenu))."</li>";
    }
    echo"</ul>
    </li>";
    // end looping
    }
 else
 {
echo "<li>".anchor($m->link,'<i class="'.$m->icon.'"></i> '.strtoupper($m->nama_mainmenu))."</li>";
 }
 }
 ?>
<li>
<a data-toggle="modal" href="#dataKonfirmModal" on-Click="konfirm('Lanjutkan keluar sistem ?', '<?php echo site_url('auth/logout');?>');" class="navbar-link"><span class="glyphicon glyphicon-off"></span> KELUAR</a> </li>
 
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
 <!-- END Inverse Navbar -->
 <!-- END Navbars -->
<div class="container" style="background: white" >
<!-- Example row of columns -->
<div class="row">
<div class="col-md-12">
<?php echo $contents; ?> 
</div>



</div> 

<p align='center' style="font-weight: bold;" >&copy; Sistem Informasi Pendataan dan Penilaian Anggota LPM Ekspresi</p>

<!-- Modal -->
<div class="modal fade" id="dataKonfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Keluar ?</h4>
</div>
<div class="modal-body">
Apakan anda yakin untuk keluar dari sistem ?
</div>
<div class="modal-footer">
<div class="pull-left"><button type="button" class="btn btn-primary btn-sm" data-dismiss="modal"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</button></div>
<button type="button" href="<?php echo site_url('auth/logout');?>" onclick="window.location.href = $(this).attr('href');" class="btn btn-danger btn-sm">Lanjutkan &nbsp; <span class="glyphicon glyphicon-arrow-right"></span></button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>uadmin/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>uadmin/js/plugins.js"></script>
<script src="<?php echo base_url()?>uadmin/js/main.js"></script>
<script src="<?php echo base_url();?>assets/ui/jquery.ui.datepicker.js"></script> 

<script>
$(function() {
$( "#datepicker" ).datepicker({
changeMonth: true,
dateFormat: 'yy-mm-dd',
changeYear: true
});

$( "#datepicker1" ).datepicker({
changeMonth: true,
dateFormat: 'yy-mm-dd',
changeYear: true
});

$( "#datepicker2" ).datepicker({
changeMonth: true,
dateFormat: 'yy-mm-dd',
changeYear: true
});
$( "#datepicker3" ).datepicker({
changeMonth: true,
dateFormat: 'yy-mm-dd',
changeYear: true
});

$( "#datepicker4" ).datepicker({
changeMonth: true,
dateFormat: 'yy-mm-dd',
changeYear: true
});

$( "#datepicker5" ).datepicker({
changeMonth: true,
dateFormat: 'yy-mm-dd',
changeYear: true
});

$( "#datepicker6" ).datepicker({
changeMonth: true,
dateFormat: 'yy-mm-dd',
changeYear: true
});

$( "#datepicker7" ).datepicker({
changeMonth: true,
dateFormat: 'yy-mm-dd',
changeYear: true
});
});
</script>
<!-- Javascript code only for this page -->
<script>
$(function() {
/* Initialize Datatables */
$('#example-datatables').dataTable({"aoColumnDefs": [{"bSortable": false, "aTargets": [0]}]});
$('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
});
</script>
</body>
</html>