<?php
 
require '../layouts/Dashboard/menu.php';
 ?>

<!--- contenido ----->
 <h3><?php echo $_SESSION['nameusuario']; ?></h3>
 
 <h1><?php echo $_SESSION['rolAuth']; ?></h1>
<!---- FIN COMTENIDO----->


</div>
<!----- FOOTER DASHBOARD---->
<?php include '../layouts/Dashboard/footer.php'; ?>


</div>
<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>