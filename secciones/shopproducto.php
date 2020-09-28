 <?php

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


    <!--Display de producto-->
    <div class="site-section py-5 custom-border-bottom" data-aos="fade">
         
            
      <div class="container" >
      
      <button class="btn" type="button">
        <a href="index.php?seccion=shop">Volver al catálogo</a>
      </button>
      
        <div class="row pt-5">
       
         <?php
      
                ///////LISTADO DE PRODUCTOS SHOP.PHP
				//foreach($Productos->getProductos() as $productos){ 	
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
          
            <h2 class="secction-tittle ml-5 mt-5 pt-5 font-size: 12px;" style="color: black">¡Dejanos tu comentario!</h2>
            <div class="container pt-2">
            <div class="row pt-5">
            
            
          
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
                 <div class="form group pl-4 text-dark">
                 <label for="product">¿Qué puntuación le das?</label>
                 <br>
                  <select class="form-group form-control-lg text-warning border-dark" name="rankeo" class="form-control-lg">
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
            
             

    <?php  } ?>  
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

