<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Ionicons Bootstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="admin/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  
  <!-- iCheck bootstrap-->
  <link rel="stylesheet" href="admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="admin/assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="admin/assets/plugins/summernote/summernote-bs4.min.css">
<style>
        body {
            font-family: Arial, sans-serif;
        }
        .hero {
            background: url('https://via.placeholder.com/1920x600') no-repeat center center;
            background-size: cover;
            height: 600px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero h1 {
            font-size: 4em;
            margin: 0;
        }
        .features .feature {
            padding: 30px;
            text-align: center;
        }

    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <div class="dropdown">
       <?php if(isset($_SESSION['auth'])) :?>
        <a class="nav-link" data-toggle="dropdown" href="#">
          <?= $_SESSION['auth_user']['user_name']; ?>
        </a>
        <?php endif ?>
        
      <?php if(!isset($_SESSION['auth'])) :?>
        <a class='nav-link text-primary' href='login.php' role"button" class='text-center'><i class="bi bi-box-arrow-right"></i> Login</a>
         <?php endif ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="admin/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Apna Catalogue</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <?php if(isset($_SESSION['auth'])) :?>
        <div class="image">
          <img src="<?php if(isset($_SESSION['auth_user']['image-url'])){ echo $_SESSION['auth_user']['image-url'];} else{
            echo "admin/assets/dist/img/user2-160x160.jpg";
          }
          ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
        <?= $_SESSION['auth_user']['user_email']; ?>
          </a>
        </div>
         <?php endif ?>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <?php if(isset($_SESSION['auth'])) :?>
          <li class="nav-item">
            <a href="user_dashbord/index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Profile
                <span class="badge badge-info right">1</span>
              </p>
            </a>
          </li>
           <li class="nav-item">
           <div class="bg-dark-subtle">
         <form action="user_dashbord/include/logout.php" method="post">
         <button type="submit" class="dropdown-item text-danger" name="logout_btn"> 
           <i class="nav-icon fas fa-power-off"></i> logout
         </button>
       </form>
         </div>
      </li>
          <?php endif ?>
          <li class="nav-header">SETTINGS</li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon fas fa-phone"></i>
              <p>
                Contact
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Contact Us
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon fas fa-shield-alt"></i>
              <p>
                Privacy Policy
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon fas fa-file-contract"></i>
              <p>
                Terms & Condition
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
      <!-- Main Sidebar Container end-->
      
  <div class="content-wrapper">
        <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            <h1>Welcome to Our Website</h1>
            <p class="lead">We provide the best services for you.</p>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container my-5">
        <div class="row features">
            <div class="col-md-4 feature">
                <i class="fa fa-cogs fa-3x mb-3" aria-hidden="true"></i>
                <h3>Feature One</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac libero a neque luctus interdum.</p>
            </div>
            <div class="col-md-4 feature">
                <i class="fa fa-cloud fa-3x mb-3" aria-hidden="true"></i>
                <h3>Feature Two</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac libero a neque luctus interdum.</p>
            </div>
            <div class="col-md-4 feature">
                <i class="fa fa-heart fa-3x mb-3" aria-hidden="true"></i>
                <h3>Feature Three</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac libero a neque luctus interdum.</p>
            </div>
        </div>
    </div>
</div><!--content-wrapper-->


<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="admin/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="admin/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->
<script src="admin/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="admin/assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="admin/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="admin/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="admin/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="admin/assets/plugins/moment/moment.min.js"></script>
<script src="admin/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="admin/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/assets/dist/js/adminlte.js"></script>

</body>
</html>