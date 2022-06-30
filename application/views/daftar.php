
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login | SPK Pemilihan Tempat Bersalin Metode TOPSIS</title>
    <!-- Favicon-->
    <link rel="icon" href="<?=base_url();?>/logo.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?=base_url();?>/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=base_url();?>/assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=base_url();?>/assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?=base_url();?>/assets/css/style.css" rel="stylesheet">
    <style type="text/css">
        .login-page{
            background-image: url('<?=base_url('assets/img/bg-login.png')?>');
             background-repeat: no-repeat;
            background-size: cover;
        margin: 20vh auto;
        }
    </style>
</head>

<body class="login-page">
    <div class="login-box">
       
        <div class="card">
            <div class="body">
                          <form action="<?= base_url('daftar')?>" method="Post" id="formadd3"> 
                <center> 
                <a href="<?=base_url('')?>"><h4 style="color:black">Sistem Penduduk Keputusan<br>Pemilihan Tempat Bersalin<br>Banyuasin Metode TOPSIS</h4> </a></center>
                    <div class="msg">
                    	
                <?= $this->session->flashdata('msg') ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required value="<?php
                                if(isset($_COOKIE['email_temp'])) {echo $_COOKIE['email_temp'];}
                            ?>" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$">
                        </div>

                        <div class="help-info" id="pesan1_pgw" style="color:red"></div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama"   placeholder="Nama Lengkap" required value="<?php
                                if(isset($_COOKIE['namalengkap_temp'])) {echo $_COOKIE['namalengkap_temp'];}
                            ?>" >
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">location_city</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama_alternatif"   placeholder="Nama Alternatif" required value="<?php
                                if(isset($_COOKIE['namaalternatif_temp'])) {echo $_COOKIE['namaalternatif_temp'];}
                            ?>" >
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="pass1_pgw"  placeholder="Kata Sandi" required>
                        </div>
                        <div class="help-info" id="pesan2_pgw"> </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password2" id="pass2_pgw" placeholder="Konfirmasi Kata Sandi" required>
                        </div>
                        <div class="help-info" id="pesan3_pgw"> </div>

                    </div>
                    <div class="row">
                      
                        <div class="col-xs-12"> 
                          <center>  <input class="btn btn-block bg-cyan waves-effect" type="submit" value="Daftar" name="daftar"></center>
                        </div>

                        <br>

                        <center>Sudah Memiliki Akun ? <a href="<?=base_url('login')?>">Login.</a></center>
                    </div>
                  
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?=base_url();?>/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=base_url();?>/assets/plugins/bootstrap/js/bootstrap.js"></script>

<script>
$(document).ready(function(){
    
 
$("#formadd3").change(function(){ 

        var username = $("#username_pgw").val(); 
        var pass1 = $("#pass1_pgw").val();  
        var pass2 = $("#pass2_pgw").val(); 
        var cek1 = 1;
        var cek2 = 1;
        var cek3 = 1; 
 
          $.ajax({

                url:"<?php echo base_url(); ?>daftar/cekusername",
                method:"post", 
                data:{username:username},
                    success:function(data){     
                    if (data != ""){ 
                      cek1 = 0 ;
                      $('#pesan1_pgw').html(data); 
                    }else {
                      $('#pesan1_pgw').html(data); 
                      cek1 = 1 ;
                    }  
                  if (cek1 == 0 || cek2== 0 || cek3 == 0) {
                     $(':input[type="submit"]').prop('disabled', true);
                  } else {
                     $(':input[type="submit"]').prop('disabled', false);
                  }
                }
             });

          $.ajax({

                url:"<?php echo base_url(); ?>daftar/cekpass",
                method:"post", 
                data:{pass1:pass1},
                    success:function(data){ 
                     if (data != ""){ 
                      cek2 = 0 ;
                      $('#pesan2_pgw').html(data); 
                    }else {
                      $('#pesan2_pgw').html(data); 
                      cek2 = 1 ;
                    } 
                    if (cek1 == 0 || cek2== 0 || cek3 == 0) {
                     $(':input[type="submit"]').prop('disabled', true);
                  } else {
                     $(':input[type="submit"]').prop('disabled', false);
                  }
                }
             });
 
          $.ajax({

                url:"<?php echo base_url(); ?>daftar/cekpass2",
                method:"post", 
                data:{pass1:pass1,pass2:pass2},
                    success:function(data){
                     if (data != ""){ 
                      cek3 = 0;
                      $('#pesan3_pgw').html(data); 
                    }else {
                      $('#pesan3_pgw').html(data); 
                      cek3 = 1 ;
                    } 
                    if (cek1 == 0 || cek2== 0 || cek3 == 0) {
                     $(':input[type="submit"]').prop('disabled', true);
                  } else {
                     $(':input[type="submit"]').prop('disabled', false);
                  }

                 }
             });

          

            


        }); 


});
</script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url();?>/assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?=base_url();?>/assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?=base_url();?>/assets/js/admin.js"></script>
    <script src="<?=base_url();?>/assets/js/pages/examples/sign-in.js"></script>
</body>

</html>