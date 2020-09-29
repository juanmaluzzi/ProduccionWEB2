
    <div class="owl-carousel hero-slide owl-style">
      <div class="intro-section container" style="background-image: url('images/hero_1.jpg');">
        <div class="row justify-content-center text-center align-items-center">
          <div class="col-md-8">
            <span class="sub-title">Viñedos</span>
            <h1>Uvas Organicas</h1>
          </div>
        </div>
      </div>

      <div class="intro-section container" style="background-image: url('images/hero_2.jpg');">
        <div class="row justify-content-center text-center align-items-center">
          <div class="col-md-8">
            <span class="sub-title">Bienvenidos</span>
            <h1>Vino para todos los gustos</h1>
          </div>
        </div>
      </div>

    </div>

    <div class="site-section mt-5">
      <div class="container">

       <div class="row mb-5">
          <div class="col-12 section-title text-center mb-5">
            <h2 class="d-block">Productos Destacados</h2>
            
            <p><a href="index.php?seccion=shop">Ver todos los productos <span class="icon-long-arrow-right"></span></a></p>
          </div>

        <div class="row mb-5">

         <!-- PARA MOSTRAR PRODUCTOS EN INDEX -->
        <?php 
           foreach($Productos->getProductos() as $productos){ 	
                        
         ?>

         <div class="col-lg-3 mb-5 col-md-6">
            <div class="wine_v_1 text-center pb-4">
            
              <a href="shopproducto.php?produdctos=<?php echo $productos['id_producto']?>" class="thumbnail d-block mb-4"><img src="images/<?php echo $productos['id_producto']?>/<?php echo $productos['id_producto']?>.png" alt="Image" class="img-fluid"></a>
              <div>
                <h3 class="heading mb-1 text-dark"><?php echo $productos['nombre']?></h3>
                <span class="price text-dark">$ <?php echo $productos['precio']?></span>
              </div>

              <div class="wine-actions">
                  
                <h3 class="heading-2"><?php echo $productos['nombreMarca']?></h3>
                <p class="heading-2 text-dark"><?php echo $productos['nombre']?></p>
                <span class="price d-block text-dark">$ <?php echo $productos['precio']?></span>
                
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

    <div class="hero-2" style="background-image: url('images/bodega.jpg');">
     <div class="container">
        <div class="row justify-content-center text-center align-items-center">
          <div class="col-md-8">
            <span class="sub-title">Bodega</span>
            <h2>Luigi Bosca</h2>
          </div>
        </div>
      </div>
    </div>

  
 