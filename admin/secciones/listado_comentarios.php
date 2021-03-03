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
                        <th>Habilitado</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                           foreach($Productos->getComentarioProductos($_GET) as $productos){ 
                               if($productos['id_producto'] != null){
                ?>
                            <tr>
                                <td><img src="../images/<?php echo $productos['id_producto']?>/<?php echo $productos['id_producto']?>.png" alt="Image" class="img-fluid" width=50px></td>
                                <td><?php echo $productos['nombre']?></td>
                                <td><?php echo $productos['id_producto']?></td>
                                <td><?php echo $productos['comentario'] ?></td>
                                <td ><?php echo $productos['email'] ?></td>
                                <td class="text-center"><?php echo $productos['usr'] ?></td>
                                <td class="text-center"><?php echo $productos['comentarios_id'] ?></td>
                                <td><?php echo $productos['habilitado'] ?></td>
                                <td>
                               
                                 <?php       if (isset($_GET['del'])){
                                        $resp = $Productos->borrarComentario($_GET['del']);
                                        if($resp > 0){
                                        header ('Location: index.php?seccion=listado_comentarios');
                                    }
                                
                                            }

                                    ?>
                                     <button type="button" class="btn  btn-sm"><a
                                href="index.php?seccion=listado_comentarios&del=<?php echo $productos['comentarios_id']?>">Borrar</a></button>
                                </td>

                                <td>
                                <?php       if (isset($_GET['edit'])){
                                        $edit = $Productos->editarComentario($_GET['edit']);
                                        if($edit > 0){
                                        header ('Location: index.php?seccion=listado_comentarios');
                                    }
                                       
                                            }

                                    ?>
                                <button type="button" class="btn  btn-sm"><a
                                href="index.php?seccion=listado_comentarios&edit=<?php echo $productos['comentarios_id']?>">Agregar</a></button>
                                
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

            <div>
             <div class="col-12">
        <h2 class="text-center">
            Habilitar/Deshabilitar campos
        </h2>
             </div>
             </div>
</div>