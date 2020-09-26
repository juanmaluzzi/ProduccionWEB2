<!DOCTYPE html>
<html lang="es">

<head>
  <title>Wines &mdash; Website Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
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
    
   

    <div class="site-section mt-5"> 
      <div class="container">

        <div class="row mb-5">
          <div class="col-12 section-title text-center mb-5">
            <h2 class="d-block ">Nuestros Productos</h2>
            </div>
             <!-- The sidebar -->
             <div class="row col-lg-3">
             <?php
                include_once 'inc/sidebar.php';
             ?>
  </div>
  
          <!-- The sidebar -->
          
          
        </div>

        <div class="container">
        <div class="row lg-4">
          
          <?php
      
                ///////LISTADO DE PRODUCTOS SHOP.PHP
                
				foreach($Productos->getProductos($_GET) as $productos){ 	
                
			?>
     
            <div class="col-lg-4 mb-5 col-md-6">
            <div class="wine_v_1 text-center pb-4">
            
              <a href="shopproducto.php?productos=<?php echo $productos['id_producto']?>" class="thumbnail d-block mb-4"><img src="images/<?php echo $productos['id_producto']?>/<?php echo $productos['id_producto']?>.png" alt="Image" class="img-fluid"></a>
              <div>
                <h3 class="heading mb-1"><?php echo $productos['nombre']?></h3>
                <span class="price">$ <?php echo $productos['precio']?></span>
              </div>
              

              <div class="wine-actions">

              
                  
                <h3 class="heading-2"><?php echo $productos['marcas_id']?></h3>
                <p class="heading-2"><?php echo $productos['nombre']?></p>
                <span class="price d-block"><?php echo $productos['precio']?></span>
                
                <div class="rating">
                <?php
                switch ($productos['raiting']) {
                     case "1":
                               echo '<span class="icon-star"></span>
                               <span class="icon-star-o"></span>
                               <span class="icon-star-o"></span>
                               <span class="icon-star-o"></span>
                               <span class="icon-star-o"></span>'
                               ;
                               break;


                               case "2":
                                echo '<span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star-o"></span>
                                <span class="icon-star-o"></span>
                                <span class="icon-star-o"></span>'
                                ;
                             break;

                             case "3":
                              echo '<span class="icon-star"></span>
                              <span class="icon-star"></span>
                              <span class="icon-star"></span>
                              <span class="icon-star-o"></span>
                              <span class="icon-star-o"></span>'
                              ;
                             break;
                              case "4":
                                echo '<span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star"></span>
                                <span class="icon-star-o"></span>'
                                ;
                             break;
                             case "5":
                              echo' <span class="icon-star"></span>
                              <span class="icon-star"></span>
                              <span class="icon-star"></span>
                              <span class="icon-star"></span>
                              <span class="icon-star"></span>'
                              ;
                            break;
                                }
                                ?>
              
                            </div>
                
                <a href="shopproducto.php?productos=<?php echo $productos['id_producto']?>" class="btn add">Ver Producto</a>
                </div>
              </div>
              
            </div>
            <?php 
             }?>
          </div>
      </div>
    </div>
    

  </div>




<?php
	include_once('inc/footer.php');
?>
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