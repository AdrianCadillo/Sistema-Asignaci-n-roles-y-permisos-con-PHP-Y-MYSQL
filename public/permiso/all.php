<?php
require '../layouts/Dashboard/menu.php';
require '../../src/controller/PermisoController.php';

//// validamos si tiene acceso a esta página , protegiendo esta ruta -----
if(count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'],'Permiso.index'))<=0){
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
                        <h3>Listado de Permisos</h3>
                    </span>
                    <?php
                    if (count($Autorize->PermissionsAuthRol($_SESSION['rolAuth'], 'Permiso.create')) > 0) {
                    ?>
                        <span class="float-end">
                            <a href="create" class="btn btn-primary">nuevo permiso <b> +</b></a>
                        </span>
                    <?php } ?>
                </div>

                <div class="card-body table-responsive">
                    <table id="TablaPermisos" class="display responsive nowrap" style="width:100%;">
                        <thead>
                            <tr>
                                <th>ITEM</td>
                                <th style="width:500px">NOMBRE PERMISO</th>
                                <th style="width:120px ;">DESCRIPCIÓN</th>
                                <th>SUBMODULO</th>
                                <th>ROLES</th>
                                <th>GESTIONAR</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $item = 0;
                            foreach ($ListadoPermisos as $key => $permiso) {
                                $item += 1;
                            ?>
                                <tr>
                                    <td><?php echo $item; ?></td>
                                    <td><?php echo $permiso['namepermiso'] ?></td>
                                    <td><?php echo $permiso['descripcion'] ?></td>
                                    <td><?php echo $permiso['namesubmodulo'] ?></td>
                                    <td><?php echo $permiso['roles'] == null ? '<span class="badge bg-danger">sin roles asignados</span>' : '<span class="badge bg-primary">' . $permiso['roles'] . '</span>'; ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12 ">
                                                <a class="btn btn-warning btn-sm" href="editar?id=<?php echo $rol['id_rol'] ?>"><i class="fas fa-pencil"></i></a>
                                            </div>

                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12 mx-2">

                                                <input type="text" name="id_rol" hidden>
                                                <button class="btn btn-danger btn-sm" name="delete"><i class="fas fa-trash-alt"></i></button>

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
<!----- FOOTER DASHBOARD
SELECT p.id_permiso,p.name,p.descripcion,s.name,GROUP_CONCAT(r.name) as roles FROM
permissions_has_roles pr RIGHT join roles r on pr.id_rol=r.id_rol RIGHT JOIN
permissions p on pr.id_permiso=p.id_permiso inner join submodulos s on 
p.id_submodulo=s.id_submodulo
group by(p.id_permiso)
---->
<?php include '../layouts/Dashboard/footer.php'; ?>



</div>
<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>

<script>
    $(document).ready(function() {
        var TablaUser = $('#TablaPermisos').DataTable({
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