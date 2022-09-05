<?php 
namespace Interface;

interface IService {

/**
 * REGISTRAR,ACTUALIZAR Y ELIMINAR REGISTROS
 */
public function crudService ($Query,$datos=array());

/**
 *VERIFICAR SI EXISTE DATOS 
*/
public function findByData($Query,$data);

/**
 * CONSULTAR TODOS LOS DATOS 
*/

public function getData($Query);

/**
 * CONSULTAR DATO POR ID
 */

 public function findById($Query,$id);


/**
 * VERIFICAR EXISTENCIA CON VARIOS DATOS
 */

 public function existsData($Query,$data=array());

 /**
 * VERIFICAR EXISTENCIA CON VARIOS DATOS
 */

public function existsDatas($Query,$data=array());


}
?>