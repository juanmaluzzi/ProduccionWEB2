<div class="container mb-5">
    
    <div class="col-12">

        <div class="input-group mb-3">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary" type="button"><a
                                href="index.php?seccion=listado_categorias">Categorias</a></button>
    <button class="btn btn-outline-secondary" type="button"><a
                                href="index.php?seccion=new_categoria">Nueva Categoria</a></button>
  </div>
  <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
</div>
    </div>

<div class="card mb-5">
        <div class="col-12">
            
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Categoria</th>
                        <th>Nombre Categoria</th>                                      
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once '../inc/mysql_login.php'; 
                require_once '../clases/categoria.php';    

	  
                            $Categorias = new Categoria($con);
                           foreach($Categorias->getCategoria($_GET) as $categorias){ 
                               if($categorias['id'] != null){
                ?>
                            <tr>
            
                                <td><?php echo $categorias['id']?></td>
                                <td><?php echo $categorias['categoria']?></td>
                                <td class="ml-5">
                                 <?php       if (isset($_GET['del'])){
                                        $resp = $Categorias->borrarCategoria($_GET['del']);
                                        if($resp > 0){
                                        header ('Location: index.php?seccion=listado_categorias');
                                    }
                                        echo '<script>alert("'.$resp.'");</script>';
                                            }

                                    ?>
                                     <button type="button" class="btn  btn-sm"><a
                                href="index.php?seccion=listado_categorias&del=<?php echo $categorias['id']?>">Borrar</a></button>
                                </td>

                                <td>
                                <?php       if (isset($_GET['edit'])){
                                        $edit = $Productos->editarCategoria($_GET['edit']);
                                        if($edit > 0){
                                        header ('Location: index.php?seccion=listado_categorias');
                                    }
                                       
                                            }

                                    ?>
                                <button type="button" class="btn  btn-sm"><a
                                href="index.php?seccion=listado_categorias&edit=<?php echo $categorias['id']?>">Editar</a></button>
                                
                                </td>


                            </tr>
                <?php
                    }else{
                ?>
                 <h2 class="alert text-center">No hay Categorias cargadas</h2>
                        <?php
                    } //FIN DEL IFELSE
                } //FIN DEL FOREACH
                        ?>
                        </tbody>
                    </table>    
                </div>
            </div>
</div>