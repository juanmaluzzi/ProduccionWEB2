
 <?php require_once 'inc/mysql_login.php'; 
    
    ?>

    <h1> Base de datos</h1>
    
    <?php

            try { 

           $con = new PDO ('mysql:host='.$hostname.';dbname='.$database.';port='.$puerto, $username, $password);

        print "Conectado a la base de datos";
        } 

        catch (PDOException $e)    { 
        print "!NO CONECTA: " .$e->getMessage();

        die ();
        } 


        ?>