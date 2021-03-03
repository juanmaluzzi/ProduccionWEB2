 <?php
  require_once ('clases/comentarios.php');
  $Comentario = new Comentario($con);
    if(isset($_POST['enviarcoment']))
    {
    $mensaje =   $Comentario-> saveComentario($_POST);
    $comentarioArray = array();
}  
  ?>

    <!--Display de producto-->
    <div class="site-section py-5 custom-border-bottom" data-aos="fade">
             
      <div class="container" >
      
      <button class="btn mt-3 " type="button">
        <a href="index.php?seccion=shop">Volver al catálogo</a>
      </button>
      
        <div class="row pt-5">
       
         <?php 
                ///////LISTADO DE PRODUCTOS SHOP.PHP
            $id = $_GET['productos'];         
            foreach($Productos->getUnProducto($id) as $productos){
		  	?>

          <div class="col-md-6">
            <div class="block-16">
              <figure  aling="center" >
                <img src="images/<?php echo $productos['id_producto']?>/<?php echo $productos['id_producto']?>.png" alt="Image placeholder" class="img-fluid" >
              </figure>
            </div>
          </div>    
          <div class="col-md-5">      
            <div class="site-section-heading ">
              <h2 class="text-black font-heading-serif mb-0"><?php echo $productos['nombre'] ?></h2>            
              <h2 class="text-black font-heading-serif mb-0"><?php echo $productos['nombreMarca']?> </h2>
              <h3 class="text-black font-heading-serif mb-0"><?php echo $productos['nombreCepa'] ?></h3>
              <div class="size text-dark">$ <?php echo $productos['precio'] ?></div>

          <div class="star rating text-warning ">
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
            <p class="pb-1 mt-1 text-dark"><?php echo $productos['descripcion'] ?></p>
            <!--Display de producto -->
            </div>
          </div>
            <!--CAJA COMENTARIOS -->
          <div class="row-col-md-5 ">
          <div class="container-fluid">
          
          <?php  
            if (isset($_SESSION['user_id'])){
          ?>
            <h2 class="secction-tittle ml-5 mt-5 pt-5 font-size: 12px;" style="color: black">¡Dejanos tu comentario!</h2>
            <div class="container pt-2">
            <div class="row pt-5">
            
           
          
           <form  method="post" class="pl-5">                    
              <div class="row-fluid">
                  <div class="form-group pl-2" style="font-size: 16px">
                      <label for="comentario">Mensaje</label>
                      <textarea name="comentario" id="comentario" cols="80" rows="5" class="form-control" required></textarea>
                  </div>
              </div>

              <?php  
            foreach($Productos->campoDinamicoUno($id) as $puntuacion){
             if($puntuacion ['id_campo'] == 1){
          ?>
            <div class="row">
                 <div class="form group pl-4 text-dark">
                 <label for="product">¿Qué puntuación le das?</label>
                 <br>
                  <select class="form-group form-control-lg text-warning border-dark" name="rankeo" class="form-control-lg">
                      <option value="0">-----</option>
                      <option value="1">★</option>
                      <option value="2">★★</option>
                      <option value="3">★★★</option>
                      <option value="4">★★★★</option>
                      <option value="5">★★★★★</option>
                  </select>
                </div>
                
                <input type="hidden"  class="input-xlarge" name="id_producto" value="<?php echo $_GET['productos']?>"/>
                  
                  
              </div>
              <!-- cierre de la puntuacion -->
              <?php  }
            }?>
             <?php  
            foreach($Productos->campoDinamicoDos($id) as $puntuacion){
             if($puntuacion ['id_campo'] == 2){
          ?>
          <div class="row-fluid">
                  <div class="form-group pl-2 text-dark" style="font-size: 14px">
                      <label for="notas">Contanos que notas sentiste en este vino</label>
                      <textarea name="notas" id="notas" cols="80" rows="5" class="form-control" required></textarea>
                  </div>
              </div>
           <?php  }
            }?>

          <?php  
            foreach($Productos->campoDinamicoTres($id) as $puntuacion){
             if($puntuacion ['id_campo'] == 3){
          ?>
           <div class="row">
                 <div class="form group pl-4 text-dark">
                 <label for="product">¿Te gustaria que este vino este en version lata?</label>
                 <br>
                  <select class="form-group form-control-lg text-dark border-dark" name="enlata" class="form-control-lg">
                      <option value="0">-----</option>
                      <option value="1">Si</option>
                      <option value="2">No</option>                    
                  </select>
                 </div>    
           </div>         
                <input type="hidden"  class="input-xlarge" name="id_producto" value="<?php echo $_GET['productos']?>"/>
          <?php  }    
            }?>
             <br>
             
              <div class="row">
                  <div class="col-12 ml-2">
                      <input type="submit" name="enviarcoment" value="Enviar comentario" class="btn btn-primary py-3 px-5">
                  </div>

              </div>
                   
        
        
        </form>  
               
            </div>
            
            <?php }else{  ?>
                <br>
          <h2 class="secction-tittle ml-5 mt-5 pt-5 font-size: 12px;" style="color: black">¡Inicia sesion para dejar un comentario!</h2>
              

          <?php  }  ?>

    <?php 
 } ?>  
         </div>
          </div>
          
           </div>
        </div>
      </div>
  
   <!--Display de producto -->
          
          
          <!--CAJA COMENTARIOS -->
      <div class="site-section bg-light">
      <div class="container">
        <div class="owl-carousel owl-slide-3 text-center">

        <?php 
        if (!empty ($mensaje)){
        echo $mensaje;
        }
        ?>
        
        <?php 
          foreach($Comentario->getComentario($id) as $comentario){             
			  ?>
      
          <blockquote class="testimony">
          <img src="images/<?php echo $productos['id_producto']?>/<?php echo $productos['id_producto']?>.png" alt="Image">
          <p class="small text-primary">
          <?php echo $comentario['email'] ?>
             <br>   
          <?php echo $comentario['fecha'] ?></p>
          </p>

          <p class="small text-primary">

          <!-- CAMPO DINAMICO 1 -->
          <?php 
          foreach($Productos->campoDinamicoUno($id) as $campo){        
            if ($campo['id_campo']== 1)     { 
			  ?>
  
          <?php
          
          switch ($comentario['rankeo']) {
                     case "0":
                               echo '<span class="icon-star-o"></span>
                               <span class="icon-star-o"></span>
                               <span class="icon-star-o"></span>
                               <span class="icon-star-o"></span>
                               <span class="icon-star-o"></span>'
                               ;
                               break;
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
                                             }
       } ?>
       <!-- FIN CAMPO DINAMICO 1 -->
       <br>
       Comentario
       <p>&ldquo;<?php echo $comentario['comentario'] ?>&rdquo;</p>

       <!-- CAMPO DINAMICO 2  -->
      <?php                 
        foreach($Productos->campoDinamicoDos($id) as $campo){ 
            if ($campo['id_campo']== 2)     { 
			   ?> 
         Notas
         <p>&ldquo;<?php echo $comentario['notas'] ?>&rdquo;</p>
               
      
      <?php 
              }  
            }
          ?>
        <!-- FIN CAMPO DINAMICO 2 -->
        <!-- CAMPO DINAMICO 3 -->
        <?php                 
        foreach($Productos->campoDinamicoTres($id) as $campo){ 
            if ($campo['id_campo']== 3)     { 
			   ?>    
         ¿Lo querrias en lata?
         <br>
         <?php       
          switch ($comentario['enlata']) {
                              case "0":
                              echo '----'
                              ;
                              break;
                              case "1":
                              echo 'Si'
                              ;

                              break;
                              case "2":
                              echo 'No'
                              ;
                             break;
                            }  
                          }
                        }   ?>
        <!-- FIN CAMPO DINAMICO 3 -->
        </p> 
          </blockquote>
          
          <?php                
            }
             ?>
        </div>
        
         
      </div>
       
    </div>

