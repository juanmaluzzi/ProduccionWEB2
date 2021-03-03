<div class="container">
<?php
require_once('../inc/mysql_login.php');
require_once('../clases/cepa.php');
require_once('../inc/config.php');

$Cepa = new Cepa($con);

if(isset($_GET['edit'])){
    if((!empty($_GET['edit']))){
        $Cepa = $Cepa->getCepa($_GET['edit']);
        $titulo = 'Editar Cepa';
    }
    else {
        $titulo = 'Nueva Cepa';
    }
}
else{
    $titulo = 'Nueva Cepa';
}


?>
        <div class="row">
            <div class="col-12">
                <h2 class="text-center"> </h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row  justify-content-center mb-5">
        <div class="input-group mb-3">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary" type="button"><a
                                href="index.php?seccion=listado_cepas">Cepa</a></button>
    <button class="btn btn-outline-secondary" type="button"><a
                                href="index.php?seccion=new_cepa">Nueva Cepa</a></button>
  </div>
  <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
</div>
    </div>
            <div class="col-12 col-md-6">
                <div class="card bg-light text-dark">
                    <div class="card-body">
                        <form action="../admin/acciones/editar_cepa.php" method="post">
                       <h1 class="text-danger"><?=$titulo;?> </h1>
                                    <input type="hidden" name="id" value="<?= $_GET['edit'] ?>">
        
                            <div class="form-group">
                              
                              <label for="nombre">Nombre Actual: 
                                <?php
                                    if((!empty($_GET['edit']))){
                                    foreach($Cepa->getNombreCepa($_GET['edit']) as $cepa){
                                        ?>
                              <?php echo isset($cepa['cepa'])?$cepa['cepa']:'';?>

                              <?php 
                                    
                                }
                   } ?>
                              </label>
                    
                              <input type="text" class="form-control" name="cepa" id="cepa">
                             
                            </div>
                       
                            <button type="submit" class="btn btn-primary" name="formulario_cepas">
                            Cargar</button>
                      
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
      
    </div>