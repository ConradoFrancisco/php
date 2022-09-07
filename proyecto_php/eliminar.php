<?php
    include('db.php');

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM libros where id = $id";
        $result = mysqli_query($conn,$query);

        if(!$result){
            echo $_GET['id'];
        };
        $_SESSION['mensaje'] = 'Libro removido exitosamente'; 
        $_SESSION['tipo'] = 'danger';
        header('Location: index.php');
    };
?>