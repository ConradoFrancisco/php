<?php 
   include('includes/header.php');
   include('db.php');
   
   if (isset($_GET['id'])){
       $id = $_GET['id']; 
       $query = "DELETE FROM usuarios WHERE id = $id";
       $resultado = mysqli_query($conn,$query);
       $_SESSION['msg'] = "Usuario removido exitosamente";
       $_SESSION['tipo'] = "danger";
       header("Location: visusers.php");
   };
?>