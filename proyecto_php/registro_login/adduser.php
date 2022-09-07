<?php
include('../db.php');
//<---------------------DECLARACION DE FUNCIONES -------------->
function valvac($campo,$string){
    if ($string == '' or strlen($string) < 4){
        return "El campo $campo, no puede estar vacío ni tener menos de 4 caracteres";
    }


}function numono($campo,$str){
    if (strpos($str,'0') or strpos($str,'1') or strpos($str,'2') or strpos($str,'3') or strpos($str,'4') or strpos($str,'5') or strpos($str,'6')  or strpos($str,'7') or strpos($str,'8') or strpos($str,'9')){
        return "El campo $campo no puede tener números";

    }else{
        return FALSE;
    }
}

function compare($pw,$reppw){
    if ($pw !== $reppw){

    }
}
    

if (isset($_POST['adduser'])){
    $campos = array();
    array_push($campos,$_POST['nombre'], $_POST['apellido'],$_POST['contraseña'],$_POST['repetir_contraseña']);
    $pass = $_POST['contraseña'] ;
    $hash = password_hash($pass,PASSWORD_DEFAULT,['cost' => 5]);
     

    $msg = array();
    $bandera = FALSE;

    //VALIDACION NOMBRE
    if (valvac('nombre',$campos[0])){
       $bandera = TRUE;
       array_push($msg,valvac('nombre',$_POST['nombre']));      
    }
    if(numono('nombre',$campos[0])){
        $bandera = TRUE;
        array_push($msg,numono('nombre',$campos[0]));
    
    }
    //VALIDACION APELLIDO
    if (valvac('apellido',$campos[1])){
        $bandera = TRUE;
        array_push($msg,valvac('apellido',$_POST['apellido']));      
     }
     if(numono('apellido',$campos[1])){
         $bandera = TRUE;
         array_push($msg,numono('apellido',$campos[1]));
     }
     //VALIDACION DE COINCIDENCIA DE CONTRASEÑAS
     if($campos[2] != $campos[3]){
        $bandera = TRUE;
        array_push($msg,'Las contraseñas ingresadas no coinciden');
     }
     if ($bandera == TRUE){
        $_SESSION['mensajes'] = $msg;
        header('Location: registro.php');
     }else{
        $_SESSION['campos'] = $campos;
        $query = "INSERT INTO usuarios (nombre,apellido,contraseña,id_rol) VALUES ('$campos[0]', '$campos[1]','$hash',1)";
        $resultado = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($resultado);
        echo $row['id_rol'];
        header('Location: login.php');
     }
};
   

?>