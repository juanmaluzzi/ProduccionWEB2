<?php 

    require_once 'inc/mysql_login.php'; 
     require_once('clases/productos.php');
     require_once('clases/marca.php'); 
      require_once('clases/cepa.php');
      require_once('clases/categoria.php');
    
     
     

  
  //  try { 
           $con = new PDO ('mysql:host='.$hostname.';dbname='.$database.';port='.$puerto, $username, $password);

 /*     print "conexion buena";
       } */

   /*     catch (PDOException $e)    { 
        print "!NO CONECTA: " .$e->getMessage();

        die ();
        } */
        
    $Productos = new Productos($con);
    $Marca = new Marca($con);
     $Cepa = new Cepa($con);
     $Categoria = new Categoria($con);

 date_default_timezone_set('America/Argentina/Buenos_Aires');
?>
 <div class="site-wrap">

<div class="site-mobile-menu site-navbar-target">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div>

<div class="header-top">

<!-- session start para mostrar el usuario!  -->
<?php 
session_start();
if (isset($_SESSION['user_id'])){

  $base = $con -> prepare('SELECT id,usuario,password FROM usuarios_cl WHERE id=:id');
  $base -> bindParam(':id',$_SESSION['user_id']);
  $base -> execute();
  $rta = $base->fetch (PDO::FETCH_ASSOC);

  $user = null;

  if (count($rta)>0){

    $user = $rta;
  }

} 
?>
<!-- INICIAR SESION/ REGISTRO / LOGOUT BOTONESSSSS -->
<?php  

       if (!empty($user)): ?>
<div class="text-right mr-3 pt-3 text-black">
    Bienvenido <?= $user['usuario'] ?>
    </div>
    <button class="btn mt-3 float-right mr-3 " type="button">
     <a href="index.php?seccion=logout">Desconectarse</a>
    </button>

       <?php else:?>

      <button class="btn mt-3 float-right mr-3 " type="button">
      <a href="index.php?seccion=usuarios">Registrarse</a>
      </button>
      <button class="btn mt-3 float-right mr-3 " type="button">
      <a href="index.php?seccion=login">Iniciar sesión</a>
      </button>
          <?php 
      endif;?>
  
 <!-- <button class="btn mt-3 float-right mr-3 " type="button">
<a href="index.php?seccion=usuarios">Registrarse</a>
</button>
<button class="btn mt-3 float-right mr-3 " type="button">
<a href="index.php?seccion=login">Iniciar sesión</a>
</button>

-->

  <div class="container">
         
  

    <div class="row align-items-center">
      <div class="col-12 text-center">
        <a href="index.php?seccion=home" class="site-logo">
          <img src="images/logo.png" alt="Image" class="img-fluid">
        </a>
      </div>
      <a href="#" class="mx-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
            class="icon-menu h3"></span></a>
    </div>
  </div>
  
  <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

  <div class="container">

    <div class="d-flex align-items-center">
      
      <div class="mx-auto">
        <nav class="site-navigation position-relative text-left" role="navigation">
          <ul class="site-menu main-menu js-clone-nav mx-auto d-none pl-0 d-lg-block border-none">
            <li><a href="index.php?seccion=home" class="nav-link text-left">Inicio</a></li>
            <li><a href="index.php?seccion=nosotros" class="nav-link text-left">Nosotros</a></li>
            <li><a href="index.php?seccion=shop" class="nav-link text-left">Vinos</a></li>
            <li><a href="index.php?seccion=contacto" class="nav-link text-left">Contacto</a></li>
          </ul>                                                                                                                                                                                                                                                                                         
        </nav>

      </div>
     
    </div>
  </div>

</div>

</div>
