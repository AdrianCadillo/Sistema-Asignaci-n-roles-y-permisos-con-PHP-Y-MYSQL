<?php
require '../layouts/Dashboard/menu.php';
require '../../src/controller/RolController.php'; 
require '../../src/controller/SubModuloController.php'; 
require '../../src/controller/PermisoController.php';

//// validamos si tiene acceso a esta página , protegiendo esta ruta -----
if(count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'],'Permiso.create'))<=0){
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
                    <h3>Asignación de roles a permisos</h3>
                </div>

                <div class="card-body">
                 <div class="row">
                 <div class="col-xl-5 col-lg-5 col-md-6 col-12">
                 <div class="form-group">
                 <label for="namepermiso">Nombre permiso <b>(*)</b></label>
                 <input type="text" class="form-control" id="namepermiso" name="namepermiso"  placeholder="Nombre Permiso...." required 
                 autocomplete="namepermiso" autofocus>
                 </div>
                 </div>

                 <div class="col-xl-7 col-lg-7 col-md-6 col-12">
                 <div class="form-group">
                 <label for="descripcion">Descripción<b>(*)</b></label>
                 <input type="text" class="form-control" id="descripcion" name="descripcion"  placeholder="descripcion...." required 
                 autocomplete="descripcion" autofocus>
                 </div>
                 </div>

                 <div class="col-12">
                 <div class="form-group">
                 <label for="email">Seleccione SubModulo<b>(*)</b></label>
                  <select name="submodulo" id="submodulo" class="form-select" required autocomplete="submodulo" >
                    <option value=""> --- Seleccione un submódulo--- </option>
                    <?php 
                    foreach ($listadoSubmodulos as $key => $submodulo) {
                    ?>
                     <option value="<?php echo $submodulo['id_submodulo']; ?>"><?php echo $submodulo['namesubmodule'];?></option>
                    <?php 
                    }
                    ?>
                  </select>
                 </div>
                 </div>
  
                  <br>
                  <br><br>
 
                 </div>

                 <div class="row">
                 <fieldset class="text-primary">Seleccione los roles para este Permiso</fieldset>

                 <?php 
                 if(count($roles)>0){
                 foreach ($roles as $key => $rol) {
                 ?>

                  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-1"  >
                   
                   <input type="checkbox" style="width:20px;height:20px;" id="<?php echo $rol['id_rol'] ?>" style="cursor:pointer ;"
                   value="<?php echo $rol['id_rol'] ?>" name="rols[]" >
                    <label for="<?php echo $rol['id_rol'] ?>" style="cursor:pointer ;"><?php echo $rol['name'] ?></label>
                </div>
                <?php }
                }else{ ?>
                 <div class="alert alert-danger text-center">
                 <b>No hay roles creados..... Desea crear un rol? Click aquí : <a href="../Rol/create">crear rol</a></b>
                 </div>
                <?php } ?>
                 </div>
                </div>
                 <div class="text-center mx-4">
                  <?php 
                if($mensaje!="")
                  if($mensaje=="vacio"){
                    echo '
                    <div class="alert alert-danger"><b>Complete los campos requeridos</b></div>
                    ';
                  }else{
                    if($mensaje=="vacioroles"){
                        echo '
                        <div class="alert alert-danger"><b>Seleccione los roles para este Permiso</b></div>
                        '; 
                    }else{
                        if($mensaje=="1"){
                            echo '
                            <div class="alert alert-success"><b>Permiso creado exitosamente</b></div>
                            ';
                        }else{
                            if($mensaje=="2"){
                                echo '
                                <div class="alert alert-warning"><b>Este Permiso ya existe</b></div>
                                ';
                            }else{
                                echo '
                                <div class="alert alert-danger"><b>Error al crear este permiso,intenetelo más tarde</b></div>
                                ';
                            }
                        }
                    }
                  }
                  ?>

                 </div>
                <div class="card-footer text-center">
                    <button class="btn btn-success" name="savepermiso">Guardar <i class="fas fa-save"></i></button>
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