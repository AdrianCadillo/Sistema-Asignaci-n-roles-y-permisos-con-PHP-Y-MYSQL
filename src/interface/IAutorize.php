<?php 
namespace interface;

interface IAutorize {

    /**
     * Autorizar a los usuarios que módulos tienen acceso por rol
     */

     public function Autorize_Permissions($rol);

     /**
      * Autorizar los permisos por rol
      */
    public function PermissionsAuthRol($rol,$permiso);
}
?>