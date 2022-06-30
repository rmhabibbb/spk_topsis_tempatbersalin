
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Lupa Password | SPK KLINIK KECANTIKAN</title>
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
                <?php echo form_open('lupapassword/proresreset') ?> 
                <input type="hidden" name="email" value="<?=$email?>">
               <center> 
                <a href="<?=base_url('')?>"><h4 style="color:black">Reset Password</h4> </a></center>
                    <div class="msg">
                    	
                <?= $this->session->flashdata('msg') ?>
                    </div>
                   <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="pass1_pgw"  placeholder="Password Baru" required>
                        </div>
                        <div class="help-info" id="pesan2_pgw"> </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password2" id="pass2_pgw" placeholder="Konfirmasi Password Baru" required>
                        </div>
                        <div class="help-info" id="pesan3_pgw"> </div>

                    </div>
                    <div class="row">
                      
                        <div class="col-xs-12"><center>  <input type="submit" class="btn btn-block bg-pink waves-effect" value="Submit" name="proses"> </center>
                        </div>

                        <br>

                        <center><a href="<?=base_url('login')?>">Batal</a></center> 
                    </div>
                  
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?=base_url();?>/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=base_url();?>/assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url();?>/assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?=base_url();?>/assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?=base_url();?>/assets/js/admin.js"></script>
    <script src="<?=base_url();?>/assets/js/pages/examples/sign-in.js"></script>
</body>

</html>