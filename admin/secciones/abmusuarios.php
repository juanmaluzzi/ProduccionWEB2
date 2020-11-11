<div class="container mb-5">
    <div class="col-12">
        <h2 class="text-center">
                Usuarios registrados
        </h2>
    </div>
    
    <div>
    <a type="button" class="btn btn-dark text-light btn-sm" href="index.php?seccion=crearusr">Crear nuevo usuario</a>
    </div>
    
    <div class="card mb-5">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Perfil</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php

                        //$usuario = ; ******* ARMAR QUERY QUE TRAIGA USUARIOS *************
                        //$perfil = ; ******* ARMAR QUERY QUE TRAIGA PERFILES *************
                        //$permisos = ; ******* ARMAR QUERY QUE TRAIGA PERMISOS *************
                        ?>
                                <tr>
                                    <td><?= $usuario; ?></td>
                                    <td><?= $mail; ?></td>
                                    <td><?= $perfil; ?></td>

                                    <td>
                                    
                                        <div class="btn-group" role="group" aria-label="">
                                            <a type="button" class="btn btn-dark text-light btn-sm" href="../index.php?seccion=registrate&id=<?= $mail; ?>">Editar</a>
                                            <form action="acciones/borrar_usr.php" method="POST">
                                                <input type="hidden" name="id" value="<?= $mail; ?>">
                                                <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            
                        <h2 class="alert text-center">No hay usuarios registrados</h2>
                </tbody>
            </table>    
        </div>
    </div>
</div>