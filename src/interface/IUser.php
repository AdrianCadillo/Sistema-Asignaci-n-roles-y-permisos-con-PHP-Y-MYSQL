<?php 
namespace interface;
use interface\IRepository;
interface IUser extends IRepository{

    public function createUser($Name,$UserName,$email,$password);

    public function allUser();

    /**
     * Mostarr los roles de un usuario
     */

    public function RolXUsuario($id);

    /**
     * Eliminar todos los roles con respecto a un usuario asignado
     */
    public function deleteRolesUsuario($idUsuario);

    /**
     * Roles que aún no han sido asignados o restantes del usuarios
     */

     public function restRolesUser($id);

     /**
      * Modificar datos de los usuarios
      */

      public function updateUser($Name,$Username,$Email,$Id_usuario);
}
?>