
<div class="container mb-5">

<?php 

require_once('../inc/mysql_login.php');

	  
      $Productos = new Productos($con);
     	
      
     if(isset($_GET['del'])){
             $resp = $Productos->del($_GET['del']);
             if($resp > 0){
                 header('Location: index.php?seccion=listado_prod');	
             }
             echo '<script>alert("'.$resp.'");</script>';
 
     }
     
 
         ?>
    
        <div class="col-12">
            <h2 class="text-center">
                Listado de productos
            </h2>
        </div>

    <div class="card mb-5">
            <div class="col-12">
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre de producto</th>
                            <th>Precio</th>
                            <th>Bodega</th>
                            <th>Categoria</th>
                            <th>Cepa</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                               foreach($Productos->getProductos($_GET) as $productos){ 
                                   if($productos['id_producto'] != null){
                    ?>
                                <tr>
                                    <td><img src="../images/<?php echo $productos['id_producto']?>/<?php echo $productos['id_producto']?>.png" alt="Image" class="img-fluid" width=50px></td>
                                    <td><?php echo $productos['nombre']?></td>
                                    <td>$<?php echo $productos['precio']?></td>
                                    <td><?php echo $productos['nombreMarca']?></td>
                                    <td><?php echo $productos['categoria_id'] ?></td>
                                    <td><?php echo $productos['cepa_id'] ?></td>
                                    <td>
                                    
                                        <div class="btn-group" role="group" aria-label="">
                                            <a type="button" class="btn btn-dark text-light btn-sm" href="index.php?seccion=editar_producto&edit=<?php echo $productos['id_producto']?>">Editar</a>
                                            
                                               
                                                <button type="button" class="btn btn-danger btn-sm"><a href="index.php?seccion=listado_prod&del=<?php echo $productos['id_producto']?>">Borrar</a></button>
                                            </a>
                                        </div>
                                    
                                    </td>
                                </tr>
                    <?php
                        }else{
                    ?>
                     <h2 class="alert text-center">No hay productos cargados</h2>
                            <?php
                            
                        } //FIN DEL IFELSE
                    } //FIN DEL FOREACH
                          
                          
                          ?>
                            </tbody>
                        </table>    
                    </div>
                </div>
</div>