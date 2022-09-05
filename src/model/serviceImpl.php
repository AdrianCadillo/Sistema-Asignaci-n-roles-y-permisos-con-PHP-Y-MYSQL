<?php 
namespace model;

use database\Conexion;
use Interface\IService;

class ServiceImpl extends Conexion implements IService{
    

/**
 * REGISTRAR,ACTUALIZAR Y ELIMINAR REGISTROS
 */
public function crudService ($Query,$datos=array())
{
 try {
 $this->pps = $this->getConexion()->prepare($Query);

 for($i=0;$i<count($datos);$i++){

 $this->pps->bindParam(($i+1),$datos[$i],\PDO::PARAM_STR);

 }

 return $this->pps->execute();

 } catch (\Throwable $th) { echo '<div class="mx-3 alert alert-danger">'. $th->getMessage().'</div>';

 $this->closeBD();
 
 }
}

/**
 *VERIFICAR SI EXISTE DATOS 
*/
public function findByData($Query,$data)
{
  $num_Filas=-1;
 try {
   $this->pps = $this->getConexion()->prepare($Query);
   $this->pps->bindParam(1,$data,\PDO::PARAM_STR);
   $this->pps->execute();
   $num_Filas = $this->pps->rowCount();
 } catch (\Throwable $th) { echo '<div class="mx-3 alert alert-danger">'. $th->getMessage().'</div>';
    $this->closeBD();
 }
 return $num_Filas;
}

/**
 * CONSULTAR TODOS LOS DATOS 
*/

public function getData($Query)
{
try {
  $this->pps = $this->getConexion()->prepare($Query);
  $this->pps->execute();
  $this->resultSet = $this->pps->fetchAll(\PDO::FETCH_ASSOC);
} catch (\Throwable $th) { echo '<div class="mx-3 alert alert-danger">'. $th->getMessage().'</div>';
  $this->closeBD();
}
return $this->resultSet;
}

/**
 * CONSULTAR DATO POR ID
 */

public function findById($Query,$id){
try {
  $this->pps = $this->getConexion()->prepare($Query);
  $this->pps->bindParam(1,$id,\PDO::PARAM_INT);
  $this->pps->execute();
  $this->resultSet = $this->pps->fetchAll(\PDO::FETCH_ASSOC);
} catch (\Throwable $th) { echo '<div class="mx-3 alert alert-danger">'. $th->getMessage().'</div>';
   $this->closeBD();
}
return $this->resultSet;
}

public function existsData($Query, $data = array())
{
  $num_Filas=0;
  try {
    $this->pps = $this->getConexion()->prepare($Query);
    for($i=0;$i<count($data);$i++){
      $this->pps->bindParam(($i+1),$data[$i],\PDO::PARAM_STR);
    }
    $this->pps->execute();
    $num_Filas = $this->pps->rowCount();
  } catch (\Throwable $th) { echo '<div class="mx-3 alert alert-danger">'. $th->getMessage().'</div>';
     $this->closeBD();
  }
  return $num_Filas;
}


public function existsDatas($Query, $data = array())
{
  $num_Filas=0;
  try {
    $this->pps = $this->getConexion()->prepare($Query);
    for($i=0;$i<count($data);$i++){
      $this->pps->bindParam(($i+1),$data[$i],\PDO::PARAM_STR);
    }
    $this->pps->execute();
  } catch (\Throwable $th) { echo '<div class="mx-3 alert alert-danger">'. $th->getMessage().'</div>';
     $this->closeBD();
  }
  return $this->pps->fetchAll(\PDO::FETCH_ASSOC);
}
}

?>