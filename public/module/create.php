<?php
require '../layouts/Dashboard/menu.php'; 
require '../../src/controller/ModuloController.php';

//// validamos si tiene acceso a esta página , protegiendo esta ruta -----
if(count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'],'Modulo.create'))<=0){
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
                    <h3>Crear Módulos</h3>
                </div>

                <div class="card-body">
                 <div class="row">
                 <div class="col-12">
                 <div class="form-group">
                 <label for="namemodulo">Nombre módulo <b>(*)</b></label>
                 <input type="text" class="form-control" id="namemodulo" name="namemodulo" id="nameusuario" placeholder="Nombre módulo...." required 
                 autocomplete="namemodulo" autofocus>
                 </div>
                 </div>
 
                 
                  

                 </div>
 
                </div>
                 <div class="text-center mx-4">
                  <?php 
                 if($mensaje!='')
                 if($mensaje=="1"){
                    echo '
                    <div class="alert alert-success">Módulo Registrado correctamente</div>
                    ';
                   }else{
                    if($mensaje=="2"){
                        echo '
                        <div class="alert alert-warning">No se permite duplicación de datos</div>
                        ';
                    }else{
                        echo '
                        <div class="alert alert-danger">Error al registrar módulo, intenetelo más tarde</div>
                        ';
                    }
                   }
                  ?>
                 </div>
                <div class="card-footer text-center">
                    <button class="btn btn-success" name="savemodulo">Guardar <i class="fas fa-save"></i></button>
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