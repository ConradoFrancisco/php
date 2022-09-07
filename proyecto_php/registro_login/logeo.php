<?php
    include('../db.php');
    /* password_verify($pass,$row['contraseña']) */
    $msg = array();
    $user = $_POST['Usuario'];
    $pass = $_POST['Contraseña'];
    $bandera = FALSE;
    if(isset($_POST['ingreso'])){
        $query = "SELECT * FROM usuarios WHERE nombre = '$user'";
        $resultado = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($resultado);
        
        if($row){
            if (password_verify($pass,$row['Contraseña'])){
               echo $row['contraseña'];
                session_start();
                $_SESSION['logeado'] = 'estoy';
                 if ($row['id_rol'] == 1){
                    $_SESSION['id'] = $row['id'];    
                    $_SESSION['user'] = $row['nombre'];
                    header('location: perfil.php');                   
                 }else{
                    $_SESSION['id'] = $row['id'];   
                    $_SESSION['user'] = $row['nombre'];
                    header('location: ../index.php');
                 }  
            }else{
               echo $row['Contraseña'];
             array_push($msg,'Contraseña incorrecta');
             $bandera = TRUE;
            };
         }else{
             array_push($msg,'El usuario ingresado no es correcto');
             $bandera = TRUE;
             }
             if($bandera == TRUE){
                $_SESSION['msg'] = $msg;
                header('Location: login.php');
        }
    }

            /* if ($row['contraseña'] == $_POST['Contraseña']){
                session_start();
                $_SESSION['logeado'] = 'estoy';
                 if ($row['id_rol'] == 1){
                    $_SESSION['id'] = $row['id'];    
                    $_SESSION['user'] = $row['nombre'];
                    header('location: perfil.php');                   
                 }else{
                    $_SESSION['id'] = $row['id'];   
                    $_SESSION['user'] = $row['nombre'];
                    header('location: ../index.php');
                 }  
            }else{
             array_push($msg,'Contraseña incorrecta');
             $bandera = TRUE;
            };
         }else{
             array_push($msg,'El usuario ingresado no es correcto');
             $bandera = TRUE;
         };

         if($bandera == TRUE){
            $_SESSION['msg'] = $msg;
            header('Location: login.php');
        } */
    

    
    
    

    
?>  

