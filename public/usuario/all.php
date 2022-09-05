<?php
require '../layouts/Dashboard/menu.php';
require '../../src/controller/UserController.php';

//// validamos si tiene acceso a esta página , protegiendo esta ruta -----
if (count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'], 'Usuario.index')) <= 0) {
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
            <h3>Listado de usuarios</h3>
          </span>
          <?php
          if (count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'], 'Usuario.create')) > 0) {
          ?>
            <span class="float-end">
              <a href="create" class="btn btn-primary">nuevo usuario <b> +</b></a>
            </span>
          <?php } ?>
        </div>

        <div class="card-body table-responsive">
          <table id="TablaUser" class="display responsive nowrap" style="width:100%;">
            <thead>
              <tr>
                <td>ITEM</td>
                <td style="width:500px">NOMBRES COMPLETOS</td>
                <td style="width:120px ;">USERNAME</td>
                <td>EMAIL</td>
                <th style="width:400px;">ROLES</th>
                <td>GESTIONAR</td>
              </tr>
            </thead>

            <tbody>
              <?php
              $item = 0;
              foreach ($usuarios as $key => $users) {
                $item += 1;
              ?>
                <tr>
                  <td><?php echo $item; ?></td>
                  <td><?php echo $users['name']; ?></td>
                  <td><?php echo $users['username']; ?></td>
                  <td><?php echo $users['email']; ?></td>
                  <td>
                    <?php
                    $roles = $user->RolXUsuario($users['id_usuario']);
                    if (count($roles))
                      foreach ($roles as $role) {
                        echo "<span class='badge bg-primary mx-1'>" . $role['name'] . "</span>";
                      }
                    else
                      echo "<span class='badge bg-danger mx-1'>No hay roles asignados para este usuario...</span>";;
                    ?>
                  </td>
                  <td>
                    <div class="row">
                      <?php
                      //// validamos si tiene acceso a esta página , protegiendo esta ruta -----
                      if (count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'], 'Usuario.editar'))>0) {
                      ?>
                      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12">
                        <a class="btn btn-warning btn-sm" href="editar?id=<?php echo $users['id_usuario'] ?>"><i class="fas fa-pencil"></i></a>
                      </div>
                      <?php } ?>


                      <?php
                      //// validamos si tiene acceso a esta página , protegiendo esta ruta -----
                      if (count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'], 'Usuario.delete')) > 0) {
                      ?>
                      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12">

                        <input type="text" name="id_rol" value="<?php echo $rol['id_rol']; ?>" hidden>
                        <button class="btn btn-danger btn-sm" name="delete" onclick="destroy('<?php echo $rol['id_rol']; ?>',
                      '<?php echo $rol['name']; ?>')"><i class="fas fa-trash-alt"></i></button>

                      </div>

                      <?php } ?>
                    </div>

                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <div class="text-center">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!----- FOOTER DASHBOARD---->
<?php include '../layouts/Dashboard/footer.php'; ?>



</div>
<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>

<script>
  $(document).ready(function() {
    var TablaUser = $('#TablaUser').DataTable({
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