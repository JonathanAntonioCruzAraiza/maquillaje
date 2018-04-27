|<?php
include_once 'modelo/Login.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginControlador
 *
 * @author sarai
 */
class LoginControlador {
    //put your code here
    
    private $objeLog;
    
    function __construct() {
        $this->objeLog = new Login();
    }
 public function Index() {
        require_once 'vista/layout/layout_headerLogin.php';
        require_once 'vista/login.php';
        require_once 'vista/layout/layout_footer.php';
    }
    public function CerrarSesion(){
        $logon = new Login();
       $this->objeLog->logout();
    }
}
