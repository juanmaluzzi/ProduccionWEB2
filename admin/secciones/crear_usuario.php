
<div class="container">
  <div class="card-body border-white">
                    <form action="acciones/registro.php" method="post">
                    
                            <div class="row justify-content-center">
                              <div class="col-12 col-md-6">
                                  <h2 class="text-center my-2">Crear usuario</h2>
                              </div>
                            </div>

                        <div class="form-group">
                          <label class="text-color-light"for="usuario">Nombre de usuario</label>
                          <input type="text" class="form-control" name="usuario" id="usuario"  placeholder="Ingrese un nombre de usuario">

                          <label class="text-color-light"for="email">E-Mail</label>
                          <input type="text" class="form-control" name="email" id="email"  placeholder="Ingrese un E-mail">

                          <label class="text-color-light"for="password">Password</label>
                          <input type="password" class="form-control" name="password" id="password" placeholder="************">

                          <?php
                          foreach($Usuario->getPerfiles() as $perfil){
                          ?>
                          <h3> <?= print($perfil['nombre_perfil']) ?> </h3>
<?php
                          }
                          ?>


  <button type="submit" class="btn d-block m-auto">Ingresar</button>
  
  </div>

