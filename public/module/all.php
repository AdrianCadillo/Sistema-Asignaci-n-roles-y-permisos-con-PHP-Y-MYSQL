<?php
require '../layouts/Dashboard/menu.php';
require '../../src/controller/ModuloController.php';

//// validamos si tiene acceso a esta página , protegiendo esta ruta -----
if(count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'],'Modulo.index'))<=0){
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
                        <span class="float-start">
                            <h3>Listado de Módulos</h3>
                        </span>

                        <?php
                        if (count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'], 'Modulo.create')) > 0) {
                        ?>
                            <span class="float-end">
                                <a href="create" class="btn btn-primary">nuevo módulo <b>+</b></a>
                            </span>
                        <?php } ?>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                if (isset($_SESSION['msg'])) {
                                    if ($_SESSION['msg'] == "1") {
                                        echo '
                                    <div class="alert alert-success text-center">
                                    Rol modificado correctamente
                                 </div>
                                    ';
                                    } else {
                                        if ($_SESSION['msg'] == "2") {
                                            echo '
                                        <div class="alert alert-warning text-center">
                                        Los datos no han sido alterados
                                     </div>
                                        ';
                                        }
                                    }
                                    unset($_SESSION['msg']);
                                }
                                ?>

                                <?php
                                if (isset($_SESSION['msgdelete'])) {
                                    if ($_SESSION['msgdelete'] == "1") {
                                        echo '
                                    <div class="alert alert-success text-center">
                                    Rol eliminado correctamente
                                 </div>
                                    ';
                                    } else {
                                        if ($_SESSION['msgdelete'] == "2") {
                                            echo '
                                        <div class="alert alert-danger text-center">
                                        Los datos no han sido alterados, tus datos están a salvo, ya que ese módulo ya está en uso
                                     </div>
                                        ';
                                        }
                                    }
                                    unset($_SESSION['msgdelete']);
                                }
                                ?>


                            </div>

                            <div class="col mt-1">
                                <table class="display responsive nowrap" style="width:100%;" id="tableModulos">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th style="width:500px;">Nombre Módulo</th>
                                            <th>Gestionar</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $item = 0;
                                        foreach ($listaModulos as $key => $value) {
                                            $item += 1; ?>
                                            <tr>
                                                <td><?php echo $item; ?></td>
                                                <td><?php echo $value['name']; ?></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 m-xl-2 m-lg-2 m-md-1 m-0">
                                                            <a href="editar?id=<?php echo $value['id_modulo']; ?>" class="btn btn-warning btn-sm"> <i class="fas fa-pencil"></i></a>
                                                        </div>

                                                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-12 m-xl-2 m-lg-2 m-md-1 m-1">
                                                            <form action="" method="post">
                                                                <input type="text" name="iddelete" value="<?php echo $value['id_modulo']; ?>" hidden>
                                                                <button class="btn btn-danger btn-sm" name="deletemodulo"><i class="fas fa-close"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>

                        </div>

                    </div>
                    <div class="text-center mx-4">
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
    $(document).ready(function() {
        var TablaRole = $('#tableModulos').DataTable({
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