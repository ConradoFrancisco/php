<?php 

    include('db.php');

    if (isset($_POST['addlibro'])){
        $titulo = $_POST['titulo'];
        $stock = $_POST['stock'];
        $descripcion = $_POST['descripcion'];

        $query = "INSERT INTO LIBROS(titulo,stock,descripcion) VALUES ('$titulo','$stock','$descripcion')";

        $resultado = mysqli_query($conn,$query);

        if(!isset($resultado)){
            die('fallo');     
        }
        
        
    $_SESSION['mensaje'] = 'Libro añadido correctamente';
    $_SESSION['tipo'] = 'success';
    header('Location: index.php');
        
    }
?>