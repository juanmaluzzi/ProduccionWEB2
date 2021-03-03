<div class="container mb-5">
    
    <div class="col-12">

        <div class="input-group mb-3">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary" type="button"><a
                                href="index.php?seccion=listado_cepas">Cepas</a></button>
    <button class="btn btn-outline-secondary" type="button"><a
                                href="index.php?seccion=new_cepa">Nueva Cepa</a></button> <?php #FRANKIE ?>
  </div>
  <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
</div>
    </div>

<div class="card mb-5">
        <div class="col-12">
            
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Cepa</th>
                        <th>Nombre Cepa</th>
                                                        
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once '../inc/mysql_login.php'; 
                require_once '../clases/cepa.php';    

	  
                            $Cepa = new Cepa($con);
                           foreach($Cepa->getCepa($_GET) as $cepa){ 
                               if($cepa['id_cepa'] != null){
                ?>
                            <tr>
            
                                <td><?php echo $cepa['id_cepa']?></td>
                                <td><?php echo $cepa['cepa']?></td>
                            
                                <td>
                                 <?php       if (isset($_GET['del'])){
                                        $resp = $Cepa->borrarCepa($_GET['del']);
                                        if($resp > 0){
                                        header ('Location: index.php?seccion=listado_cepas');
                                    }
                                    
                                            }

                                    ?>
                                     <button type="button" class="btn  btn-sm"><a
                                href="index.php?seccion=listado_cepas">Borrar</a></button>
                                </td>

                                <td>
                                <?php       if (isset($_GET['edit'])){
                                        $edit = $cepa->editarCepa($_GET['edit']);
                                        if($edit > 0){
                                        header ('Location: index.php?seccion=new_cepa');
                                    }
                                       
                                            }

                                    ?>
                                <button type="button" class="btn  btn-sm"><a
                                href="index.php?seccion=new_cepa&edit=<?php echo $cepa['id_cepa']?>">Editar</a></button>
                                
                                </td>


                            </tr>
                <?php
                    }else{
                ?>
                 <h2 class="alert text-center">No hay Cepas cargadas</h2>
                        <?php
                    } //FIN DEL IFELSE
                } //FIN DEL FOREACH

                        ?>
                        </tbody>
                    </table>    
                </div>
            </div>
</div>