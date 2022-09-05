<?php 
use model\submoduloimpl;

spl_autoload_register(function($clase){
$clase = str_replace('\\','/',$clase).".php";
if(file_exists(str_replace('\\','/','../../src/'.$clase)))
require '../../src/'.$clase;
});

$submodulo = new submoduloimpl;

if(isset($_REQUEST['id'])){

}else{

    $listadoSubmodulos = $submodulo->allSubModulo();
}

if(isset($_REQUEST['savesubmodulo'])){
    $NameSubModulo = $_POST['namesubmodulo'];
 

    $Modulo = empty($_POST['modulo'])?'':$_POST['modulo'];

   echo $submodulo->saveSubmodulo($NameSubModulo,$Modulo);
}
?>