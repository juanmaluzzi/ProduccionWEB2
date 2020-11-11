<?php

//    $titulo = "Nuevo producto";
//    $submit = "Cargar";
//    $action = "cargar_producto";
//
//    if(!empty($_GET["id"])):
//        $idProducto = $_GET["id"];
//        
//        if(!is_dir(RUTA_TRACKS . "/$nombreEp")):
//            header("Location:index.php?seccion=listado_prod&estado=error&error=prod_inexistente");
//            die();
//        endif;
//
//        $nombre = mostrar_nombre_ep($nombreEp);
//        $submit = "Editar";
//        $action = "editar_prod";
//
//    endif;
//
$titulo = "nuevo / editar";
?>

<div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center"><?= $titulo; ?></h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row  justify-content-center mb-5">
            
            <div class="col-12 col-md-6">
                <div class="card bg-light text-dark">
                    <div class="card-body">
                        <form action="../admin/acciones/<?= $action; ?>.php" method="post" enctype="multipart/form-data">
                            <?php
                                if(isset($nombreEp)):
                            ?>
                                    <input type="hidden" name="id" value="<?= $nombreEp; ?>">
                            <?php
                                endif;
                            ?>

                            <div class="form-group">
                              <label for="nombre">Nombre producto</label>
                              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre del producto a cargar" value="<?= isset($nombreEp) ? mostrar_nombre_ep($nombreEp) : ""; ?>">
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
                                <textarea class="form-control" name="categoria" id="categoria" rows="1" placeholder="Ejemplo: Blanco, Rosado, Tinto"></textarea>
                            <label for="bodega">Bodega</label>
                                 <textarea class="form-control" name="bodega" id="bodega" rows="1"></textarea>
                            <label for="cepa">Cepa</label>
                                 <textarea class="form-control" name="cepa" id="cepa" rows="1"></textarea>
                            <label for="descripcion">Descripción</label>
                                 <textarea class="form-control" name="descripcion" id="descripcion" rows="1"></textarea>
                            <label for="precio">Precio</label>
                                 <textarea class="form-control" name="precio" id="precio" rows="1" placeholder="$"></textarea>

                            </div>
                                
                            <button class="btn btn-primary">Cargar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       

    </div>