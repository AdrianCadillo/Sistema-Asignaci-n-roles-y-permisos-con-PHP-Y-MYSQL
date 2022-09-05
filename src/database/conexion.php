<?php 

namespace database;

use PDO;
require 'setting.php';

 class Conexion {
  private $conection = null;/// esta variable recibe la conexion

  public $pps = null; 

  public $resultSet = null;

  public $Query;

  // driver
  private $Driver;

  /**
   * Realizamos la conexión a la base de datos
   */
 public function getConexion()
 {
try {
    $this->Driver = "mysql:host=".SERVIDOR.";dbname=".BASEDATOS;
    $this->conection = new PDO($this->Driver,USUARIO,PASSWORD);
    $this->conection->exec("set names utf8");
} catch (\Throwable $th) {}
return $this->conection;
}
 
/**
 * Cerrar la conexión a la base de datos
 */
public function closeBD(){
    if($this->conection!=null){
    $this->conection = null;
    }

    if($this->pps!=null){
        $this->pps = null;
    }

    if($this->resultSet!=null){
        $this->resultSet = null;
    }
}
}
 