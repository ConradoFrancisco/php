<?php
    include('includes/header.php');
    include('db.php');
    
    if (isset($_GET['id'])){
        $query = "DELETE * FROM usuarios WHERE id = $id";
        $resultado = mysqli_query($conn,$query);
        $_SESSION['msg'] = "Usuario removido exitosamente";
        $_SESSION['tipo'] = "danger";
        header("Location: visusers.php");
    };

?>

<div class="container">
<?php
                    if(isset($_SESSION['msg'])){ ?>
                        <div class="alert alert-<?php echo $_SESSION['tipo'] ?> alert-dismissible fade show pt-4" role="alert">
                            <?php echo $_SESSION['msg'];?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                   <?php }unset($_SESSION['msg'])?>

    <div class="row">
        <div class="col-md-9">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Capellido</th>
                        <th>cant de susc</th>
                        <th>eliminar</th>
                    </tr>
                </thead>
                <?php 
                    $query = "select 
                    u.id, u.nombre, u.apellido,
                    (select count(s.id_usuario) from suscripciones s where s.id_usuario = u.id) cantsusc
                    from usuarios u";
                    $resultado = mysqli_query($conn,$query);
                
                    while ($row = mysqli_fetch_array($resultado)){?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['apellido']; ?></td>
                            <td><?php echo $row['cantsusc'];?></td>
                            <td><a href="eliminaruser.php?id=<?php echo $row['id'] ?> " class="btn btn-danger">
                                                    <i class="fa-solid fa-trash "></i>
                                </a></td>
                        </tr>
                   <?php }               
                ?>
                <tbody>
                    <tr>
                        <td>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
