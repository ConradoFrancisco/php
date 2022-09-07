<?php
    include('../db.php');
    include('../includes/header.php');
    $query = "SELECT * FROM LIBROS";
    $resultado = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($resultado);
    if (!isset($_SESSION['logeado'])){
        header('Location: ../registro_login/login.php');
    }
?>


<div class="container">
    <div class="row">
        <div class="col-md-12 pt-4">
        <?php
                    if(isset($_SESSION['msg'])){ ?>
                        <div class="alert alert-<?php echo $_SESSION['tipo']; ?> alert-dismissible fade show" role="alert">
                            <div class="row"><div class="col-md-6"><?php echo $_SESSION['msg'];?></div> <div class="col-md-6"><a href="suscripciones.php" style="text-decoration:none; color:green ;"class="mx-auto">Ver tus suscripciones</a></div></div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                   <?php } unset($_SESSION['msg']) ?>
            
            <div class="card card-body">
                <table id="tablauser" class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Titulo
                            </th>
                            <th>
                                Editorial
                            </th>
                            <th>
                                Autor
                            </th>
                            <th>
                                Suscribirse
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($row = mysqli_fetch_array($resultado)) {?>
                        
                            <tr>
                                <td>
                                    <?php echo $row['titulo']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Editorial'];?>
                                </td>
                                <td>
                                    <?php echo $row['Autor']; ?>
                                </td>
                                <td>
                                <a href="subscribe.php?id=<?php echo $row['id'] ?>" class="btn btn-success">
                                                        <i class="fa-solid fa-angles-right "></i>
                                                    </a>
                                </td>
                            </tr>
                        <?php };?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
    include('../includes/footer.php');
?>
<script src="../includes/js/user.js"></script>