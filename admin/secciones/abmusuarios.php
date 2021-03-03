<div class="container mb-5">
    <div class="col-12">
        <h2 class="text-center">
                Usuarios registrados
        </h2>
    </div>
    
    <div>
    <a type="button" class="btn btn-dark text-light btn-sm mb-2" href="index.php?seccion=crearusr">Crear nuevo usuario</a>
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

                        foreach($Usuario->getUsrs() as $usuario){
                        ?>
                                <tr>
                                    <td><?= $usuario['usr']; ?></td>
                                    <td><?= $usuario['email']; ?></td>
                                    <td><?= $usuario['usr_perfil']; ?></td>

                                    <td>
                                    
                                        <div class="btn-group" role="group" aria-label="">
                                            <a type="button" class="btn btn-dark text-light btn-sm" href="index.php?seccion=crearusr&id=<?= $usuario['id_usr'] ?>">Editar</a>
                                            <form action="acciones/registro.php" method="POST">
                                                <input type="hidden" name="borrar_usr" value="<?= $usuario['id_usr'] ?>">
                                                <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                        }

                            ?>
                            <h3 class="alert text-center <?= $usuario == '' ? '' : 'd-none' ; ?>">¡No hay usuarios registrados!</h3>
                        
                </tbody>
            </table>    
        </div>
    </div>
</div>