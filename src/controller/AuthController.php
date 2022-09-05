 <?php 
use model\AutorizeImpl;

spl_autoload_register(function($clase){
    $clase = str_replace('\\','/',$clase).".php";
    if(file_exists(str_replace('\\','/','../../src/'.$clase)))
    require '../../src/'.$clase;
    
});

$RedirectError = "../home/index";
$Autorize = new AutorizeImpl;

if(isset($_SESSION['rolAuth'])){$PermissionAuthorize = $Autorize->Autorize_Permissions($_SESSION['rolAuth']);}

 if(isset($_REQUEST['logout']))
{
    session_start();
    session_destroy();
    header("location:../login");
}

if(!isset($_SESSION['nameusuario'])){
    echo "<script>location.href='../login'</script>";
}


 
?>