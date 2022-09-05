<?php 
 namespace model;
 use interface\ISubModulo;

 class submoduloimpl extends ServiceImpl implements ISubModulo{

      /**
     * Crear nuevos sub modulos  
     */
    public function saveSubmodulo($NameSubModulo,$Modulo){
       if(!empty($Modulo)){
        return $this->crudService("INSERT INTO submodulos(name,id_modulo) VALUES(?,?)",[$NameSubModulo,$Modulo]); 
       }else{
        return $this->crudService("INSERT INTO submodulos(name) VALUES(?)",[$NameSubModulo]); 
       }
    }


    /**
     * Editar los sub módulos
     */

    public function editarSubmodulo($id){}

    /**
     * Modificar sub modulos 
     */

    public function modifySubModulo($NameSubModulo,$Modulo, $Id){}

    /**
     * Eliminar sub modulos
     */

    public function deleteSubModulo($id){}

    /**
     * Mostrar los sub modulos
     */

    public function allSubModulo(){
        return $this->getData("SELECT sb.id_submodulo, sb.name as namesubmodule,m.name as namemodule 
        FROM submodulos sb LEFT JOIN modulos m on sb.id_modulo=m.id_modulo");
    }
 }
?>