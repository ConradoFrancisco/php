<?php
    function valvac($string,$camp){
        if ($string == '' or strlen($string) < 4){
            return $msj = "El campo $camp, no puede estar vacío ni tener menos de 4 caracteres";
        }
    }

    function numono($str){
        if (strpos($str,'0') or strpos($str,'1') or strpos($str,'2') or strpos($str,'3') or strpos($str,'4') or strpos($str,'5') or strpos($str,'6')  or strpos($str,'7') or strpos($str,'8') or strpos($str,'9')){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    function islogged(){
        if(!isset($_SESSION)){
            header('Location: login.php');
        };
    };
?>