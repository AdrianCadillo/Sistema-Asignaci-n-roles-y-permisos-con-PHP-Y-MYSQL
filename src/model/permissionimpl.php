<?php 
namespace model;
use interface\IPermission;
use model\ServiceImpl;

class permissionimpl extends ServiceImpl implements IPermission{
    /**
     * Crear nuevos permisos
     */

    public function savePermiso($NamePermiso, $Descripcion, $IdSubModule)
    {
    $QueryExistePermiso="SELECT *FROM permissions WHERE name=? or descripcion=?";
    if($this->existsData($QueryExistePermiso,[$NamePermiso,$Descripcion])>0){
        return 2;
    }else{
    return $this->crudService("INSERT INTO permissions(name,descripcion,id_submodulo) VALUES(?,?,?)",
    [$NamePermiso,$Descripcion,$IdSubModule]);
    }
    }

    /**
     * Asignar roles a permisos (store permisssions_has_roles)
     */
    public function savePermission_Has_Roles($NamePermiso,$IdRol)

    {
    return $this->crudService("INSERT INTO permissions_has_roles(id_permiso,id_rol) VALUES((SELECT id_permiso from permissions WHERE name=?),?)",
    [$NamePermiso,$IdRol]);
    }

    /**
     * Mostrar todos los permisos
     */
    public function allPermisos()
    {
        $Query = "
        SELECT p.id_permiso,p.name as namepermiso,p.descripcion,s.name as namesubmodulo,GROUP_CONCAT(' ',r.name,' ') as roles FROM
        permissions_has_roles pr RIGHT join roles r on pr.id_rol=r.id_rol RIGHT JOIN
        permissions p on pr.id_permiso=p.id_permiso inner join submodulos s on 
        p.id_submodulo=s.id_submodulo
        group by(p.id_permiso)
          ";
          
          return $this->getData($Query);
    }
}
?>