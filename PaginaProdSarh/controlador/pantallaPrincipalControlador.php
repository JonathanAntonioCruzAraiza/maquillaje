<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pantallaPrincipalControlador
 *
 * @author sarai
 */
class PantallaprincipalControlador {
    //put your code here
    
    public function Index(){
        echo 'Entrando a pantalla';
        require_once 'vista/layout/layout_header.php';
        require_once 'vista/pantalla_principal.php';
        require_once 'vista/layout/layout_footer.php';

    }
}
