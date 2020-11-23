<?php 

session_start();

if (isset($_SESSION['user_id'])){
    header('Location: index.php/secciones=home');
}


if(!empty($_POST['usuario']) && !empty($_POST['password'])){

    $base = $con->prepare('SELECT id,email,password,usuario FROM usuarios_cl WHERE usuario=:usuario');
    $base->bindParam(':usuario',$_POST['usuario']);
    $base->execute();
    $rta = $base->fetch (PDO::FETCH_ASSOC);

    
    $message = '';

   if (count($rta)>0 && password_verify($_POST['password'], $rta['password']) ) {
        $_SESSION['user_id'] = $rta['id'] ;
        header("Location: index.php?seccion=home");
}else{
    $message = 'Usuario o contraseña incorrectos';

}

}
?>




<div class="container">
<div class="card-body border-white">
                    <form action="index.php?seccion=login" method="post">
                    
                            <div class="row justify-content-center">
                              <div class="col-12 col-md-6">
                                  <h2 class="text-center text-dark my-2 pt-5">Iniciar sesion</h2>
                              </div>
                            </div>

                        <div class="form-group">
                        <label class="text-dark"for="usuario">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario"  placeholder="Ingrese usuario">
                        </div>
                       
                        <div class="form-group">
                        <label class="text-dark"for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="************">
                        </div>
                        <div class="dropdown">
    
                        <button class="btn btn-secondary text-dark bg-light" type="submit" id="botonusr"  aria-haspopup="true" aria-expanded="false">
                        Ingresar</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
       
     
      </div>
                      
                        
                    </form>

                    <div class="text-dark text-center font-size-14px">
                    <?php

                    if (!empty($message)){ ?>

                    <?= $message ?>

                     <?php } ?>
                    
                         
                </div>
                
                </div>
                </div>
</div>