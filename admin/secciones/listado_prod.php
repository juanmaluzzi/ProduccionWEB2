<div class="container mb-5">
    
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
                                    <td><?php echo $productos['nombreCat'] ?></td>
                                    <td><?php echo $productos['nombreCepa'] ?></td>
                                    <td>
                                    
                                        <div class="btn-group" role="group" aria-label="">
                                            <a type="button" class="btn btn-dark text-light btn-sm" href="index.php?seccion=nuevo_prod&id=<?= $productos['id_producto']; ?>">Editar</a>
                                            <form action="acciones/borrar_prod.php" method="POST">
                                                <input type="hidden" name="id" value="<?= $productos['id_producto']; ?>">
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