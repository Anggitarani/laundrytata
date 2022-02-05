<?php 
session_start();
if (!isset($_SESSION['role'])) {
    header("location:login.php");
}
require 'koneksi.php';
$pelanggan=mysqli_query($koneksi,"SELECT * FROM tb_user");
$paket=mysqli_query($koneksi,"SELECT * FROM tb_paket");
$det=mysqli_query($koneksi,"SELECT * FROM tb_detail_transaksi");
$transaksi=mysqli_query($koneksi,"SELECT * FROM tb_transaksi");
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
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />  
    <?php if (!isset($_GET['detail_transaksi']) AND !isset($_GET['laporan'])): ?>
         <link href="assets/css/layout2.css" rel="stylesheet" />
     <?php endif ?> 
    
       <link href="assets/plugins/flot/examples/examples.css" rel="stylesheet" />   
        <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap" >
        

        <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top" style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="index.html" class="navbar-brand">
                    <img src="gambar/logoa.png" alt="" />
                        
                        </a>
                </header>
                <!-- END LOGO SECTION -->
          

            </nav>

        </div>
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
       <div id="left">
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" width="100" alt="User Picture" src="gambar/kasir.png" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> <?php echo $_SESSION['username'] ?></h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> <?php echo $_SESSION['role'] ?>
                           
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">

                
                <li class="panel active">
                    <a href="index.html" >
                        <i class="icon-table"></i> Dashboard
	   
                       
                    </a>                   
                </li>

                <?php if ($_SESSION['role']!=="owner"): ?>  
                <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                        <i class="icon-pencil"></i> Form Register
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-success">5</span>&nbsp;
                    </a>
                    <ul class="collapse" id="form-nav">
                        <?php if ($_SESSION['role']=="admin"): ?>
                             <li class=""><a href="index.php?user"><i class="icon-angle-right"></i> Registrasi Pengguna </a></li>
                        <?php endif ?>                         
                        <li class=""><a href="index.php?reg_pelanggan"><i class="icon-angle-right"></i> Registrasi Pelanggan </a></li>         
                    </ul>
                </li>
                <?php endif; ?> 

                <?php if ($_SESSION['role']=="admin"): ?>
                    <li><a href="index.php?add_paket"><i class="icon-film"></i> Tambah Data Paket </a></li> 
                <?php endif ?>       
                <?php if ($_SESSION['role']!=="owner"): ?>
                    <li><a href="index.php?transaksi"><i class="icon-columns"></i> Data Transaksi </a></li>                                 
                <?php endif ?>   
                <?php if ($_SESSION['role']!=="owner"): ?>                                              
                 <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav">
                        <i class="icon-check-empty"></i> Daftar Pemesanan
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                         &nbsp; <span class="label label-success">2</span>&nbsp;
                    </a>
                    <ul class="collapse" id="blank-nav">
                       
                        <li><a href="index.php?lunas"><i class="icon-angle-right"></i> Data Pesanan Dibayar  </a></li>
                        <li><a href="index.php?belumLunas"><i class="icon-angle-right"></i> Data Pesanan Belum Dibayar  </a></li>
                    </ul>
                </li>
            <?php endif ?>
                <!-- <li><a href="tables.html"><i class="icon-table"></i> Generate Laporan </a></li> -->
                <li><a href="login.php"><i class="icon-signin"></i> Login Page </a></li>
                <li><a href="logout.php"><i class="icon-signout"></i> Logout Page </a></li>

            </ul>

        </div>
        <!--END MENU SECTION -->



        <!--PAGE CONTENT -->
        <div id="content">
             
            <div class="inner">
               
                  <hr />
                 <!--BLOCK SECTION -->
                 <div class="row">
                    <div class="col-lg-12">
                        <div style="text-align: center;">
                           
                           <?php if ($_SESSION['role']!=="owner"): ?>
                                <a class="quick-btn" href="index.php?pelanggan">
                                <i class="icon-check icon-2x"></i>
                                <span> Pelanggan</span>
                                <span class="label label-danger"><?php echo mysqli_num_rows($pelanggan); ?></span>
                            </a>
                            <?php if ($_SESSION['role']=="admin"): ?>
                                 <a class="quick-btn" href="index.php?paket">
                                <i class="icon-envelope icon-2x"></i>
                                <span>Data Paket</span>
                                <span class="label label-success"><?php echo mysqli_num_rows($paket); ?></span>
                            </a>
                            <?php endif ?>                           
                            <a class="quick-btn" href="index.php?detail_transaksi">
                                <i class="icon-signal icon-2x"></i>
                                <span>Det Transaksi</span>
                                <span class="label label-warning"><?php echo mysqli_num_rows($det); ?></span>
                            </a>   
                           <?php endif ?>                                                   
                            <a class="quick-btn" href="index.php?laporan">
                               <i class="icon-table icon-2x"></i>
                                <span>Laporan</span>
                                <!-- <span class="label label-default">20</span> -->
                            </a>

                            
                            
                        </div>

                    </div>

                </div>
                  <!--END BLOCK SECTION -->
                <hr />
                   <!-- CHART & CHAT  SECTION -->
               
                 <!--END CHAT & CHAT SECTION -->
                 <!-- COMMENT AND NOTIFICATION  SECTION -->
              
                <!-- END COMMENT AND NOTIFICATION  SECTION -->
                

                

                 <!--  STACKING CHART  SECTION   -->
             
                 <!--END STACKING CHART SCETION  -->

                 <!--TABLE, PANEL, ACCORDION AND MODAL  -->
                         
                 <!--TABLE, PANEL, ACCORDION AND MODAL  -->
                 <?php if (isset($_GET['pelanggan'])): ?>
                     <?php include 'pelanggan/pelanggan.php'; ?>
                 <?php endif ?>
                 <?php if (isset($_GET['reg_pelanggan'])): ?>
                     <?php include 'pelanggan/reg_pelanggan.php'; ?>
                 <?php endif ?>
                <?php if (isset($_GET['paket'])): ?>
                     <?php include 'paket/paket.php'; ?>
                 <?php endif ?>
                 <?php if (isset($_GET['add_paket'])): ?>
                     <?php include 'paket/tambah_paket.php'; ?>
                 <?php endif ?>
                  <?php if (isset($_GET['user'])): ?>
                     <?php include 'pengguna/user.php'; ?>
                 <?php endif ?>
                   <?php if (isset($_GET['transaksi'])): ?>
                     <?php include 'transaksi/transaksi.php'; ?>
                 <?php endif ?>
                  <?php if (isset($_GET['tambah_transaksi'])): ?>
                     <?php include 'transaksi/tambah_transaksi.php'; ?>
                 <?php endif ?>
                 <?php if (isset($_GET['detail_transaksi'])): ?>
                     <?php include 'transaksi/detail_transaksi.php'; ?>
                 <?php endif ?>
                 <?php if (isset($_GET['tambah_detail_transaksi'])): ?>
                     <?php include 'transaksi/tambah_detail_transaksi.php'; ?>
                 <?php endif ?>
                 <?php if (isset($_GET['ubahPelanggan'])): ?>
                     <?php include 'pelanggan/ubah_pelanggan.php'; ?>
                 <?php endif ?>
                  <?php if (isset($_GET['ubahPengguna'])): ?>
                     <?php include 'pengguna/ubah_user.php'; ?>
                 <?php endif ?>
                 <?php if (isset($_GET['ubahPaket'])): ?>
                     <?php include 'paket/ubah_paket.php'; ?>
                 <?php endif ?>
                 <?php if (isset($_GET['ubahTransaksi'])): ?>
                     <?php include 'transaksi/ubah_transaksi.php'; ?>
                 <?php endif ?>
                 <?php if (isset($_GET['ubahDetailTransaksi'])): ?>
                     <?php include 'transaksi/ubah_detail_transaksi.php'; ?>
                 <?php endif ?>                
                  <?php if (isset($_GET['laporan'])): ?>
                     <?php include 'laporan/laporan.php'; ?>
                 <?php endif ?>   
                 <?php if (isset($_GET['lunas'])): ?>
                     <?php include 'lunastidaklunas/lunas.php'; ?>
                 <?php endif ?>   
                 <?php if (isset($_GET['belumLunas'])): ?>
                     <?php include 'lunastidaklunas/belum_lunas.php'; ?>
                 <?php endif ?>   
                
            </div>

        </div>
        <!--END PAGE CONTENT -->

         <!-- RIGHT STRIP  SECTION -->
       
         <!-- END RIGHT STRIP  SECTION -->
    </div>

    <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->


    <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
     <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="assets/plugins/flot/jquery.flot.time.js"></script>
     <script  src="assets/plugins/flot/jquery.flot.stack.js"></script>
    <script src="assets/js/for_index.js"></script>
   
    <!-- END PAGE LEVEL SCRIPTS -->


</body>

    <!-- END BODY -->
</html>
