<?php 
use model\userimpl;
spl_autoload_register(function($clase){
    $clase = str_replace('\\','/',$clase).".php";
    if(file_exists("../../src/".$clase)){
    require "../../src/".$clase;
    }
 });
 
 
 $user = new userimpl();

/**
 * AQUI MOSTRAMOS LOS USUARIOS CREADOS
 */


 if(isset($_GET['id'])){
  
   if($_GET['id']!=""){
    $UsuarioEdit = $user->edit($_GET['id']);

    $RolUser = $user->RolXUsuario($_GET['id']);

    $RestRolesUser = $user->restRolesUser($_GET['id']);
   }else{
    echo "<script>location.href='all'</script>";
   }
 } 
 $usuarios = $user->allUser();

 
 

 

$mensaje = "";
if(isset($_REQUEST['saveuser'])){
    $Name = $_POST['nameusuario'];
    $UserName = $_POST['username'];

    $Email = $_POST['email'];

    $Password = $_POST['password'];


  if($Name!="" and $UserName!="" and $Email!="" and $Password!=""){
    if(isset($_REQUEST['rols'])){

        $data=$user->createUser($Name,$UserName,$Email,$Password);
      
        if($data==1){
         foreach ($_REQUEST['rols'] as $key => $role) {
            $user->save([$UserName,$role]);
         }
         $mensaje="1";
        }else{
         if($data==2){
          $mensaje= "existe";
         }else{
            $mensaje = "error";
         }
        }
     }else{
        $user->createUser($Name,$UserName,$Email,$Password);
        $mensaje = "1";
     }
  }else{
    $mensaje ="vacio";
  }
}

/**
 * Actualizar datos del usuario
 */

if(isset($_REQUEST['updateuser']) and isset($_GET['id'])){
    $Name = $_POST['nameusuario'];
    $UserName = $_POST['username'];

    $Email = $_POST['email'];


  if($Name!="" and $UserName!="" and $Email!=""){
         /// actualizamos los datos del usuario
    if($user->updateUser($Name,$UserName,$Email,$_GET['id'])==1){
 

    $user->deleteRolesUsuario($_GET['id']);
    if(isset($_REQUEST['rols'])){
         
       foreach ($_REQUEST['rols'] as $key => $role) {
   
          $user->update([$UserName,$role]);
         
        } 
      } 
      $_SESSION['mensaje']="1";
   
      $RolUser = $user->RolXUsuario($_GET['id']);

      $RestRolesUser = $user->restRolesUser($_GET['id']); 

      $UsuarioEdit = $user->edit($_GET['id']);
    }
    }else{
    $mensaje ="vacio";
  }
}

?>