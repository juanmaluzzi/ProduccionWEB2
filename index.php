<!DOCTYPE html>
<html lang="es">

<?php

$seccion = $_GET["seccion"];
if($seccion == null){
$seccion = "home";
}
?>

<head>
  <title>Wines Co.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="favicon.png" />
  
  <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700|Montserrat:400,700|Roboto&display=swap" rel="stylesheet"> 

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  
  <!--HEADER-->
  <?php
      include_once 'inc/header.php';
  ?>

    <!--HEADER-->

    <?php

    // si es index.php entonces mandame a index.php?secciones/home
      if($_GET["seccion"]=="home"){
      require_once("secciones/home.php");}
      elseif($_GET["seccion"]=="contacto"){
      require_once("secciones/contacto.php");}
      elseif($_GET["seccion"]=="shop"){
      require_once("secciones/shop.php");}
      elseif($_GET["seccion"]=="shopproducto"){
      require_once("secciones/shopproducto.php");}
      elseif($_GET["seccion"]== "nosotros"){
      require_once("secciones/nosotros.php");}
      elseif($_GET["seccion"]== "usuarios"){
      require_once("secciones/usuarios.php");}
      elseif($_GET["seccion"]== "logusuario"){
      require_once("secciones/logusuario.php");}
      elseif($_GET["seccion"]== "login"){
        require_once("secciones/login.php");}
        elseif($_GET["seccion"]== "logout"){
          require_once("secciones/logout.php");}
      else{
      require_once("secciones/home.php");
      };
      ?>

        <!--FOOTER-->
    <?php
        include_once 'inc/footer.php';
        ?>
         <!--FOOTER-->
      </div>
    </div>
    

  </div>
  <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>




  <script src="js/main.js"></script>

</body>

</html>