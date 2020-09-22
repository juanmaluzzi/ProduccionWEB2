  <div class="dropdown">
 <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Cepas
 </button>
 <div class="dropdown-menu ml-4" aria-labelledby="dropdownMenuButton">

   <!-- CEPA  -->
    <?php 

    require_once('clases/cepa.php');
        
        $Cepa = new Cepa($con);

     foreach($Cepa->getCepa() as $cepa){


     ?>

   <a class="dropdown-item" href="shop.php?cepa=<?php echo $cepa['id']?>"><?php echo $cepa['cepa'] ?></a>
     <?php }?>
 </div>

</div>

 <!-- MARCAAA  -->

<div class="dropdown ml-2">
 <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Bodegas
 </button>
 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <?php 

     require_once('clases/marca.php');     

     $Marca = new Marca($con);

     foreach($Marca->getMarca() as $marca){

     ?>

   <a class="dropdown-item" href="shop.php?marca=<?php echo $marca['id']?> "><?php echo $marca['marca'] ?></a>
     <?php }?>
 </div>
 </div>

</div>
<button class="btn" type="button">
   <a href="shop.php">Restablecer Busqueda</a>
 </button>

