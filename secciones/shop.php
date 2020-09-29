
    <div class="site-section mt-2"> 
      <div class="container">

        <div class="row mb-2">
          <div class="col-12 section-title text-center mb-5">
            <h2 class="d-block ">Nuestros Productos</h2>
          </div>
        </div>
             <!-- The sidebar -->
            <div class="row pb-3">
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
                  
                <h3 class="heading-2"><?php echo $productos['nombreMarca']?></h3>
                <p class="heading-2"><?php echo $productos['nombre']?></p>
                <span class="price d-block"><?php echo "$".$productos['precio']?></span>
                
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
                
                <a href="index.php?seccion=shopproducto&productos=<?php echo $productos['id_producto']?>" class="btn add">Ver Producto</a>
                </div>
              </div>
              
            </div>
            <?php 
             }?>
          </div>
      </div>
    </div>

  </div>

