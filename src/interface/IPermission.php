<?php 
namespace interface;

interface IPermission{
    /**
     * Crear nuevos permisos
    */

    public function savePermiso($NamePermiso,$Descripcion,$IdSubModule);

    /**
     * Asignar roles a permisos (store permisssions_has_roles)
     */
    public function savePermission_Has_Roles($NamePermiso,$IdRol);

    /**
     * Mostrar todos los permisos
     */
    public function allPermisos();
}

?>