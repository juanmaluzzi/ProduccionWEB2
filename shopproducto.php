<!DOCTYPE html>
<html lang="es">

<head>
  <title>Wines &mdash; Website Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
  <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700|Montserrat:400,700|Roboto&display=swap" rel="stylesheet"> 

  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

      
if(isset($_POST['enviarcoment']))
{
    
    // POST DE DATOS
    $data = $_POST;
    unset($data['enviarcoment']); // SACO EL ENVIARCOMENT PARA QUE NO APAREZCA BOTON
    $data['Fecha'] = date('d/m/Y H:i:s'); 
    $indexComentario = date ('YmdHis');
    
    if (file_exists('comentarios.json')){
        
        $comentarioJson = file_get_contents('comentarios.json');
        $comentarioArray = json_decode($comentarioJson,true);
        
    } else {
        
         $comentarioArray = array();
        
    }
    
    
  
$comentarioArray[$indexComentario] = $data;
    
    
  
    
 $fp = fopen('comentarios.json','w'); 
    
 fwrite($fp,json_encode($comentarioArray));
    
 fclose($fp);

}
    

  ?>

    <!--HEADER-->


    <!--Display de producto-->
    <div class="site-section py-5 custom-border-bottom" data-aos="fade">
      <div class="container" >
        <div class="row pt-5">
          <div class="col-md-6">
          <?php 
       
          
        
         

				foreach($Productos->getProductos() as $productos){ 

					if($productos['id_producto'] == $_GET['productos']){
						break;
					} 
        }
            

         
         
			foreach($Marca->getMarca() as $marca){ 

         
					
        }
       

         foreach($Cepa->getCepa() as $cepa){

        
					
				}
			?>
            <div class="block-16">
              <figure  aling="center" >

                <img src="images/<?php echo $productos['id_producto']?>/<?php echo $productos['id_producto']?>.png" alt="Image placeholder" class="img-fluid" >
    
              </figure>
            </div>
          </div>
         
          <div class="col-md-5">
    
    
            <div class="site-section-heading ">
              <h2 class="text-black font-heading-serif mb-0"><?php echo $productos['nombre'] ?></h2>            
             <h2 class="text-black font-heading-serif mb-0"><?php echo $marca['marca']?> </h2>
              <h3 class="text-black font-heading-serif mb-0"><?php echo $cepa['cepa'] ?></h3>
              <div class="size">$ <?php echo $productos['precio'] ?></div>
                     <div class="star rating">
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
                              echo '<span class="icon-star"></span>
                              <span class="icon-star"></span>
                              <span class="icon-star"></span>
                              <span class="icon-star"></span>
                              <span class="icon-star"></span>'
                              ;
                           break;
                    } 
?>
                </div>
               </div>
            <p class="pb-1 mt-1"><?php echo $productos['descripcion'] ?></p>
            </div>
            
   <!--Display de producto -->
          
          
          <!--CAJA COMENTARIOS -->
          <div class="container-fluid">
            <h2 class="secction-tittle ml-5 pt-5 font-size: 12px;" style="color: black">¡Dejanos tu comentario!</h2>
            <div class="container pt-2">
            <div class="row">
            
            
          
           <form  method="post" class="pl-5">
              
             
              <div class="row-fluid">
                  <div class="form-group pl-2" style="font-size: 12px">
                      <label for="email">Email</label>
                      <input name="Email" type="email" class="form-control form-control-lg" required>
                  </div>               
              </div>
              
              
              
              <div class="row-fluid">
                  <div class="form-group pl-2" style="font-size: 12px">
                      <label for="mensaje">Mensaje</label>
                      <textarea name="Comentario" id="mensaje" cols="80" rows="5" class="form-control" required></textarea>
                  </div>
              </div>

            
            <div class="row">
                 <div class="form group pl-4">
                 <label for="product">¿Qué puntuación le das?</label>
                 <br>
                  <select class="form-group form-control-lg " name="rankeo" class="form-control-lg">
                     <option value="0">------</option>
                      <option value="1">★</option>
                      <option value="2">★★</option>
                      <option value="3">★★★</option>
                      <option value="4">★★★★</option>
                      <option value="5">★★★★★</option>
     
                  </select>
                </div>
                
                <input type="hidden"  class="input-xlarge" name="id_producto" value="<?php echo $_GET['productos']?>"/>
                  
                  
              </div>
              
  
             <br>
             
              <div class="row">
                  <div class="col-12 ml-2">
                      <input type="submit" name="enviarcoment" value="Enviar comentario" class="btn btn-primary py-3 px-5">
                  </div>
              </div>
        
        
        
        </form>  
               
            </div>
            
            
       
    </div>
         </div>
          </div>
          
           </div>
        </div>
      
  
   <!--Display de producto -->
          
          
          <!--CAJA COMENTARIOS -->
      <div class="site-section bg-light">
      <div class="container">
        <div class="owl-carousel owl-slide-3 ">
        <?php
						if(file_exists('comentarios.json')){
							$comentarioJson = file_get_contents('comentarios.json');
							$comentarioArray = json_decode($comentarioJson,true );
							krsort($comentarioArray);
							$cantidad = 0;
							foreach($comentarioArray as $comentario){
								if($comentario['id_producto'] == $_GET['productos']){ 
									$cantidad++;
									if($cantidad == 11) {
                    break; }
									?>
          <blockquote class="testimony">
          <img src="images/<?php echo $productos['id_producto']?>/<?php echo $productos['id_producto']?>.png" alt="Image">
          <p class="small text-primary">
          <?php echo $comentario['Email'] ?>
             <br>   
          <?php echo $comentario['Fecha'] ?></p>
          </p>

          <p class="small text-primary"><?php switch ($comentario['rankeo']) {
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
                              echo '<span class="icon-star"></span>
                              <span class="icon-star"></span>
                              <span class="icon-star"></span>
                              <span class="icon-star"></span>
                              <span class="icon-star"></span>'
                              ;
                           break;
} ?></p>
            <p>&ldquo;<?php echo $comentario['Comentario'] ?>&rdquo;</p>
            
          </blockquote>
          <?php 
                }
              }
            }
          ?>
          
        </div>
      </div>
    </div>
          
          <!--CAJA COMENTARIOS -->

          <!--FOOTER-->
    <?php
        include_once 'inc/footer.php';
        ?>
         <!--FOOTER-->
  
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