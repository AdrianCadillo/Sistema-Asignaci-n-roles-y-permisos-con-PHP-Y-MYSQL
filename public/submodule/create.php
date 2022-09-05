<?php
require '../layouts/Dashboard/menu.php';
require '../../src/controller/ModuloController.php';
require '../../src/controller/SubModuloController.php';

//// validamos si tiene acceso a esta página , protegiendo esta ruta -----
if(count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'],'SubModulo.create'))<=0){
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
                        <h3>Crear subMódulos</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="namesubmodulo">Nombre submódulo <b>(*)</b></label>
                                    <input type="text" class="form-control" id="namesubmodulo" name="namesubmodulo" placeholder="Nombre submódulo...." required autocomplete="namesubmodulo" autofocus>
                                </div>
                            </div>

                            <div class="col-xl-10 col-lg-10  col-md-9 col-8">
                                <div class="form-group">
                                    <label for="descripcion">Seleccione Módulo <b>(*)</b></label>
                                    <select name="modulo" id="modulo" required autocomplete="modulo" class="form-select">
                                        <option disabled selected> --- Seleccione un módulo --- </option>
                                        <?php 
                                        foreach ($listaModulos as $key => $modulo) {
                                        ?>
                                        <option value="<?php echo $modulo['id_modulo'];?>"><?php echo $modulo['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-2 col-lg-2 col-md-3 col-4 mt-4">
                            <div class="form-group">
                            <button class="btn btn-primary form-control">nuevo <b>+</b></button>
                            </div>
                            </div>


                        </div>

                    </div>
                    <div class="text-center mx-4">
                        <?php
                        if ($mensaje != '')
                            if ($mensaje == "1") {
                                echo '
                    <div class="alert alert-success">Módulo Registrado correctamente</div>
                    ';
                            } else {
                                if ($mensaje == "2") {
                                    echo '
                        <div class="alert alert-warning">No se permite duplicación de datos</div>
                        ';
                                } else {
                                    echo '
                        <div class="alert alert-danger">Error al registrar módulo, intenetelo más tarde</div>
                        ';
                                }
                            }
                        ?>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-success" name="savesubmodulo">Guardar <i class="fas fa-save"></i></button>
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