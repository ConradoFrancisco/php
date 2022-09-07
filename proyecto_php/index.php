<?php
    include('db.php');
    if (!isset($_SESSION['logeado'])){
        header('Location: registro_login/login.php');
    }
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
    <script src="https://kit.fontawesome.com/e4e1e5bd67.js" crossorigin="anonymous"></script>
    <title>Ingreso</title>
</head>
<body>
<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
            <div class="container">
            <!-- <div class="container-fluid"> -->
              <a class="navbar-brand" href="#">Panel Administrador</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/perfil/user.username" >Mi perfil</a></li>
                      <li><a class="dropdown-item" href="/">Ver los Usuarios</a></li>
                      <li><a class="dropdown-item" href="registro_login/logout.php">Cerrar Sesión</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
<div class="container">
    <h1 class="text-center pt-4">Ingrese libros a la biblioteca</h1>
<div class="row pt-4">
    <div class="card card-body">
                    <form action="addlibro.php" method="POST">
                    <div class="form-group ">
                            <input type="text" class="form-control" name="titulo" placeholder="Titulo" autofocus >
                        </div>
                        <div class="form-group pt-4">
                            <input type="text" class="form-control" name="Editorial" placeholder="Editorial">
                        </div>
                        <div class="form-group pt-4">
                            <input name="Autor" placeholder="Autor" class="form-control"></input>
                        </div>
                        <div class="form-group pt-4">
                            <input name="Genero" placeholder="Genero" class="form-control"></input>
                        </div>
                        <div class="form-group pt-4">
                            <input name="Link" placeholder="Link" class="form-control"></input>
                        </div>
    
                        <div class="form-group pt-4"><input type="submit" class="btn btn-success btn-block" name="addlibro"></div>
                    </form>
                </div>
</div>
<div class="row  pt-4">
    <div class="card card-body">
        <table id="tabla" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>titulo</th>
                                    <th>Editorial</th>
                                    <th>Autor</th>
                                    <th>Genero</th>
                                    <th>link</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * from libros";
                                    $result = mysqli_query($conn,$query);
        
                                    while ($row = mysqli_fetch_array($result)) { ?>
                                        <tr>
                                            <td>
                                                <?php  echo $row['titulo']?>
                                            </td>
                                            <td>
                                                <?php  echo $row['Editorial']?>
                                            </td>
                                            <td>
                                                <?php  echo $row['Autor']?>
                                            </td>
                                            <td>
                                                <?php  echo $row['Genero']?>
                                            </td>
                                            <td>
                                                <?php  echo $row['link']?>
                                            </td>
                                            <td>
                                                <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-primary " >
                                                    <i class="fa-regular fa-pen-to-square  "></i>
                                                </a>
                                                <a href="eliminar.php?id=<?php echo $row['id'] ?> " class="btn btn-danger">
                                                    <i class="fa-solid fa-trash "></i>
                                                </a>
                                            </td>
                                        </tr>
        
                                   <?php }?>
        
        
                            </tbody>
                    </table>
    </div>
                <?php
                    if(isset($_SESSION['mensaje'])){ ?>
                        <div class="alert alert-<?php echo $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['mensaje'];?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                   <?php } session_unset()?>
    </div>
</div>

<?php 
    include('includes/footer.php')
?>
