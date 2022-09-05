<?php 
namespace model;

use interface\IRol;
use model\ServiceImpl;

class RolImpl extends ServiceImpl implements IRol{
  /**
   * Crear nuevos roles
   */

  public function store($Namerol)
  {
    $value = 0;
    $this->Query = "INSERT INTO roles(name) VALUES(?)"; /// query para insertar datos en roles

    $QueryExiste = "SELECT *fROM roles WHERE name=?";

    // verificamos si existe
    if ($this->findByData($QueryExiste, $Namerol) > 0) {
      $value = 2;
    } else {
      $value = $this->crudService($this->Query, [$Namerol]); /// retorna 0 | 1
    }
    return $value;
  }

  /**
   * MOSTRAR DATOS
   */

  public function all()
  {
    return $this->getData("SELECT *FROM roles");
  }

  /**
   * REGISTRAR DATOS
   */

  public function save($datos = array())
  {
  }

  /**
   * ACTUALIZAR DATOS
   */
  public function update($datos = array())
  {
    $value = 0;
    $Query = "UPDATE roles SET name=? WHERE id_rol=?";

    $QueryExiste = "SELECT *fROM roles WHERE name=?";

    if ($this->findByData($QueryExiste, $datos[0]) > 0) {
      $value = 2;
    } else {
      $value = $this->crudService($Query, $datos);
    }

    return $value;
  }


  /**
   * Editar datos
   */
  public function edit($id)
  {

    return $this->findById("SELECT *FROM  roles WHERE id_rol=?", $id);
  }

  /**
   * Eliminar datos
   */

  public function delete($id)
  {
    if($this->findByData("SELECT *fROM permissions_has_roles WHERE id_rol in(?)",$id)>0){
      return 2;
    }else{
      if($this->findByData("SELECT *FROM usuario_has_roles WHERE id_rol in(?)",$id)>0){
        return 2;
      }else{
        return $this->crudService("DELETE FROM roles WHERE id_rol=?", [$id]);
      }
    }
  }

  /**
   * Asignar permisos a roles
   */
  public function role_has_permissions($namrol, $id_permiso)
  {
    return $this->crudService(
      "INSERT INTO permissions_has_roles(id_permiso,id_rol) VALUES(?,(select id_rol from roles WHERE name=?))",
      [$id_permiso, $namrol]
    );
  }


    /**
   * Asignar permisos a roles
   */
  public function role_has_permission($id_rol, $id_permiso)
  {
    return $this->crudService(
      "INSERT INTO permissions_has_roles(id_permiso,id_rol) VALUES(?,?)",
      [$id_permiso, $id_rol]
    );
  }


  /**
   * Permisos por rol
   */

  public function permissionsXRol($id)
  {
    $Query = "select name from permissions
        where id_permiso in(select pr.id_permiso from permissions_has_roles pr
        where pr.id_rol=?);";
    return $this->findById($Query, $id);
  }

  /**
   * Permisos no asigandos por rol
   */
  public function notPermissionsXRol($id)
  {
    $Query = "select name from permissions
        where id_permiso not in(select pr.id_permiso from permissions_has_roles pr
        where pr.id_rol=?);";
    return $this->findById($Query, $id);
  }

  /**
   * Eliminamos los permisos con respecto a un rol
   */
  public function deletePermissionRol($id)
  {
  return  $this->crudService("DELETE FROM permissions_has_roles WHERE id_rol=?",[$id]);
  }
}
?>