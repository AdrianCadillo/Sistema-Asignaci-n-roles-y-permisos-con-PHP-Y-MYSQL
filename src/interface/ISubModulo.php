<?php 
namespace interface;

interface ISubModulo{
    /**
     * Crear nuevos sub modulos  
     */
    public function saveSubmodulo($NameSubModulo,$Modulo);


    /**
     * Editar los sub módulos
     */

    public function editarSubmodulo($id);

    /**
     * Modificar sub modulos 
     */

    public function modifySubModulo($NameSubModulo,$Modulo, $Id);

    /**
     * Eliminar sub modulos
     */

    public function deleteSubModulo($id);

    /**
     * Mostrar los sub modulos
     */

    public function allSubModulo();
}
?>