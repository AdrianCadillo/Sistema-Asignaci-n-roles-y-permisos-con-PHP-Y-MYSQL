<?php 
namespace interface;

interface ILogin{

    /**
     * Acceder al sistema(Login)
     */

     public function SignIn($rol,$Email_Username,$Password);
}
?>