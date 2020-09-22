  <div class="dropdown">
 <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Cepas
 </button>
 <div class="dropdown-menu ml-4" aria-labelledby="dropdownMenuButton">
    <?php 
     $fp = fopen('datos/cepa.json','r');
     $cepaJson = fread($fp,filesize('datos/cepa.json'));
     fclose($fp);
     $cepaArray = json_decode($cepaJson,true);
     foreach($cepaArray as $cepa){
     ?>

   <a class="dropdown-item" href="shop.php?cepa=<?php echo $cepa['id']?>&marca=<?php echo isset($_GET['marca'])?$_GET['marca']:'' ?>"><?php echo $cepa['nombre'] ?></a>
     <?php }?>
 </div>

</div>


<div class="dropdown ml-2">
 <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Bodegas
 </button>
 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <?php 
     $fp = fopen('datos/marca.json','r');
     $marcaJson = fread($fp,filesize('datos/marca.json'));
     fclose($fp);
     $marcaArray = json_decode($marcaJson,true);
     foreach($marcaArray as $marca){
     ?>

   <a class="dropdown-item" href="shop.php?marca=<?php echo $marca['id']?>&cepa=<?php echo isset($_GET['cepa'])?$_GET['cepa']:'' ?>"><?php echo $marca['nombre'] ?></a>
     <?php }?>
 </div>
 </div>

</div>
<button class="btn" type="button">
   <a href="shop.php">Restablecer Busqueda</a>
 </button>

