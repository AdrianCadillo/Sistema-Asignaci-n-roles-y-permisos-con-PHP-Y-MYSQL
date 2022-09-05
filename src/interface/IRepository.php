<?php 
namespace interface;
interface IRepository{
    /**
     * MOSTRAR DATOS
     */

     public function all();

     /**
      * REGISTRAR DATOS
      */

      public function save($datos=array());

      /**
       * ACTUALIZAR DATOS
       */
      public function update($datos=array());


      /**
       * Editar datos
       */
      public function edit($id);

      /**
       * Eliminar datos
       */

       public function delete($id);
}
?>