<?php
session_start();
      if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
            header("location: login.php");
        exit;
            }
        /* Connect To Database*/
        require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
        require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos

$id_user=$_SESSION['user_id'];
$sql_user=mysqli_query($con,"SELECT * FROM users WHERE user_id=".$id_user."");
$array_user=mysqli_fetch_array($sql_user);
$full_name_user= $array_user['firstname']." ".$array_user['lastname'];
?>
<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Centro Ferreteria Bacilio | <?php echo $title;?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel=icon href='img/logo-icon.png' sizes="32x32" type="image/png">

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="facturas.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>C</b>FB</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg" style="font-size:1.5rem"><b>Centro Ferreteria </b>Bacilio</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="img/avatar_2x.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $full_name_user; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="img/avatar_2x.png" class="img-circle" alt="User Image">

                    <p>
                      <?php echo $full_name_user; ?> 
                      <small><?php echo date("Y-m-d H:i:s"); ?></small>
                    </p>
                  </li>
                 <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="login.php?logout" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <?php include ('view/_sidebar.php'); ?>
      <!-- =============================================== -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1><?php echo $title;?></h1>
      </section>
