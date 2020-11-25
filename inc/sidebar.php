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

  <!-- ORDER -->
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

  <div class="col-3">
    <button class="btn" type="button">
      <a href="index.php?seccion=shop">Restablecer Busqueda</a>
    </button>
  </div>
<!-- CATEGORIAS Y SUBCATEGORIAS -->
  <div class="col-12 py-2">
  
<?php
require_once('mysql_login.php');

$con = new PDO('mysql:host='.$hostname.';dbname='.$database.';port='.$puerto, $username, $password);

$query = "SELECT * FROM categoria WHERE parent_id = 0 ;";
$categorias = $con->query($query);
?>
<ul> <!--- ME QUEDA MODIFICAR Los HREF PARA UQE ME QUEDE BIEN -->

    <?php foreach($categorias as $cat){?>
        <li>
            <a href="index.php?seccion=shop&categoria=<?php echo $cat['id'] ; ?>&cepa=<?php echo isset($_GET['cepa']) ? $_GET['cepa'] :'' ;?>&marca=<?php echo isset($_GET['marca']) ? $_GET['marca'] : '' ;?>">
                <?php echo $cat['categoria']?>
            </a>
            <?php 
            $query = "SELECT * FROM categoria WHERE parent_id = '" . $cat['id'] . "' ;"; 
            $subcategorias = $con->query($query); ?>
                <ul>
                    <?php foreach($subcategorias as $scat){?>
                        <li>
                            <a href="index.php?seccion=shop&categoria=<?php echo $scat['id'] ; ?>&cepa=<?php echo isset($_GET['cepa']) ? $_GET['cepa'] :'' ;?>&marca=<?php echo isset($_GET['marca']) ? $_GET['marca'] : '' ;?>" >
                                <?php echo $scat['categoria']?>
                            </a>
                            
                        </li>
                    <?php } ?>
                </ul> 
        </li>
    <?php } ?>
</ul>

  </div>