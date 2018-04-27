<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GaleriaControlador
 *
 * @author sarai
 */
class GaleriaControlador {
    //put your code here
    
    private $objeGa;
    
    function __construct() {
        $this->objeGa = new galeria();
    }
 public function Index() {
        require_once 'vista/layout/layout_header.php';
        require_once 'vista/login.php';
        require_once 'vista/layout/layout_footer.php';
    }
    
}

