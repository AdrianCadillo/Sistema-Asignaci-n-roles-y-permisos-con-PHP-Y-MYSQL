<?php 
namespace model;
use interface\IUser;
use model\ServiceImpl;

class userimpl extends ServiceImpl implements IUser{

  /**
   * MOSTRAR DATOS
   */

  public function all()
  {
  }

  /**
   * todos los usuarios
   */

  public function allUser()
  {
    return $this->getData("SELECT *FROM usuarios");
  }


  /**
   * Roles por usuario
   */
  public function RolXUsuario($id)
  {
    $Query = "
    SELECT r.id_rol,r.name from usuarios us inner join usuario_has_roles ur on 
    ur.id_usuario=us.id_usuario inner join roles r on 
    ur.id_rol = r.id_rol WHERE us.id_usuario=?;
    ";
    return $this->findById($Query, $id);
  }

  /**
   * REGISTRAR DATOS
   */

  public function save($datos = array())
  {
    $Query = "INSERT INTO usuario_has_roles(id_usuario,id_rol,session) VALUES((SELECT id_usuario FROM usuarios WHERE username=?),
      (SELECT id_rol FROM roles WHERE name=?),'0')";
    return $this->crudService($Query, $datos);
  }

  /**
   * ACTUALIZAR DATOS
   */
  public function update($datos = array())
  {


    $this->save($datos);
  }


  /**
   * Editar datos
   */
  public function edit($id)
  {
    $Query = "SELECT *FROM usuarios WHERE id_usuario=?";
    return $this->findById($Query, $id);
  }

  /**
   * Eliminar datos
   */

  public function delete($id)
  {
  }

  /**
   * CREAR USUARIO
   */

  public function createUser($Name, $UserName, $email, $password)
  {
    $value = 0;
    $Query = "INSERT INTO usuarios(name,username,email,password) VALUES(?,?,?,md5(?))";

    $QueryExisteUser = "SELECT *FROM usuarios WHERE username=? or email=?";
    if ($this->existsData($QueryExisteUser, [$UserName, $email]) > 0) {
      $value = 2;
    } else {
      $value =
        $this->crudService($Query, [$Name, $UserName, $email, $password]);
    }
    return $value;
  }

  /**
   * eliminar roles de un usuario
   */

  public function deleteRolesUsuario($idUsuario)
  {
    $Query = "DELETE FROM usuario_has_roles WHERE id_usuario=?";
    $this->crudService($Query, [$idUsuario]);
  }

  /**
   * Roles restantes o no asignados del usuario
   */
  public function restRolesUser($id)
  {
    $Query = "
          select *from roles
          where id_rol not in(select ur.id_rol from usuario_has_roles ur inner join 
          usuarios u on ur.id_usuario=u.id_usuario where u.id_usuario=?)
          ";
    return $this->findById($Query, $id);
  }

  /**
   * Modificar datos de lso usuarios
   */
  public function updateUser($Name,$Username,$Email,$Id_usuario)
  {
    /// verificamos si existe antes de modificar datos (si existe por ambos)
    $QueryExists = "SELECT *FROM usuarios WHERE username=? and email=?";

    // verificamos si existe por username

    $QueryExistXUsername = "SELECT *FROM usuarios WHERE username=?";

    // verificamos si existe por username

    $QueryExistXEmail = "SELECT *FROM usuarios WHERE email=?";

    /// modificamos todos los campos necesarios cuándo no existe el usuario
    $QueryUserAll = "UPDATE usuarios set name=?,username=?,email=? WHERE id_usuario=?";

    /// modificamos solo el campo name cuándo existe por username ó email
    $QueryUser = "UPDATE usuarios set name=? WHERE id_usuario=?";

    
    /// modificamos el campo name y email cuándo existe por username
    $QueryUserXUsername = "UPDATE usuarios set name=?,email=? WHERE id_usuario=?";

    /// modificamos el campo name y username cuándo existe por email
    $QueryUserXEmail = "UPDATE usuarios set name=?,username=? WHERE id_usuario=?";
    
    if($this->existsData($QueryExists,[$Username,$Email])){
      return $this->crudService($QueryUser,[$Name,$Id_usuario]);
    }else{
     if($this->existsData($QueryExistXUsername,[$Username])){
      return $this->crudService($QueryUserXUsername,[$Name,$Email,$Id_usuario]);
     }else{
      if($this->existsData($QueryExistXEmail,[$Email])){
      return $this->crudService($QueryUserXEmail,[$Name,$Username,$Id_usuario]);
     }else{
      return $this->crudService($QueryUserAll,[$Name,$Username,$Email,$Id_usuario]);
     }
    }
  }
  }
}
?>