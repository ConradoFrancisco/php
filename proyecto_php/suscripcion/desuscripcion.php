<?php 
    include('../db.php');
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM suscripciones WHERE id = $id";
        $resultado = mysqli_query($conn,$query);
        $_SESSION['msg'] = " libro removido exitosamente";
        header("Location: suscripciones.php");
    }
    

    
?>