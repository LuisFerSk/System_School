<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Reksai</title>
  <link rel="icon" href="wwwroot/Logoupc.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="res/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skin-green.min.css">
  <script src="dist/js/all.min.js"></script>
  <script src="res/js/jquery.min.js"></script>
  <script src="res/js/jquery.dataTables.min.js"></script>
  
</head>


<body class="hold-transition clearfix <?php if (isset($_SESSION["id"])) : ?>skin-green sidebar-mini<?php else : ?>login-page<?php endif; ?>">
  <?php if (isset($_SESSION["id"])) :
    $user = UserData::getById($_SESSION["id"]);
  ?>
    <div class="wrapper">
      <header class="main-header">
        <a href="./" class="logo">
          <span class="logo-mini"><b>UPC</b></span>
          <span class="logo-lg">Universidad Popular del Cesar</span>
        </a>
        <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <i class="fas fa-bars"></i>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="btn-group">
                <a class="btn" href="./?view=users&opt=user"><i class="fa fa-user fa-fw"></i> <?php echo $user->nombre; ?></a>
                <a class="btn" href="./?action=access&opt=logout">
                  <i class="fas fa-sign-out-alt"></i> Cerrar sesion
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <?php
          $user = null;
          $user = UserData::getById($_SESSION["id"]);
          ?>
          <ul class="sidebar-menu">
            <li><a href="./?view=index"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
            <li><a href="./?view=users&opt=userl"><i class="far fa-address-card"></i> <span>Información personal</span></a></li>
            <?php if (stristr($user->kind, '1')) : ?>
              <li><a href="./?view=periodo_academico&opt=all"><i class="fa fa-hourglass-end"></i> <span>Periodo academico</span></a></li>
              <li><a href="./?view=facultad&opt=all"><i class="fa fa-university"></i> <span>Facultades</span></a></li>
              <li><a href="./?view=programa&opt=all"><i class="fa fa-list-ol"></i> <span>Programas</span></a></li>
              <li><a href="./?view=asignatura&opt=all"><i class="fas fa-file-signature"></i> <span>Asignaturas</span></a></li>
              <li><a href="./?view=grupo&opt=all"><i class="fas fa-users"></i> <span>Grupo</span></a></li>
              <li><a href="./?view=estudiantes&opt=all"><i class="fas fa-graduation-cap"></i> <span>Estudiantes</span></a></li>
              <li><a href="./?view=profesores&opt=all"><i class="fa fa-suitcase"></i> <span>Profesores</span></a></li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-cogs"></i>
                  <span>Gestion de suarios</span>
                  <span class="pull-right-container">
                    <i class="fas fa-chevron-down pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="index.php?view=users&opt=all"><i class="fa fa-key"></i> Super-Usuario</a></li>
                  <li><a href="index.php?view=prof_tutor&opt=all"><i class="fa fa-user"></i> usuarios</a></li>
                </ul>
              </li>
            <?php endif;
            if (stristr($user->kind, '2')) : ?>
              <li><a href="./?view=asis"><i class="fa fa-users"></i> <span>Grupos</span></a></li>
            <?php endif;
            if (stristr($user->kind, '3')) : ?>
              <li><a href="./?view=asis"><i class="fa fa-users"></i> <span>Asistencia</span></a></li>
            <?php endif; ?>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <section class="content">
          <?php
          date_default_timezone_set('America/Lima');
          $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
          $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
          $fecha = date('g:ia');
          ?>
          <ol class="breadcrumb">
            <li><i class="far fa-calendar-alt"></i> <?php echo $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " " . date('Y') ?></li>
            <li><i class="far fa-clock"></i><?php echo " Hora: " . $fecha; ?></li>
          </ol>
          <div class="box">
            <?php
            View::load("index");
            ?>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 0.0.3
        </div>
      </footer>
      <div class="control-sidebar-bg"></div>
    </div>
  <?php else : ?>
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html">Universidad Popular del Cesar</a>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">Iniciar sesion</p>
        <form action="./?action=access&opt=login" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Email" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <button type="submit" class="btn btn-block btn-flat" style="background-color:green;">Entrar</button>
        </form>
      </div>
    <?php endif; ?>
    <script src="res/js/jquery.min.js"></script>
    <script src="res/bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="dist/js/moment.min.js"></script>
    
</body>

</html>