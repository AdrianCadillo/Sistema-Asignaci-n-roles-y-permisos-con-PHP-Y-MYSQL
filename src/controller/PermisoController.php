<?php 
use model\permissionimpl;

spl_autoload_register(function($clase){
    $clase = str_replace('\\','/',$clase).".php";
    if(file_exists("../../src/".$clase)){
    require "../../src/".$clase;
    }
 });

 $permission = new permissionimpl;

 $mensaje = "";

if(isset($_REQUEST['id'])){
   
}else{
    $ListadoPermisos = $permission->allPermisos();
}



/**
 * Registrar nuevos permisos con sus roles
 */

 if(isset($_REQUEST['savepermiso']))
 {
    $NamePermiso = $_POST['namepermiso'];

    $Descripcion = $_POST['descripcion'];

    $Submodulo = $_POST['submodulo'];

    if(isset($_REQUEST['rols'])){

        /// aqui mandamos a guardar el permiso tabla permisos
      $data=$permission->savePermiso($NamePermiso,$Descripcion,$Submodulo);
      if($data==1){

      foreach ($_POST['rols'] as $key => $role) {
         $permission->savePermission_Has_Roles($NamePermiso,$role);
      }
      $mensaje = "1";
    }else{
        $mensaje="2";
    }
    }else{
       $mensaje = $permission->savePermiso($NamePermiso,$Descripcion,$Submodulo);
 
    }
 }
?>