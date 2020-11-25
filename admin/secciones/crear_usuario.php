<?php
if(empty($_GET['id'])){
?>
<div class="container">
<div class="row justify-content-center">
  <div class="card-body border-white bg-light col-8">
                    <form action="acciones/registro.php" method="post">
                    
                            <div class="row justify-content-center">
                              <div class="col-12 col-md-6">
                                  <h3 class="text-center my-2">Crear usuario</h3>
                              </div>
                            </div>

                        <div class="form-group">
                          <label class="text-color-light"for="usuario">Nombre de usuario</label>
                          <input type="text" class="form-control" name="usuario" id="usuario"  placeholder="Ingrese un nombre de usuario">

                          <label class="text-color-light"for="email">E-Mail</label>
                          <input type="text" class="form-control" name="email" id="email"  placeholder="Ingrese un E-mail">

<<<<<<< HEAD
                          <label class="text-color-light"for="password">Contraseña</label>
                          <input type="password" class="form-control" name="password" id="password" placeholder="************">
                         
=======
                          <label class="text-color-light"for="password">Password</label>
                          <input type="password" class="form-control" name="password" id="password" placeholder="************">
                          
>>>>>>> Franco
                          <label class="text-color-light"for="perfil">Perfil</label>
                          <select name="perfil" class="form-control" id="perfil">  
  <?php
                          foreach($Usuario->getPerfiles() as $perfil){
                            
                    ?>

                          <option> <?= $perfil['nombre_perfil'] ?> </option>

                          <?php } ?>

                          
                          </select>
  
                        </div>
                          
                          <button type="submit" class="btn d-block m-auto btn-dark">Ingresar</button>
                        
                      </div>
      </div>
    </div>
  </div>
</div>

<?php

                          }else{
<<<<<<< HEAD
                            $usuario = 'prueba';

                            //MODIFICAR USUARIO
=======
                            $idUsr = $_GET['id'];
                            //MODIFICAR USUARIO

>>>>>>> Franco
?>
<div class="container">
<div class="row justify-content-center">
  <div class="card-body border-white bg-light col-8">
                    <form action="acciones/editar_usr.php" method="post">
<<<<<<< HEAD
                    
                            <div class="row justify-content-center">
                              <div class="col-12 col-md-6">
                                  <h3 class="text-center my-2">Modificar usuario: <?= $usuario ?></h3>
                              </div>
                            </div>

                        <div class="form-group">
                          <label class="text-color-light"for="usuario">Nombre de usuario</label>
                          <input type="text" class="form-control" name="usuario" id="usuario"  placeholder="Ingrese un nombre de usuario">

                          <label class="text-color-light"for="email">E-Mail</label>
                          <input type="text" class="form-control" name="email" id="email"  placeholder="Ingrese un E-mail">
=======
                    <?php

                    foreach($Usuario->getUsrID($idUsr) as $usuario){
                      foreach($Usuario->getPerfil($usuario['usr_perfil']) as $perfil){
                        $perfilActual = $perfil['nombre_perfil'];
                      }
                      ?>
                            <div class="row justify-content-center">
                              <div class="col-12 col-md-6">
                                  <h3 class="text-center my-2">Modificar usuario: <?= $usuario['usr'] ?></h3>
                              </div>
                            </div>
                            <?php

                    }
?>
                        <div class="form-group">

                          <input type="hidden" class="form-control" name="id_usr" id="id_usr" value="<?= $idUsr ?>">

                          <label class="text-color-light"for="usuario">Nombre de usuario</label>
                          <input type="text" class="form-control" name="usuario" id="usuario"  placeholder="<?= $usuario['usr'] ?>">

                          <label class="text-color-light"for="email">E-Mail</label>
                          <input type="text" class="form-control" name="email" id="email"  placeholder="<?= $usuario['email'] ?>">
>>>>>>> Franco

                          <label class="text-color-light"for="password">Password</label>
                          <input type="password" class="form-control" name="password" id="password" placeholder="************">
                          
<<<<<<< HEAD
                          <label class="text-color-light"for="perfil">Perfil</label>
                          <select name="perfil" class="form-control" id="perfil">  
  <?php
                          foreach($Usuario->getPerfiles() as $perfil){
=======
                          <label class="text-color-light"for="perfil">Perfil actual: <span class="text-danger"><?php echo $perfilActual ?></span></label>
                          <select name="perfil" class="form-control" id="perfil">  


  <?php

    foreach($Usuario->getPerfiles() as $perfil){
>>>>>>> Franco
                            
                    ?>

                          <option> <?= $perfil['nombre_perfil'] ?> </option>

                          <?php } ?>

                          
                          </select>
  
                        </div>
                          
                          <button type="submit" class="btn d-block m-auto btn-dark">Modificar</button>
                        
                      </div>
      </div>
    </div>
  </div>
</div>


<?php

}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> Franco
