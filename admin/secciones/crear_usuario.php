
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

                          <label class="text-color-light"for="password">Password</label>
                          <input type="password" class="form-control" name="password" id="password" placeholder="************">
                          
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

