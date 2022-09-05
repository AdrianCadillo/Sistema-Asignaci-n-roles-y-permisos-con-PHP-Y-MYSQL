<?php 
namespace interface;
use interface\IRepository;
interface IRol extends IRepository {
    /**
     * Crear nuevos roles
     */

     public function store($Namerol);

     /**
      * Asignar permisos a roles
      */
     public function role_has_permissions($namrol,$id_permiso);

       /**
      * Asignar permisos a roles
      */
      public function role_has_permission($id_rol,$id_permiso);

     /**
      * permisos por rol
      */
      public function permissionsXRol($id);

     /**
      * permisos no asignados por rol
      */
      public function notPermissionsXRol($id);

      /**
       * Eliminamos los permisos con respecto a un rol
       */

    public function deletePermissionRol($id);

  
 
   
   
}
?>