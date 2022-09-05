<?php 
session_start();

use model\RolImpl;
use model\LoginImpl;

spl_autoload_register(function($clase){
$clase = str_replace('\\','/',"../src/".$clase).".php";
require "../src/".$clase;
});

$rol = new RolImpl;

$login = new LoginImpl;

$roles = $rol->all();/// todos los roles

$msg = "";

/**
 * Redirigimo al home si estamos authenticados
 */

 if(isset($_SESSION['nameusuario'])){
  header("location:home/index");
 }

/**
 * Login
 */

 if(isset($_REQUEST['signIn'])){
  /// datos a enviar
  $Rol = $_POST['rol'];

  $Email_Username = $_POST['email_username'];

  $Password = $_POST['password'];

 

  /// dar login

  $Data = $login->SignIn($Rol,$Email_Username,$Password);

  /// verificamos si existe ese usuarios con esos datos ingresados
  if(count($Data)>0){
   $Name_usu = $Data[0]['NOMBRES'];

   $Email_User = $Data[0]['email'];

   $Username_User = $Data[0]['username'];

   $RolAuthenticado = $Data[0]['rol'];
   if($Email_Username==$Email_User || $Email_Username==$Username_User){
    $_SESSION['nameusuario']=$Name_usu;

    $_SESSION['rolAuth'] = $RolAuthenticado;

    header("location:home/index");
    
   }else{
    $msg = "error";
   }
  }else{
    $msg = "error";
  }
 }

?>