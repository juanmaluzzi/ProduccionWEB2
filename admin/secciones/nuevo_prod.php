<?php

require_once('../inc/mysql_login.php');
$Productos = new Productos($con);

if(isset($_GET["estado"])){
    if($_GET["estado"] == "error"){
?>
        <div class="alert alert-danger" role="alert">
        <strong>Error: <?= $_GET["error"] ?></strong>. Volver a intentar
    </div>

    <?php }else{ ?>

    <div class="alert alert-success" role="alert">
        <strong>Producto creado correctamente</strong>
    </div>
<?php
    }
}
/*
if(isset($_POST['formulario_productos'])){ 
    if($_POST['id'] > 0){
            $Productos->edit($_POST); 
         
    }else{
        
            $Productos->save($_POST); 
    }
    
    header('Location: index.php?seccion=listado_prod');
}
*/
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

if(isset($_GET["new"])){
    switch($_GET["new"]){
        case "cat":
            ?>
                <div class="row align-items-center justify-content-center">
                 <div class="card col-4">
                     <form action="acciones/nuevo_registro.php" method="post">
                         <label for="nuevaCat">Nueva Categoria</label>
                         <textarea class="form-control mb-2" name="nuevaCat" id="nuevaCat" rows="1"></textarea>
                         <button type="submit" class="btn btn-primary mb-2" name="cargarNuevaCat">Cargar</button>
                     </form>
                 </div>
                </div>
         <?php
        break;
        case "cepa":
?>
  <div class="row align-items-center justify-content-center">
                 <div class="card col-4">
                     <form action="acciones/nuevo_registro.php" method="post">
                         <label for="nuevaCepa">Nueva Cepa</label>
                         <textarea class="form-control mb-2" name="nuevaCepa" id="nuevaCepa" rows="1"></textarea>
                         <button type="submit" class="btn btn-primary mb-2" name="cargarNuevaCepa">Cargar</button>
                     </form>
                 </div>
                </div>
         <?php
        break;
        case "bod":
?>
  <div class="row align-items-center justify-content-center">
                 <div class="card col-4">
                     <form action="acciones/nuevo_registro.php" method="post">
                         <label for="nuevaBod">Nueva Bodega</label>
                         <textarea class="form-control mb-2" name="nuevaBod" id="nuevaBod" rows="1"></textarea>
                         <button type="submit" class="btn btn-primary mb-2" name="cargarNuevaBod">Cargar</button>
                     </form>
                 </div>
                </div>
         <?php
        break;
        default:
        header("Location: index.php?seccion=nuevo_prod");
        die();
        break;
    } //*************************** CIERRE DEL SWITCH **********************+*/

}else{
?>

<div class="container">
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
                        <form action="../admin/acciones/crear_prod.php" method="post" enctype="multipart/form-data">
                       <h1 class="text-danger"> <?=$titulo;?> </h1>


<!-- ********************* DROPDOWN CATEGORIAS *********************-->

<div class="form-group">
    <label for="categoria">Categoria</label>
        <div class="col-6">      
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="categoria" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php
    if(isset($_GET["cat"])){
            $result = $Categoria->getNombreCate($_GET["cat"]);
            $nombreCategoria = $result->fetch(PDO::FETCH_ASSOC);
            print($nombreCategoria["categoria"]);
    }else{
            echo "Categoria";
        } 
    ?>
                </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="index.php?seccion=nuevo_prod&new=cat">Nueva</a>
        <?php 
    foreach($Categoria->getCategoria() as $cate){
   ?>
                        <a class="dropdown-item" href="index.php?seccion=nuevo_prod&cat=<?= $cate["id"] ?>"><?= $cate["categoria"] ?></a>
    <?php }; ?>
                    </div>
            </div>
            
        </div>
        


  <!-- ********************* DROPDOWN CEPA *********************-->                                
                                
  
<div class="form-group">
    <label for="categoria">Cepa</label>
        <div class="col-2">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="cepa" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php
      if(isset($_GET["cepa"])){
          $result = $Cepa->getNombreCepa($_GET["cepa"]);
          $nombreCepa = $result->fetch(PDO::FETCH_ASSOC);
          print($nombreCepa["cepa"]);
        }else{
            echo "Cepa";
        } ?>
                 </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                 <a class="dropdown-item" href="index.php?seccion=nuevo_prod&new=cepa">Nueva</a>
        <?php 
    foreach($Cepa->getCepa() as $cep){
        ?>

<a class="dropdown-item" href="index.php?seccion=nuevo_prod&cat=<?= $_GET["cat"] ?>&cepa=<?= $cep["id_cepa"] ?>"><?= $cep["cepa"] ?></a>
    <?php }; ?>
                </div>
            </div>
        </div>
        <!-- ********************* DROPDOWN BODEGAS *********************-->                                
                                        
          
        <div class="form-group">
            <label for="categoria">Bodega</label>
                <div class="col-2">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="bodega" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php
              if(isset($_GET["bod"])){
                $result = $Marca->getNombreMarca($_GET["bod"]);
                $nombreMarca = $result->fetch(PDO::FETCH_ASSOC);
                print($nombreMarca["marca"]);
            }else{
                echo "Marca";
                } ?>
        
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="index.php?seccion=nuevo_prod&new=bod">Nueva</a>
                <?php 
            foreach($Marca->getMarca() as $bod){
            ?>
                            <a class="dropdown-item" href="index.php?seccion=nuevo_prod&cat=<?= $_GET["cat"] ?>&cepa=<?= $_GET["cepa"] ?>&bod=<?= $bod["id"] ?>"><?= $bod["marca"] ?></a>
            <?php }; ?>
                
                        </div>
                    </div>
                </div>

                
                            <div class="form-group">
                              <label for="nombre">Nombre producto</label>
                              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre del producto a cargar" >
                            </div>


                            <label for="descripcion">Descripción</label>

                                 <textarea class="form-control" name="descripcion" id="descripcion" rows="1">
                                 <?php echo isset($productos['descripcion'])?$productos['descripcion']:'';?></textarea>
                            <label for="precio">Precio</label>
                                 <textarea class="form-control" name="precio" id="precio" rows="1" placeholder="$"><?php echo isset($productos['precio'])?$productos['precio']:'';?></textarea>

                            </div>

                            
                            <div class="form-group">
                              <label for="imagen">Imagen del producto</label>
                              <input type="file" class="form-control-file" name="imagen" id="imagen" aria-describedby="fileHelpId">
                              <small id="fileHelpId" class="form-text text-muted">El formato de la imagen debe ser <b class="text-danger">PNG</b></small>

                            </div>
                            <?php $ultimoID = $Productos->getUltimoID(); 
                            $ultimoID = $ultimoID->fetch(PDO::FETCH_ASSOC);
                            $idNuevoProducto = $ultimoID["ultProd"] + 1;
                            ?>
                                
                            <input type="hidden" class="form-control" id="id" name="id" placeholder="" value="<?= $idNuevoProducto; ?>">
                            <input type="hidden" class="form-control" id="idCat" name="idCat" placeholder="" value="<?= $_GET["cat"]; ?>">
                            <input type="hidden" class="form-control" id="idCepa" name="idCepa" placeholder="" value="<?= $_GET["cepa"]; ?>">
                            <input type="hidden" class="form-control" id="idBod" name="idBod" placeholder="" value="<?= $_GET["bod"]; ?>">
                            
                            <button class="btn btn-primary">Cargar</button>

                           


                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
      
    </div>

    <?php } ?>