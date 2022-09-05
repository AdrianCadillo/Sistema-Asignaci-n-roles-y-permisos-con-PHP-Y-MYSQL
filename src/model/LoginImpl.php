<?php 
namespace model;
use interface\ILogin;
use model\ServiceImpl;

class LoginImpl extends ServiceImpl implements ILogin{
      /**
     * Acceder al sistema(Login)
     */

    public function SignIn($rol,$Email_Username,$Password)
    { 
    $Query_Login = "SELECT u.name as NOMBRES, u.email,u.username, r.name as rol FROM usuario_has_roles ur inner join usuarios u on 
     ur.id_usuario=u.id_usuario inner join roles r on ur.id_rol=r.id_rol
     WHERE r.id_rol=? and (u.username=? or u.email=?) and u.password=md5(?)";

    return $this->existsDatas($Query_Login,[$rol,$Email_Username,$Email_Username,$Password]);
    }
}
?>