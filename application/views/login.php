<!DOCTYPE html>
<html>
  <head>
    <title>S.I.P.P.A</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/stylebaru.css" rel="stylesheet">
    <link  href="<?php echo base_url();?>assets/images/xp.png" rel="shortcut icon">
   
  </head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12" align="center"><!--IKI HEADER-->
     <h1>S.I.P.P.A</h1>
       <img  width="5%" height="5%" src="<?php echo base_url('assets/images/logoxp.png'); ?>" />
     <h4>
      <p>Sistem Informasi Pendataan dan Penilaian Anggota <br>Lembaga Pers Mahasiswa Ekspresi</p>
      </h4>

    </div>

  </div>
  <div class="row">
    <div class="col-md-7" style="border:0px solid #bbb;border-radius:20px;padding:5px 20px 5px 100px;"> <!--IKI CONTENT-->
    <div class="carousel slide" id="carousel-1" >
        <ol class="carousel-indicators">
          <li data-slide-to="0" data-target="#carousel-1" class="active">
          </li>
          <li data-slide-to="1" data-target="#carousel-1">
          </li>
          <li data-slide-to="2" data-target="#carousel-1">
          </li>
          
        </ol>
        <div class="carousel-inner">
          <div class="item">
            <img alt=" satu" width="100%" height="100%" src="<?php echo base_url('assets/images/1.jpg'); ?>" />
          </div>
          <div class="item">
            <img alt="dua" width="100%" height="100%" src="<?php echo base_url('assets/images/2.jpg'); ?>" />
          </div>
          <div class="item active">
            <img alt="tiga" width="100%" height="100%" src="<?php echo base_url('assets/images/3.jpg'); ?>" />
          </div>
         
        </div> 

        <a class="left carousel-control" href="#carousel-1" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> 
        <a class="right carousel-control" href="#carousel-1" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </div>
    </div>
    
    <div class="col-md-5" style="border:0px solid #bbb;border-radius:20px;padding: 0px 70px 5px 50px;"> 
    <div class="panel-heading" align="center" style="margin-top:0px;"><b>Login Pengguna </b>
    </div>
    <div id="message">
      <?php echo $this->session->flashdata('message');?>
      <?php
        echo form_open('auth/login');
      ?>
    </div>
      <table class="table">
        <tr><td>Username</td>
            <td>  
            <div class="input-group">
            <input type="text" name="username" required="" placeholder="Username ..." autofocus="" class="form-control">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            </div>
            </td>
        </tr>
        <tr><td>Password</td><td> 
            <div class="input-group">
            <input type="password" name="password" placeholder="Password" required="" class="form-control">
            <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
            </div>
            </td>
        </tr>
        <tr><td><?php echo $image;?></td>
            <td>   
            <input type="text" name="kode_aman" placeholder="Masukan kode di samping" required="" class="form-control">
            </td>
        </tr>
        <tr><td><a href="">Belum punya akun?</a></td>
            <td align="right"><input type="submit" name="submit" value="Login" class="btn btn-primary"></td>
        </tr>
      </table>   
      </form>
   </div> 
  
  <div class="row">
    <div class="col-md-12" align="center"> <!--IKI FOOTER-->
      <hr>
     <p>&copy; Lembaga Pers Mahasiswa Ekspresi UNY | 
      <a href="" data-toggle="modal" data-target="#tentang">Tentang Kami </a>| 
      <a href="" data-toggle="modal" data-target="#bantuan">Bantuan</a>
    </div>
  </div>
  

<!-- Modal -->
<div class="modal fade" id="tentang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" align="center">LEMBAGA PERS MAHASISWA EKSPRESI</h4>
      </div>
      <address>
      <br> <p id="content">
          Jl. Colombo No.1 Gedung Student Center Lt.2 Sayap Timur Universitas Negeri Yogyakarta 55281<br>
          Kantor: lpm_ekspresi@yahoo.com<br>
          Redaksi: redaksi@ekspresionline.com<br>
          web : <a href>ekspresionline.com</a>
          </p>
      </address>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="bantuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" align="center">Bantuan</h4>
      </div>
      <address>
      <br> <p id="content">
          Jika pengguna mengalami kesulitan untuk login atau kendala terkait sistem silakan menghubungi admin/pengurus LPM Ekspresi. Terimakasih <br> Tutorial sistem ini dapat dilihat di <br> NB: Di dalam tutorial terdapat perbedaan tampilan sistem baru dengan sistem lama. Namun, secara fungsionalitas sistem tetap sama.
          </p>
      </address>
    </div>
  </div>
</div>


    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

  </body>
</html>
