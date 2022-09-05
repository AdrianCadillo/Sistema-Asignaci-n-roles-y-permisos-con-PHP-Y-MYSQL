<?php 
namespace model;
use interface\IModulo;
class ModuloImpl extends ServiceImpl implements IModulo{

        /**
     * Crear nuevos módulos
     */

    public function saveModulo($NameModulo)
    {
    /// Verificamos la existencia del datos
    $QueryExisteModule = "SELECT *FROM modulos WHERE name=?";

    if($this->findByData($QueryExisteModule,$NameModulo)==0){
        return $this->crudService("INSERT INTO modulos(name) VALUES(?)",[$NameModulo]);
    }else{
        return 2;
    }
    }

    /**
     * Editar módulos
     */

     public function editarModulo($id){
     return $this->findById("SELECT *FROM modulos WHERE id_modulo=?",$id);
     }

    /**
     * Actualizar los módulos 
    */ 
   public function modifyModulo($NameModulo,$id){
        /// Verificamos la existencia del datos
    $QueryExisteModule = "SELECT *FROM modulos WHERE name=?";

    if($this->findByData($QueryExisteModule,$NameModulo)==0){
        return $this->crudService("UPDATE modulos SET name=? WHERE id_modulo=?",[$NameModulo,$id]);
    }else{
        return 2;
    }
   }

   /**
    * Listar los módulos
    */

    public function allModulos(){
     return $this->getData("SELECT *FROM modulos");
    }

    /**
     * Eliminar los módulos
     */
     public function deleteModulo($id){
        $verifyExist = "SELECT *FROM submodulos where id_modulo in(?)";

        if(count($this->findById($verifyExist,$id))==0){
            return $this->crudService("DELETE FROM modulos WHERE id_modulo=?",[$id]);    
        }else{
                return 2;
        }
     }
}
?>