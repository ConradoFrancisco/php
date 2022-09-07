<?php
    include ('../db.php');
    if(isset($_GET['id'])){
        $libro = $_GET['id'];
        $user = $_SESSION['id'];
        $query = "SELECT * FROM suscripciones where id_usuario = $user and id_libro = $libro";
        $resultado = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($resultado);
        if ($row){
            $_SESSION['tipo'] = "danger";
            $_SESSION['msg'] = 'Ups, Ya estas suscrito al libro';
            header('Location: suscripcion.php');
        }else{
            $query = "INSERT INTO suscripciones (id_usuario,id_libro) VALUES ($user,$libro)";
            $resultado = mysqli_query($conn,$query);
            $msg = 'Suscripcion al libro exitosa';
            $_SESSION['tipo'] = "success";
            $_SESSION['msg'] = $msg;
            header('Location: suscripcion.php');
        };


        /* $query = "INSERT INTO suscripciones (id_usuario,id_libro) VALUES ($user,$libro)";
        $resultado = mysqli_query($conn,$query);
        $msg = 'Suscripcion al libro exitosa';
        $_SESSION['msg'] = $msg;
        header('Location: suscripcion.php');  */
    };

?>