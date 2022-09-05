<?php
require '../layouts/Dashboard/menu.php';
require '../../src/controller/SubModuloController.php'; 

//// validamos si tiene acceso a esta página , protegiendo esta ruta -----
if(count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'],'SubModulo.index'))<=0){
  echo "<script>location.href='".$RedirectError ."'</script>";
  
 }
?>

<!--- contenido ----->

<div class="container-fluid">
  <div class="row">

    <div class="col">
      <div class="card">
        <div class="card-header">
          <span class="float-start">
            <h3>Listado de SubModulos</h3>
          </span>
          <?php
          if (count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'], 'SubModulo.create')) > 0) {
          ?>
            <span class="float-end">
              <a href="create" class="btn btn-primary">nuevo submodulo<b> +</b></a>
            </span>
          <?php } ?>
        </div>

        <div class="card-body table-responsive">
          <table id="TablaSubModule" class="display responsive nowrap" style="width:100%;">
            <thead>
              <tr>
                <td>ITEM</td>
                <td style="width:500px">NOMBRES SUBMODULO</td>
                <td style="width:120px ;">MÓDULO</td>
                <td>GESTIONAR</td>
              </tr>
            </thead>

            <tbody>
              <?php
              $item = 0;
              foreach ($listadoSubmodulos as $key => $submodule) {
                $item += 1;
              ?>
                <tr>
                  <td><?php echo $item; ?></td>
                  <td><?php echo $submodule['namesubmodule']; ?></td>
                  <td>
                    <?php
                    if ($submodule['namemodule'] != '')
                      echo $submodule['namemodule'];
                    else
                      echo '<span class="badge bg-danger">sin módulo......</span>';
                    ?>
                  </td>

                  <td>
                    <div class="row">
                      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12 m-xl-2 m-lg-2 m-md-1 m-sm-2 m-0">
                        <a class="btn btn-warning btn-sm" href="editar?id=<?php echo $submodule['id_submodulo'] ?>"><i class="fas fa-pencil"></i></a>
                      </div>

                      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12 m-xl-2 m-lg-2 m-md-1 m-sm-2 m-0">
                        <form action="" method="post">
                          <input type="text" name="id_rol" value="<?php echo $rol['id_rol']; ?>" hidden>
                          <button class="btn btn-danger btn-sm" name="delete"><i class="fas fa-trash-alt"></i></button>
                        </form>

                      </div>
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
    var TablaUser = $('#TablaSubModule').DataTable({
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