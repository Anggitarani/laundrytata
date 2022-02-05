<?php 
session_start();
if (isset($_SESSION['role'])) {
  header("location:index.php");
}
require 'koneksi.php';

if (isset($_POST['login'])) {

  $username=$_POST['username'];
  $password=md5($_POST['password']);

  $cek=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
  $num=mysqli_num_rows($cek);
  if ($num) {
      $data=mysqli_fetch_assoc($cek);
      $_SESSION['username']=$username;
      $_SESSION['role']=$data['role'];
      $_SESSION['id_user']=$data['id_user'];
      header("location:index.php");
  }else{
    $error=true;
  }
}

 ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>Laundry Kita</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />    
     <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="assets/plugins/magic/magic.css" />
     <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />  
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
      <body style="background: #eee;">
   <!-- PAGE CONTENT --> 
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          
        </div>
        <div class="col-lg-4 btn btn-sm btn-info" style="margin-bottom: 1%;padding: 0.8%;">
          LOGIN SYSTEM <span class="pull-right"><i class="icon-home"></i></span>
        </div>
      </div>
    <div class="row">
      <div class="col-lg-4">
        
      </div>

      <div class="col-lg-4" style="background: white;box-shadow: 1px 3px 7px 2px #000;">
       <!--  <button class="form-control btn btn-sm btn-success"></button> -->
            <form method="POST">
            <center><img src="gambar/logo5.jpg" class="img-circle" width="100" style="margin-top: 5%;"></center><br>
            <?php if (!isset($error)): ?>
               <p align="center" style="padding-top: 5%;color: grey;">
              Silahkan Login
            </p>
            <?php endif ?>
            <?php if (isset($error)): ?>
               <p align="center" class="text-danger" style="padding-top: 5%;">
              Password atau Username Salah.
            </p>
            <?php endif ?>
                                       
                <input type="text" placeholder="Masukkan Username.." name="username" class="form-control" style="margin-top: 5%;">
                <input type="password" placeholder="Masukkan Password" name="password" class="form-control" style="margin-top: 4%;">
                <button class="btn text-muted form-control text-center btn-danger" name="login" type="submit" style="margin-top: 4%;">Sign in</button>
                
                  <p align="center" style="padding-top: 12%;">
                    <b>Powered By</b> <span style="color: grey;">-Laundry Kita</span>
                  </p>
                  <p align="center" style="color: grey;">
                    &copy; 2021 LaunRPL-1
                  </p>
               
            </form>
        
      </div>
    </div>   
   
</div>

    <!--END PAGE CONTENT -->     
        
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
   <script src="assets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>