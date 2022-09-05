<?php 

use model\ModuloImpl;

spl_autoload_register(function($clase){
$clase = str_replace('\\','/',$clase).".php";
if(file_exists(str_replace('\\','/','../../src/'.$clase)))
require '../../src/'.$clase;

});

/// llamamos a la clase Modulo
$modulo = new ModuloImpl;

$mensaje = "";

if(isset($_REQUEST['id'])){
$listaModulos = $modulo->editarModulo($_GET['id']);
}else{
$listaModulos = $modulo->allModulos();
}
/**
 * Crear nuevos módulos
 */

 if(isset($_REQUEST['savemodulo']))
 {
   $NameModulo = $_POST['namemodulo'];

   $mensaje= $modulo->saveModulo($NameModulo);
    
 }

 /**
  * Modificar los módulos
  */
  
 if(isset($_REQUEST['modifymodulo']) and isset($_REQUEST['id']))
 {
   $NameModulo = $_POST['namemodulo'];

    $_SESSION['msg']=$modulo->modifyModulo($NameModulo,$_GET['id']); 

    echo "<script>location.href='all'</script>";
  
 }

 /**
  * Eliminar módulos
  */

if(isset($_REQUEST['deletemodulo']) and isset($_REQUEST['iddelete']))
 {
 $_SESSION['msgdelete']=$modulo->deleteModulo($_POST['iddelete']);
 $listaModulos = $modulo->allModulos();
 }

?>