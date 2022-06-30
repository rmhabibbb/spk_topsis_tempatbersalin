
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
                <?php echo form_open('lupapassword/proses') ?> 
                <input type="hidden" name="email" value="<?=$email?>">
               <center> 
                <a href="<?=base_url('')?>"><h4 style="color:black">Verifikasi</h4> </a></center>
                    <div class="msg"> 
                    	
                <?= $this->session->flashdata('msg') ?>
                    </div> 
                    <div class="row">
                        <div class="col-xs-3">
                           <input onkeypress='validate(event)' maxlength="1" id="first" type="text" name="k1" class="form-control" style="text-align: center;">
                        </div>
                        <div class="col-xs-3">
                           <input onkeypress='validate(event)' maxlength="1" id="second" type="text" name="k2" class="form-control" style="text-align: center;">
                        </div>
                        <div class="col-xs-3">
                           <input onkeypress='validate(event)' maxlength="1" id="third" type="text" name="k3" class="form-control" style="text-align: center;">
                        </div>
                        <div class="col-xs-3">
                           <input onkeypress='validate(event)' maxlength="1" id="fourth" type="text" name="k4" class="form-control" style="text-align: center;">
                        </div> 
                        <div class="col-xs-12">
                          <center>  <input type="submit" class="btn btn-block bg-pink waves-effect" value="Verifikasi" name="proses"> </center>
                        </div>

                        <br>

                        <center>kirim ulang kode verifikasi anda ?  <span style="color : red" id="bataswaktu"></span><span style="color : blue" id="kirimulang"></span></center> 
                       
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
    <script type="text/javascript" src="<?=base_url();?>/assets/js/jquery.autotab.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#first').autotab({ target: '#second', format: 'numeric' });
        $('#second').autotab({ target: '#third', format: 'numeric', previous: '#first' });
        $('#third').autotab({ target: '#fourth', previous: '#third', format: 'numeric' });
    });
    </script>


    <script type="text/javascript">


        function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
    </script>


<script>
// Set the date we're counting down to

<?php $next_date = date('M j, Y H:i:s', strtotime($_SESSION['waktu_kirimulang'] .' +2 minutes')); ?>
var countDownDate = new Date("<?=$next_date?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("bataswaktu").innerHTML =   minutes + " : " + seconds ;
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("bataswaktu").innerHTML = "<a href='<?=base_url('lupapassword/kirimkodeulang')?>'>Kirim </a>";
  }
}, 1000);
</script>
</body>

</html>