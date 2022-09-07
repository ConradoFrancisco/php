<?php
    include('../includes/header.php');
    include('../db.php');
    $user = $_SESSION['id'];
    $query = " SELECT titulo, autor, editorial, link, suscripciones.id, suscripciones.fecha_suscripciones from libros join suscripciones on libros.id = suscripciones.id_libro join usuarios on usuarios.id = suscripciones.id_usuario where usuarios.id = $user";
    $resultado = mysqli_query($conn,$query);
    if (!isset($_SESSION['logeado'])){
        header('Location: ../registro_login/login.php');
    }
?>

<div class="container">
<?php 
    if(isset($_SESSION['msg'])){?>
        <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
            <div class="col-md-6"><?php echo $_SESSION['msg'];?></div> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
   <?php } unset($_SESSION['msg']) ?>
    <div class="h1 text-center">Tus suscripciones</div>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card card-body">
                <table id="tablasusc" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Autor</th>
                            <th>Editorial</th>
                            <th>link</th>
                            <th>Fecha de Suscripción</th>
                            <th>Desuscripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  while ($row = mysqli_fetch_array($resultado)){ ?>
                        <tr>
                            <td>
                                <?php echo $row['titulo'];  ?>
                            </td>
                            <td>
                                <?php echo $row['autor']; ?>
                            </td>
                            <td>
                                <?php echo $row['editorial']; ?>
                            </td>
                            <td>
                                <a href="<?php echo $row['link'];?>"><?php echo $row['link'];?></a>
                            </td>
                            <td>
                                <?php echo $row['fecha_suscripciones'] ;?>
                            </td>
                            <td><a href="desuscripcion.php?id=<?php echo $row['id']; ?>"><i class="fa-solid fa-eraser"></i></a></td>
                        </tr>
                        <?php } ?>
                
                
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../includes/js/suscripciones.js"></script>
<?php include('../includes/footer.php'); ?>