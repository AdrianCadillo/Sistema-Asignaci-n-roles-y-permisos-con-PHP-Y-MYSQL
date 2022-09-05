<?php
require '../layouts/Dashboard/menu.php';
require '../../src/controller/RolController.php'; 
require '../../src/controller/UserController.php';
//// validamos si tiene acceso a esta página , protegiendo esta ruta -----
if (count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'], 'Usuario.create')) <= 0) {
    echo "<script>location.href='" . $RedirectError . "'</script>";
  }
?>

<!--- contenido ----->

<div class="container-fluid">
    <div class="row">
    <form action="" method="post">
    <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Crear usuarios</h3>
                </div>

                <div class="card-body">
                 <div class="row">
                 <div class="col-xl-5 col-lg-5 col-md-6 col-12">
                 <div class="form-group">
                 <label for="nameusuario">Nombre usuario <b>(*)</b></label>
                 <input type="text" class="form-control" id="nameusuario" name="nameusuario" id="nameusuario" placeholder="Nombre usuario...." required 
                 autocomplete="nameusuario" autofocus>
                 </div>
                 </div>

                 <div class="col-xl-7 col-lg-7 col-md-6 col-12">
                 <div class="form-group">
                 <label for="username">Username<b>(*)</b></label>
                 <input type="text" class="form-control" id="username" name="username" id="username" placeholder="Username...." required 
                 autocomplete="username" autofocus>
                 </div>
                 </div>

                 <div class="col-xl-7 col-lg-7 col-md-6 col-12">
                 <div class="form-group">
                 <label for="email">Email<b>(*)</b></label>
                 <input type="email" class="form-control"  id="email" name="email" id="email" placeholder="Email...." autofocus
                 required autocomplete="email" >
                 </div>
                 </div>

                 <div class="col-xl-5 col-lg-5 col-md-6 col-12">
                 <div class="form-group">
                 <label for="email">Password<b>(*)</b></label>
                 <input type="password" class="form-control" id="password" name="password" id="password" placeholder="Password...." 
                 required autocomplete="password" autofocus>
                 </div>
                 </div>
                  <br>
                  <br><br>
                 
                  

                 </div>

                 <div class="row">
                 <fieldset class="text-primary">Seleccione los roles para este usuario</fieldset>

                 <?php 
                 if(count($roles)>0){
                 foreach ($roles as $key => $rol) {
                 ?>

                  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-1"  >
                   
                   <input type="checkbox" style="width:20px;height:20px;" id="<?php echo $rol['id_rol'] ?>" style="cursor:pointer ;"
                   value="<?php echo $rol['name'] ?>" name="rols[]" >
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
                        <div class="alert alert-danger"><b>Seleccione los roles para este usuario</b></div>
                        '; 
                    }else{
                        if($mensaje=="1"){
                            echo '
                            <div class="alert alert-success"><b>Usuario creado exitosamente</b></div>
                            ';
                        }else{
                            if($mensaje=="existe"){
                                echo '
                                <div class="alert alert-warning"><b>Este usuario ya existe</b></div>
                                ';
                            }else{
                                echo '
                                <div class="alert alert-danger"><b>Error al crear este usuario,intenetelo más tarde</b></div>
                                ';
                            }
                        }
                    }
                  }
                  ?>

                 </div>
                <div class="card-footer text-center">
                    <button class="btn btn-success" name="saveuser">Guardar <i class="fas fa-save"></i></button>
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