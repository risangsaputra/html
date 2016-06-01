<?php 
  session_start();
  error_reporting(0);
  $user=$_SESSION['username'];



                        include "../koneksi.php";  
                        $sql="SELECT * FROM admin WHERE username='$user'";
                        $qry=mysqli_query($konek,$sql);
                        while ($data=mysqli_fetch_array($qry)) {
                        $gambar   =$data['gambar'];
                        $nama     =$data['nama'];
                        $level    =$data['level'];
                        $email    =$data['email'];
                        $id_admin =$data['id_admin'];
                        $username =$data['username'];
                        
   }     
  if (empty($_SESSION['username'])) {
      include 'login.php';
    } 
    else { 
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RSS-MON</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <script src="dist/js/sweetalert.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="dist/css/sweetalert.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>R</b>SS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>RSS</b>MON</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="gambar/<?php echo "$gambar";  ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="gambar/<?php echo "$gambar";  ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo "$nama"; ?> <br> Network Engineer
                  <small>Born 11 December 1994</small>
                </p>
              </li>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="?act=profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="gambar/<?php echo "$gambar";  ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li <?php if($_GET['act']==''){
              echo "class='active treeview'";
            }
              echo "class='treeview'";
            ?> >
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
         <li <?php if($_GET['act']=='profile'){
              echo "class='active treeview'";
            }
              echo "class='treeview'";
            ?> >
          <a href="?act=profile">
            <i class="fa fa-user"></i> <span>Profile</span>
          </a>
        </li>
        <li <?php if($_GET['act']=='tambah_router'){
              echo "class='active treeview'";
            }
              echo "class='treeview'";
            ?> >
          <a href="tambah_router.php">
            <i class="fa fa-plus-circle"></i> <span>Add Router</span>
          </a>
        </li>
        <li <?php if($_GET['act']=='monitor'){
              echo "class='active treeview'";
            }
              echo "class='treeview'";
            ?> >
          <a href="?act=monitor">
            <i class="fa fa-desktop"></i> <span>Traffic</span>
          </a>
        </li>
        <li <?php if($_GET['act']=='data_user'){
              echo "class='active treeview'";
            }
              echo "class='treeview'";
            ?> >
          <a href="#">
            <i class="fa fa-user-plus"></i>
            <span>Add User</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="?act=data_user"><i class="fa fa-caret-right"></i> Data User</a></li>
              <?php if ($level==1) {
              echo 
              "<li><a href='?act=user_input'><i class='fa fa-caret-right'></i> Add User</a></li>";
                          } 
              ?>
            
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
          <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Host</span>
              <span class="info-box-number">
                <?php 
                      $result = mysqli_query($konek,"SELECT * FROM router");
                      $num_rows = mysqli_num_rows($result);

                      echo "$num_rows Router";
                ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-server"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Server Status</span>
             <span class='info-box-number green'>Connect</span> 
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Admin</span>
              <span class="info-box-number">
                <?php 
                      $result = mysqli_query($konek,"SELECT * FROM admin");
                      $num_rows = mysqli_num_rows($result);

                      echo "$num_rows";
                ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

          <?php
            //!--Home--
            $page = @$_GET['act'];
            //$page = str_replace(".html","",$page); //menghilangkan ekstensi menjadi .html
            $file = "dashboard.php";
            if(!file_exists($file)) {
                include("dashboard.php");
            } else if ($page =="" || $page == "") {
                include("dashboard.php"); //memanggil file yang diinclude
            } else {
                include("$page.php");
            }
            ?>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
<?php } ?>