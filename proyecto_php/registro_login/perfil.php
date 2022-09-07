<?php 
    include('../includes/header.php');
    session_start();
    include('../funcionesVal/funciones.php');
    if (!isset($_SESSION['logeado'])){
        header('Location: login.php');
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto pt-4">
            <div class="card">
                <div class="card-body text-center">
                    <h3>Bienvenido <?php echo $_SESSION['user'];?></h3>
                    <p class="pt-2"><a href="../suscripcion/suscripcion.php" style="color: black;">Suscríbase a los libros que desee</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    include('../includes/footer.php');
?>