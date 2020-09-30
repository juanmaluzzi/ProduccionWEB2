<?php 

if (isset($_POST['contacto01'] )) {
    
    if (!empty($_POST['Nombre']) && !empty($_POST['Email']) && !empty($_POST['Teléfono'])
        && !empty($_POST['Mensaje'])) 
    
  
        
        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $Email = $_POST['Email'];
        $destino= "juan.luzzi@davinci.edu.ar";
        $Teléfono = $_POST['Teléfono'];
        $Mensaje = $_POST['Mensaje'];
        $contenido = "\nNombre: ".$Nombre."\nApellido: ".$Apellido."\nEmail: ".$Email.
            "\nTelefono: ".$Teléfono."\n\nMensaje: ".$Mensaje;
    
        $mail =mail($destino,"Contacto",$contenido);
        
    
        if ($mail) { 
               
            echo "<h4>¡Mensaje enviado exitosamente!</h4>";    
                    } 
    
    
    
   
                                        }                       
