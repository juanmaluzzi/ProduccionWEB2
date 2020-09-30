  <!-- CEPA  -->
    <?php
      require_once('clases/cepa.php'); 
      if(!empty($_GET['cepa'])){
        foreach($Cepa->getNombreCepa($_GET['cepa']) as $cepaNom){
          $nombreFiltroCepa = $cepaNom['cepa'];
        }
      }else{
          $nombreFiltroCepa = 'Cepas';
        }
    ?>

<div class="col-2">
  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php echo $nombreFiltroCepa; ?>
    </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      
        <?php foreach($Cepa->getCepa() as $cepa){ ?>
      
          <a class="dropdown-item" href="index.php?seccion=shop&cepa=<?php echo $cepa['id_cepa'] ; ?>&marca=<?php echo isset($_GET['marca']) ? $_GET['marca'] : '' ;?>&categoria=<?php echo isset($_GET['categoria']) ? $_GET['categoria'] : '' ;?>"><?php echo $cepa['cepa']; ?></a>
     
        <?php }?>

      </div>
  </div>
</div>

 <!-- MARCAAA  -->
 <?php
  require_once('clases/marca.php'); 
    if(!empty($_GET['marca'])){
      foreach($Marca->getNombreMarca($_GET['marca']) as $marcaNom){
        $nombreFiltroMarca = $marcaNom['marca'];
      }
    }else{
        $nombreFiltroMarca = 'Marcas';
      }
  ?>
  <div class="col-2">
    <div class="dropdown">
     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php echo $nombreFiltroMarca; ?>
     </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      
      <?php foreach($Marca->getMarca() as $marca){ ?>

        <a class="dropdown-item" href="index.php?seccion=shop&marca=<?php echo $marca['id'] ; ?>&cepa=<?php echo isset($_GET['cepa']) ? $_GET['cepa'] :'' ;?>&categoria=<?php echo isset($_GET['categoria']) ? $_GET['categoria'] : '' ;?>"><?php echo $marca['marca'] ?></a>
      
      <?php }?>
     </div>
    </div>
  </div>
 <!-- CATEGORIAA -->
<!--    <?php
  require_once('clases/categoria.php'); 
    if(!empty($_GET['categoria'])){
      foreach($Categoria->getNombreCate($_GET['categoria']) as $cateNom){
        $nombreFiltroCate = $cateNom['categoria'];
      }
    }else{
        $nombreFiltroCate = 'Categorías';
      }
  ?>
  <div class="col-2">
    <div class="dropdown">
     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php echo $nombreFiltroCate; ?>
     </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      
      <?php foreach($Categoria->getCategoria() as $categoria){ ?>

        <a class="dropdown-item" href="index.php?seccion=shop&categoria=<?php echo $categoria['id'] ; ?>&cepa=<?php echo isset($_GET['cepa']) ? $_GET['cepa'] :'' ;?>&marca=<?php echo isset($_GET['marca']) ? $_GET['marca'] : '' ;?>"><?php echo $categoria['categoria'] ?></a>
      
      <?php }?>
     </div>
    </div>
  </div>-->
   

    <!-- ORDERS -->
  
  <div class="col-2">
    <div class="dropdown">
   
     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     
      Orden
     </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="index.php?seccion=shop&order=1&marca=<?php echo (isset ($_GET['marca'])? $_GET['marca']: '') ; ?>&cepa=<?php echo isset($_GET['cepa']) ? $_GET['cepa'] :'' ;?>&categoria=<?php echo isset($_GET['categoria']) ? $_GET['categoria'] : '' ;?>">A-Z</a>
          <a class="dropdown-item" href="index.php?seccion=shop&order=2&marca=<?php echo isset ($_GET['marca'])? $_GET['marca']: '' ; ?>&cepa=<?php echo isset($_GET['cepa']) ? $_GET['cepa'] :'' ;?>&categoria=<?php echo isset($_GET['categoria']) ? $_GET['categoria'] : '' ;?>">Z-A</a>
          <a class="dropdown-item" href="index.php?seccion=shop&order=3&marca=<?php echo isset ($_GET['marca'])? $_GET['marca']: '' ; ?>&cepa=<?php echo isset($_GET['cepa']) ? $_GET['cepa'] :'' ;?>&categoria=<?php echo isset($_GET['categoria']) ? $_GET['categoria'] : '' ;?>">Destacados</a>

        </div>
    </div>
  </div>



  <div class="col-2">
    <button class="btn" type="button">
      <a href="index.php?seccion=shop">Restablecer Busqueda</a>
    </button>
  </div>