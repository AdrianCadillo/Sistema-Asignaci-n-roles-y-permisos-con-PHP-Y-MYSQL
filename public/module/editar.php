<?php
require '../layouts/Dashboard/menu.php';
require '../../src/controller/ModuloController.php';

//// validamos si tiene acceso a esta página , protegiendo esta ruta -----
if(count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'],'Modulo.editar'))<=0 || count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'],'Modulo.index'))<=0  ){
    echo "<script>location.href='".$RedirectError ."'</script>";
    
   }

?>

<!--- contenido ----->

<div class="container-fluid">
    <div class="row">
        <form action="" method="post">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3>Editar Módulos</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                if (isset($_REQUEST['id'])) {
                                ?>
                                    <div class="form-group">
                                        <label for="namemodulo">Nombre módulo <b>(*)</b></label>
                                        <input type="text" class="form-control" id="namemodulo" name="namemodulo" placeholder="Nombre módulo...." required autocomplete="namemodulo" autofocus
                                        value="<?php echo $listaModulos[0]['name']?>">
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-danger">
                                        <b>Error, al mostrar datos de edición de Módulos
                                            <a href="all">Ir a listado de módulos</a>
                                        </b>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
 
                    <div class="card-footer text-center">
                        <button class="btn btn-success" name="modifymodulo">Guardar <i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!---- FIN COMTENIDO----->


</div>
<!----- FOOTER DASHBOARD---->
<?php include '../layouts/Dashboard/footer.php'; ?>


</div>
<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<script>
    $(document).ready(function(){
    $('input[name=namemodulo]').select();
    });
</script>