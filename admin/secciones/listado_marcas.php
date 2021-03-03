<div class="container mb-5">
    
    <div class="col-12">

        <div class="input-group mb-3">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary" type="button"><a
                                href="index.php?seccion=listado_marcas">Bodegas</a></button>
    <button class="btn btn-outline-secondary" type="button"><a
                                href="index.php?seccion=nuevo_prod&new=bod">Nueva Bodega</a></button>
  </div>
  <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
</div>
    </div>

<div class="card mb-5">
        <div class="col-12">
            
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Bodega</th>
                        <th>Nombre Bodega</th>
                      
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once '../inc/mysql_login.php'; 
                require_once '../clases/marca.php';    

	  
                            $Marca = new Marca($con);
                           foreach($Marca->getMarca($_GET) as $marca){ 
                               if($marca['id'] != null){
                ?>
                            <tr>
            
                                <td><?php echo $marca['id']?></td>
                                <td><?php echo $marca['marca']?></td>
                            
                                <td>
                                 <?php       if (isset($_GET['del'])){
                                        $resp = $Marca->borrarMarca($_GET['del']);
                                        if($resp > 0){
                                        header ('Location: index.php?seccion=listado_marcas');
                                    }
                                    
                                            }

                                    ?>
                                     <button type="button" class="btn  btn-sm"><a
                                href="index.php?seccion=listado_marcas&del=<?php echo $marca['id']?>">Borrar</a></button>
                                </td>

                                <td>
                                <?php       if (isset($_GET['edit'])){
                                        $edit = $Marca->editarMarca($_GET['edit']);
                                        if($edit > 0){
                                        header ('Location: index.php?seccion=new_marca');
                                    }
                                       
                                            }

                                    ?>
                                <button type="button" class="btn  btn-sm"><a
                                href="index.php?seccion=new_marca&edit=<?php echo $marca['id']?>">Editar</a></button>
                                
                                </td>


                            </tr>
                <?php
                    }else{
                ?>
                 <h2 class="alert text-center">No hay marcas cargadas</h2>
                        <?php
                    } //FIN DEL IFELSE
                } //FIN DEL FOREACH

                        ?>
                        </tbody>
                    </table>    
                </div>
            </div>
</div>