<?php 
use model\RolImpl;
use model\permissionimpl;
spl_autoload_register(function($clase){
    $clase = str_replace('\\','/',$clase).".php";
    if(file_exists("../../src/".$clase)){
    require "../../src/".$clase;
    }
 });

/*******************************************
 * INSTANCIAMOS LA CLASE ROLIMPL
 ******************************************/
 $rol = new RolImpl();
 $permiso = new permissionimpl;
 $mensaje = "";
 
 if(isset($_REQUEST['id'])){
  $rolEdit = $rol->edit($_GET['id']);
  $PermisosXRol = $rol->permissionsXRol($_GET['id']);
  $NotPermissionXRol = $rol->notPermissionsXRol($_GET['id']);
 } 
 $roles=  $rol->all();
 $permisos = $permiso->allPermisos();
 



 if(isset($_REQUEST['saverol'])){
  $Name_Rol = $_POST['namerol'];

  // $mensaje = $rol->store($Name_Rol);

  /// verificamos si existe un permisos seleccionado
  if (isset($_REQUEST['permisos'])) {
    /// primero creamos un rol
    $mensaje = $rol->store($Name_Rol);
    if ($mensaje == 1) {
      /// recorremos en un ForEach todos los permisos que se va asignar a un rol
      foreach ($_REQUEST['permisos'] as $key => $prmAsign) {
        /// luego aqui asignamos los permisos a ese rol creado
        $rol->role_has_permissions($Name_Rol, $prmAsign);
      }
      $mensaje = "1";
    } else {
      $mensaje = "2";
    }
   
  }else{
    $mensaje = $rol->store($Name_Rol);
  }
 }

 /**
  * ELIMINAR ROLES
 */
  if(isset($_POST['delete'])){
   if($_POST['delete']=='eliminar'){
    $ID = $_POST['id_rol'];
    $mensaje = $rol->delete($ID);
    echo $mensaje;
    
   }
  }

  /**
   * ACTUALIZAR LOS DATOS
   */
  if(isset($_REQUEST['updaterol'])){
  if($_REQUEST['updaterol']=='update'){
    $ID = $_POST['idrol'];
    $Name_rol = $_POST['namerol'];

    echo  $rol->update([$Name_rol,$ID]);
    
    
    
  }
  }

  if(isset($_REQUEST['accion'])){
    if($_REQUEST['accion']=='delete'){
      $ID = $_POST['idrol'];
 
  
      echo  $rol->deletePermissionRol($ID);
      
      
      
    }
    }
/**
 * Elimina y asigna los permisos a los roles
 */
  if(isset($_REQUEST['updaterol'])){
    if($_REQUEST['updaterol']=='updateasign'){
      $ID = $_POST['idrol'];
      $Id_Permiso = $_POST['idp'];

      echo $rol->role_has_permission($ID,$Id_Permiso);
      
    }
    }

 

?>