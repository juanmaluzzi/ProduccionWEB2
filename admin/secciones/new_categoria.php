<div class="container">
<?php
require_once('../inc/mysql_login.php');
$Categorias = new Categoria($con);


/*
if(isset($_POST['formulario_categorias'])){ 
    if($_POST['id'] > 0){
            $Categorias->editarCategoria($_POST); 
         
    }else{
        
            $Categorias->saveCategoria($_POST); 
    }
    
    header('Location: index.php?seccion=listado_categorias');
}
*/
if(isset($_GET['edit'])){
    if((!empty($_GET['edit']))){
        $categorias = $Categorias->getCategoria($_GET['edit']);
        $titulo = 'Editar Categoria';
    }
    else {
        $titulo = 'Nueva Categoria';
    }
}
else{
    $titulo = 'Nueva Categoria';
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
                                href="index.php?seccion=listado_categorias">Categorias</a></button>
    <button class="btn btn-outline-secondary" type="button"><a
                                href="index.php?seccion=new_categoria">Nueva Categoria</a></button>
  </div>
  <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
</div>
    </div>
            <div class="col-12 col-md-6">
                <div class="card bg-light text-dark">
                    <div class="card-body">
                        <form action="../admin/acciones/editar_cate.php" method="post">
                       <h1 class="text-danger"><?=$titulo;?> </h1>
                                    <input type="hidden" name="id" value="<?= $_GET['edit'] ?>">
        
                            <div class="form-group">
                              
                              <label for="nombre">Nombre Actual: 
                                <?php
                                    if((!empty($_GET['edit']))){
                                    foreach($Categoria->getNombreCate($_GET['edit']) as $categorias){
                                        ?>
                              <?php echo isset($categorias['categoria'])?$categorias['categoria']:'';?>

                              <?php 
                                    
                                }
                   } ?>
                              </label>
                    
                              <input type="text" class="form-control" name="categoria" id="categoria">
                             
                            </div>
                       
                            <button type="submit" class="btn btn-primary" name="formulario_categorias">
                            Cargar</button>
                      
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
      
    </div>