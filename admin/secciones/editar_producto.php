

<div class="container">
<?php
require_once('../inc/mysql_login.php');
$Productos = new Productos($con);

if(isset($_POST['formulario_productos'])){ 
    if($_POST['id'] > 0){
            $Productos->edit($_POST); 
         
    }else{
        
            $Productos->save($_POST); 
    }
    
    header('Location: index.php?seccion=listado_prod');
}

if(isset($_GET['edit'])){
    if((!empty($_GET['edit']))){
        $productos = $Productos->getProductos($_GET['edit']);
        $titulo = 'Editar Producto';
    }
    else {
        $titulo = 'Nuevo Producto';
    }
}
else{
    $titulo = 'Nuevo Producto';
}
print( $Productos->edit($_POST));


?>
        <div class="row">
            <div class="col-12">
                <h2 class="text-center"> </h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row  justify-content-center mb-5">
            
            <div class="col-12 col-md-6">
                <div class="card bg-light text-dark">
                    <div class="card-body">
                        <form action="index.php?seccion=listado_prod" method="post">
                       <h1 class="text-danger"> <?=$titulo;?> </h1>
                                    <input type="hidden" name="id" value="<?= $titulo; ?>">
<?php
                                    
                                    foreach($Productos->getUnProducto($_GET['edit']) as $productos){
    ?>
                            <div class="form-group">
                              <label for="nombre">Nombre producto</label>
                              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre del producto a cargar" value="<?=isset($productos['nombre'])?$productos['nombre']:'';?>">
                            </div>

                            <div class="form-group">
                              <label for="imagen">Imagen del producto</label>
                              <input type="file" class="form-control-file" name="imagen" id="imagen" aria-describedby="fileHelpId">
                              <small id="fileHelpId" class="form-text text-muted">El formato de la imagen debe ser <b class="text-danger">PNG</b></small>

                              <?php
                                if(isset($nombreEp)):
                              ?>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="<?= "../tracks/$nombreEp/$nombreEp.jpg" ?>" alt="<?= mostrar_nombre_ep($nombreEp); ?>" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                              <?php
                                endif;
                              ?>
                            </div>

                            <div class="form-group">
                            <label for="categoria">Categoria</label>
                                <textarea class="form-control" name="categoria" id="categoria" rows="1" placeholder="Ejemplo: Blanco, Rosado, Tinto"><?php echo isset($productos['categoria_id'])?$productos['categoria_id']:'';?></textarea>
                            <label for="bodega">Bodega</label>
                                 <textarea class="form-control" name="bodega" id="bodega" rows="1">
                                 <?php echo isset($productos['marcas_id'])?$productos['marcas_id']:'';?></textarea>
                            <label for="cepa">Cepa</label>
                                 <textarea class="form-control" name="cepa" id="cepa" rows="1">
                                 <?php echo isset($productos['cepa_id'])?$productos['cepa_id']:'';?></textarea>
                            <label for="descripcion">Descripción</label>
                                 <textarea class="form-control" name="descripcion" id="descripcion" rows="1">
                                 <?php echo isset($productos['descripcion'])?$productos['descripcion']:'';?></textarea>
                            <label for="precio">Precio</label>
                                 <textarea class="form-control" name="precio" id="precio" rows="1" placeholder="$"><?php echo isset($productos['precio'])?$productos['precio']:'';?></textarea>

                            </div>
                                
                            <button type="submit" class="btn btn-primary" name="formulario_productos" >Cargar</button>

                            <input type="hidden" class="form-control" id="id" name="id" placeholder="" value="<?php echo (isset($productos['id_producto'])?$productos['id_producto']:'');?>">
                           


                        </form>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
      
    </div>