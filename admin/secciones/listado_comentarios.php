<div class="container mb-5">
    
    <div class="col-12">
        <h2 class="text-center">
            Comentarios
        </h2>
    </div>

<div class="card mb-5">
        <div class="col-12">
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre de producto</th>    
                        <th>id producto</th>                                   
                        <th>Comentario</th>
                        <th>Email</th>
                        <th>Usuario</th>
                        <th>Comentarios_id</th>
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
                                <td><?php echo $productos['id_producto']?></td>
                                <td><?php echo $productos['comentario'] ?></td>
                                <td><?php echo $productos['email'] ?></td>
                                <td><?php echo $productos['usuario'] ?></td>
                                <td class="text-center"><?php echo $productos['comentarios_id'] ?></td>
                                <td>
                                
                                    <div class="btn-group" role="group" aria-label="">
                                        
                                        <form action="acciones/borrar_prod.php" method="post">
                                    
                                            <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                        </form>
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