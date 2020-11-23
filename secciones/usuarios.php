<?php
    
    

    $message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])&& !empty($_POST['usuario']) ){

    $sql= "INSERT INTO usuarios_cl (usuario,email,password) VALUES (:usuario, :email,:password)";
    $stmt = $con->prepare($sql);
    $stmt -> bindParam(':usuario',$_POST['usuario']);
    $stmt -> bindParam(':email',$_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt -> bindParam(':password',$password);

    if ($stmt->execute()){
        $message = 'Usuario creado';
    }else{
      $message = 'Error al crear usuario';
                        }
                    }
?>

<div class="container">
<div class="card-body border-white">
                    <form action="index.php?seccion=usuarios" method="post">
                    
                            <div class="row justify-content-center">
                              <div class="col-12 col-md-6">
                                  <h2 class="text-center text-dark my-2 pt-5">Crear usuario</h2>
                              </div>
                            </div>
                    
                        <div class="form-group">
                        <label class="text-dark"for="usuario">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario"  placeholder="Ingrese un nombre de usuario">
                        </div>
                        <div class="form-group">
                        <label class="text-dark"for="usuario">Email</label>
                        <input type="email" class="form-control" name="email" id="email"  placeholder="Ingrese un email válido">
                        </div>

                        <div class="form-group">
                        <label class="text-dark"for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="************">
                        </div>
                        <div class="dropdown">
    
                        <button class="btn btn-secondary text-dark bg-light" type="submit" id="botonusr"  aria-haspopup="true" aria-expanded="false">
                        Registrarme</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
       
     
      </div>
                      
                        
                    </form>

                    <!--  boton para ir a login -->
                    <div class="text-dark text-center font-size-14px">
                    <?php

                    if (!empty($message)){ ?>

                    <?= $message ?>

                     <?php } ?>
                        <br>
                        <button class="btn btn-secondary text-dark bg-light" type="submit" id="botonlog" aria-haspopup="true">
                        <a href="index.php?seccion=login">Iniciar sesión</a>
                        </button>

                     </div>

                </div>
</div>