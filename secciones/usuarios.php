


<div class="container">
<div class="card-body border-white">
                    <form action="acciones/login.php" method="post">
                    
                            <div class="row justify-content-center">
                              <div class="col-12 col-md-6">
                                  <h2 class="text-center my-2">Crear usuario</h2>
                              </div>
                            </div>

                        <div class="form-group">
                        <label class="text-color-light"for="usuario">Nombre de usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario"  placeholder="Ingrese un nombre de usuario">
                        </div>

                        <div class="form-group">
                        <label class="text-color-light"for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="************">
                        </div>
                        <div class="dropdown">
    
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Perfil</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php foreach($Usuarios->getPerfil() as $perfil){ ?>
                        <label class="dropdown-item"for="perfil"><?= $perfil ?></label>
                        <input type="text" class="form-control" name="perfil" id="perfil"  placeholder="">
        <?php }?>

      </div>
                        <button type="submit" class="btn btn-outline-light d-block m-auto">Ingresar</button>
                    </form>
                </div>
</div>