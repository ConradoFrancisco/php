<?php
    
    include('../includes/header.php');
    session_start();
    ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto pt-4">
            <div class="card card-body ">
                <h3>Ingreso</h3>
            <form action="logeo.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="Usuario" placeholder="Usuario" autofocus >
                    </div>
                    <div class="form-group pt-4">
                        <input type="password" class="form-control" name="Contraseña" placeholder="Contraseña">
                    </div>
                    <div class="form-group pt-4"><input type="submit" class="btn btn-success btn-block" name="ingreso"></div>
                </form>
            </div>
        </div>
    </div>
    <?php
        if(isset($_SESSION['msg'])){
            for ($i = 0 ; $i < count($_SESSION['msg']); $i++) {?>
                <div class="row ">
                    <div class="col-md-4 mx-auto pt-4">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['msg'][$i];?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
        <?php }?>
        <?php session_unset();?>
    <?php } ?>
</div>




    <?php include('../includes/footer.php');




?>