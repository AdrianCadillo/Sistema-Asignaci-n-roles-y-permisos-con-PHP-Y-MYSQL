<?php 
namespace interface;

interface IModulo {
    /**
     * Crear nuevos módulos
     */

     public function saveModulo($NameModulo);

     /**
      * Editar módulos
      */

      public function editarModulo($id);

     /**
      * Actualizar los módulos 
     */ 
    public function modifyModulo($NameModulo,$id);

    /**
     * Listar los módulos
     */

     public function allModulos();

     /**
      * Eliminar los módulos
      */
      public function deleteModulo($id);
}
?>