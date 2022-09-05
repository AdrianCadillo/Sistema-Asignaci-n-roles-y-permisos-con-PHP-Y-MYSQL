<?php
require '../layouts/Dashboard/menu.php';
require '../../src/controller/RolController.php'; 

 //// validamos si tiene acceso a esta página , protegiendo esta ruta -----
 if(count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'],'Rol.editar'))<=0 or count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'],'Rol.index'))<=0){
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
                        <h3>Editar roles</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="namerol">Nombre rol <b>(*)</b></label>
                            <input type="text" class="form-control" name="namerol" id="namerol" placeholder="Nombre rol...." autofocus value="<?php echo $rolEdit[0]['name']; ?>">

                        </div>

                        <div class="row">

                            <span class="text-danger"> Seleccione los permisos para este rol</span>
                            <br>
                            <?php
                            foreach ($permisos as $key => $prm) {
                            ?>
                                <?php
                                foreach ($PermisosXRol as $key => $permiso) {
                                    if ($prm['namepermiso'] == $permiso['name']) {
                                ?>
                                        <div class="col-xl-6 col-lg-6 col-md-6  col-12">
                                            <input type="checkbox" name="permisos[]" id="<?php echo $prm['id_permiso'] ?>" value="<?php echo $prm['id_permiso'] ?>" style="width:25px;height:25px;" checked>
                                            <label for="<?php echo $prm['id_permiso'] ?>" style="cursor: pointer;"><?php echo $prm['descripcion'] ?></label>
                                        </div>
                                <?php  }
                                } ?>

                                <?php
                                foreach ($NotPermissionXRol as $key => $notPermiso) {
                                    if ($prm['namepermiso'] == $notPermiso['name']) {
                                ?>
                                        <div class="col-xl-6 col-lg-6 col-md-6  col-12">
                                            <input type="checkbox" name="permisos[]" id="<?php echo $prm['id_permiso'] ?>" value="<?php echo $prm['id_permiso'] ?>" style="width:25px;height:25px;">
                                            <label for="<?php echo $prm['id_permiso'] ?>" style="cursor: pointer;"><?php echo $prm['descripcion'] ?></label>
                                        </div>
                                <?php  }
                                } ?>

                            <?php } ?>
                        </div>
                    </div>
                    <div class="text-center mx-4">
                        <?php
                        if ($mensaje != '')
                            if ($mensaje == 1) {
                        ?>
                            <div class="alert alert-success">
                                Rol Creado exitosamente
                            </div>
                        <?php } else { ?>

                            <?php
                                if ($mensaje == 2) {
                            ?>
                                <div class="alert alert-warning">
                                    Rol ya existe
                                </div>
                        <?php } else {
                                    if ($mensaje == "vacio") {
                                        echo ' <div class="alert alert-danger">
                Error al crear rol, complete los datos
               </div>';
                                    } else {
                                        echo ' <div class="alert alert-danger">
                Error al crear rol, intentelo más tarde
               </div>';
                                    }
                                }
                            } ?>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-success" name="updaterol" id="update">Guardar cambios <i class="fas fa-save"></i></button>
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
<script src="../controller/rol.js"></script>

</div>
<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>

<script>
    var Id_rol = "<?php echo $_GET['id']; ?>";
    var IDS;
    $(document).ready(function() {
        $('input[name=namerol]').select();
        $('#update').click(function(e) {
            e.preventDefault();
            NamRol = $('input[name=namerol]').val();
           
            modifyRol(Id_rol, NamRol)
           
        });
    });
</script>