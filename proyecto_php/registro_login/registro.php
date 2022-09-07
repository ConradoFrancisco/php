<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylessheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylessheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="errores.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://kit.fontawesome.com/e4e1e5bd67.js" crossorigin="anonymous"></script>
    
    <title>Ingreso</title>
</head>
<body>
<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
            <div class="container">
            <!-- <div class="container-fluid"> -->
              <a class="navbar-brand" href="#">Suscribirse a los libros que desee</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../registro_login/perfil.php">Mi perfil</a></li>
                      <li><a class="dropdown-item" href="../suscripcion/suscripcion.php">Ver Libros</a></li>
                      <li><a class="dropdown-item" href="logout.php">Cerrar Sesión</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto p-4">
        <?php
            if(isset($_SESSION['mensajes'])){
                for ($i = 0 ; $i < count($_SESSION['mensajes']); $i++) {?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['mensajes'][$i];?> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php }?>
            <?php session_unset();?>
        <?php } ?>
            <div class="card card-body">
                <h3 class="title">Registro</h3>
                <form action="adduser.php" method="POST" id ="registro">
                    <div class="form-group ">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre*" autofocus>
                    </div>
                    <div class="form-group pt-4">
                        <input type="text" class="form-control"  id ="apellido" name="apellido" placeholder="Apellido*">
                    </div>
                    <div class="form-group pt-4">
                        <input type="password" class="form-control"  id ="contraseña" name="contraseña" placeholder="Contraseña*">
                    </div>
                    <div class="form-group pt-4">
                        <input type="password" class="form-control" id ="pass1"  name="repetir_contraseña" placeholder="Repetir Contraseña*">
                    </div>
                    
                    <div class="form-group pt-4"><input type="submit" class="btn btn-success btn-block" name="adduser"></div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="../includes/js/validator.js"></script>
<?php
include("../includes/footer.php");

?>