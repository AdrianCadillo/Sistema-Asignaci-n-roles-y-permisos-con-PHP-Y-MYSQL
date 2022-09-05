<?php 
namespace model;
use interface\IAutorize;
use model\ServiceImpl;
class AutorizeImpl extends ServiceImpl implements IAutorize {

    /**
     * Autorizar los permisos Authenticados por rol
     */

    public function Autorize_Permissions($rol)
    {
     return $this->existsDatas("call proc_autorizepermissions(?);",[$rol]);
    }

    /**
     * Permisos por rol
     */
    public function PermissionsAuthRol($rol,$permiso)
    {
        return $this->existsDatas("call proc_autorize(?,?);",[$rol,$permiso]);
    }
}

?>