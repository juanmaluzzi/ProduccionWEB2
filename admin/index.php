<!doctype html>
<html lang="es">
<head>
  <title>Wines Co.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="../favicon.png" />
  <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700|Montserrat:400,700|Roboto&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="../fonts/icomoon/style.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="../css/aos.css">
  <link href="../css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../css/style.css">

  <?php 


if(!isset($_GET['seccion'])):
  $_GET['seccion'] = '';
endif;

$seccion = $_GET['seccion'];

require_once '../inc/mysql_login.php'; 
require_once '../inc/config.php'; 
require_once('../clases/productos.php');
require_once('../clases/marca.php'); 
require_once('../clases/cepa.php');
require_once('../clases/categoria.php');
require_once('../clases/usuario.php');
    
$Productos = new Productos($con);
$Marca = new Marca($con);
$Cepa = new Cepa($con);
$Categoria = new Categoria($con);
$Usuario = new Usuario($con);
if(isset($_SESSION['estado']) && $_SESSION['estado'] == 'logueado'){
  $log = 'in';
}else{
  $log = 'off';
}
$i = 0;

?>
</head>
  <body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand col-5" href="../index.php"><h1>Wines CO.</h1></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
<?php
 if($log == 'in'){
?>
  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
     <ul class="navbar-nav">
    <?php
if($Usuario->validarPermiso($_SESSION['usuario']['perfil'],'ABMPROD')){
    ?>
        <li class="nav-item <?= $seccion == "listado_prod" ? "active" : ""; ?>">
        <a class="nav-link" href="index.php?seccion=listado_prod">Listado de productos</a>
      </li> 
        <li class="nav-item <?= $seccion == "nuevo_prod" ? "active" : ""; ?>">
        <a class="nav-link" href="index.php?seccion=nuevo_prod">Cargar nuevo producto</a>
      </li>
      <?php
}
if($Usuario->validarPermiso($_SESSION['usuario']['perfil'],'ABMUSR')){
?>
      <li class="nav-item <?= $seccion == "abmusuarios" ? "active" : ""; ?>">
        <a class="nav-link" href="index.php?seccion=abmusuarios">Listado de usuarios</a>
      </li>

<?php }
if($Usuario->validarPermiso($_SESSION['usuario']['perfil'],'ABMCOM')){
  
  ?>
        <li class="nav-item <?= $seccion == "listado_comentarios" ? "active" : ""; ?>">
        <a class="nav-link" href="index.php?seccion=listado_comentarios">Listado de comentarios</a>
      </li>

 
       <li class="nav-item">
          <a href="index.php" class="nav-link">Volver</a>
      </li>

<?php
}
} ?>

    </ul>
  </div> 
</nav>

<!--*********************FIN DEL NAV*************************-->
<main class="mt-2 pt-0">
<?php

    if($_GET["seccion"]=="listado_prod" && $Usuario->validarPermiso($_SESSION['usuario']['perfil'],'ABMPROD')){
    require_once("secciones/listado_prod.php");
    }
    elseif($_GET["seccion"]=="nuevo_prod" && $Usuario->validarPermiso($_SESSION['usuario']['perfil'],'ABMPROD')){
    require_once("secciones/nuevo_prod.php");
    }
    elseif($_GET["seccion"]=="editar_producto" && $Usuario->validarPermiso($_SESSION['usuario']['perfil'],'ABMPROD')){
      require_once("secciones/editar_producto.php");
    }  
    elseif($_GET["seccion"]=="abmusuarios" && $Usuario->validarPermiso($_SESSION['usuario']['perfil'],'ABMUSR')){
      require_once("secciones/abmusuarios.php");
    }
    elseif($_GET["seccion"]=="crearusr" && $Usuario->validarPermiso($_SESSION['usuario']['perfil'],'ABMUSR')){
      require_once("secciones/crear_usuario.php");
    }       
    elseif($_GET["seccion"]=="listado_comentarios" && $Usuario->validarPermiso($_SESSION['usuario']['perfil'],'ABMCOM')){
      require_once("secciones/listado_comentarios.php");
    }

                  if($log == 'in' && $_GET['seccion'] == ''){
                
                ?>
      <div class="container">
    <div class="row text-light justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card bg-dark my-5">
                <div class="card-body border-white">
                    <form action="acciones/logout.php" method="post">
                            <div class="row justify-content-center">
                              <div class="col-12 col-md-6">
                                  <h2 class="text-center my-2">Bienvenida/o <?= $_SESSION['usuario']['nombre'] ?></h2>
                              </div>
                            </div>

                        <button type="submit" class="btn btn-outline-light d-block m-auto">Cerrar sesión</button>
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>
<?php
                                 }
                                 elseif($log != 'in' && $_GET['seccion'] == ''){require_once('secciones/loginbox.php');}
                  ?>
           
      </main>
 <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>

  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/jquery.countdown.min.js"></script>
  <script src="../js/bootstrap-datepicker.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.fancybox.min.js"></script>
  <script src="../js/jquery.sticky.js"></script>
  <script src="../js/jquery.mb.YTPlayer.min.js"></script>




  <script src="../js/main.js"></script>

  </body>
</html>