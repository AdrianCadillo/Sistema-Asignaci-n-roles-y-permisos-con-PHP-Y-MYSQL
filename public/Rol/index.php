<?php
require '../layouts/Dashboard/menu.php';
require '../../src/controller/RolController.php';
//// validamos si tiene acceso a esta página , protegiendo esta ruta -----
if (count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'], 'Rol.index')) <= 0) {
  echo "<script>location.href='" . $RedirectError . "'</script>";
}
?>

<!--- contenido ----->

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <span class="float-start">
            <h3>Listado de roles</h3>
          </span>
          <?php
          if (count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'], 'Rol.create')) > 0) { ?>
            <span class="float-end">
              <a href="create" class="btn btn-primary">nuevo rol <b> +</b></a>
            </span>

          <?php } ?>
        </div>

        <div class="card-body table-responsive">
          <table id="TablaRoles" class="display responsive nowrap" style="width:100%;">
            <thead>
              <tr>
                <th>ITEM</th>
                <td style="width:500px">ROL</th>
                <th>Permisos</th>
                <th>GESTIONAR</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $item = 0;
              foreach ($roles as $key => $rols) {
                $item += 1;
              ?>
                <tr>
                  <td><?php echo $item; ?></td>
                  <td><?php echo $rols['name']; ?></td>
                  <td>
                    <?php
                    if (count($rol->permissionsXRol($rols['id_rol'])) > 0) {
                      foreach ($rol->permissionsXRol($rols['id_rol']) as $key => $value) {
                    ?>
                        <span class="badge bg-primary"><?php echo $value['name']; ?></span>
                    <?php }
                    } else {
                      echo '<span class="badge bg-danger">Aún no posee permisos...</span> ';
                    }
                    ?>
                  </td>
                  <td>
                    <div class="row">
                      <?php
                      //// validamos si tiene acceso a esta acción
                      if (count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'], 'Rol.editar'))>0) {
                      ?>
                        <div class="col-xl-2 col-lg-3 col-md-2 col-sm-2 col-12 ">
                          <a class="btn btn-warning btn-sm" href="editar?id=<?php echo $rols['id_rol'] ?>"><i class="fas fa-pencil"></i></a>
                        </div>

                      <?php } ?>
                      <?php
                      //// validamos si tiene acceso a esta acción
                      if (count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'], 'Rol.delete'))>0) {
                      ?>
                      <div class="col-xl-2 col-lg-3 col-md-2 col-sm-2 col-12 mx-xl-3 mx-lg-3 mx-md-3 mx-0 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-0 mt-1">

                        <input type="text" name="id_rol" value="<?php echo $rols['id_rol']; ?>" hidden>
                        <button class="btn btn-danger btn-sm " name="delete" onclick="destroy('<?php echo $rols['id_rol']; ?>',
                      '<?php echo $rols['name']; ?>')"><i class="fas fa-trash-alt"></i></button>

                      </div>

                      <?php } ?>
                    </div>

                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <div class="text-center">
            <?php
            if ($mensaje != '')
              if ($mensaje == 1) {
            ?>
              <div class="alert alert-success">
                Rol eliminado correctamente
              </div>
            <?php } else { ?>

              <?php
                if ($mensaje == 2) {
              ?>
                <div class="alert alert-warning">
                  Rol ya existe
                </div>
            <?php } else {
                  echo ' <div class="alert alert-danger">
                Error al crear rol, intentelo más tarde
               </div>';
                }
              } ?>
          </div>
        </div>
      </div>
    </div>
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
  $(document).ready(function() {
    var TablaRole = $('#TablaRoles').DataTable({
      'language': {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }
    })
  });
</script>