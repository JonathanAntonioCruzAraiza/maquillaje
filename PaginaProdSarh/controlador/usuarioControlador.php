<?php
require 'modelo/UsuarioDAO.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarioControlador
 *
 * @author sarai
 */
class UsuarioControlador {
    //put your code here
    private $objetoUs;
    function __construct() {
        $this->objetoUs = new UsuarioDAO();
    }

     public function Index() {
        require_once 'vista/layout/layout_header.php';
        require_once 'vista/crud/usuario/usuario.php';
        require_once 'vista/layout/layout_footer.php';
    }
     public function CrudUs() {
         $key = "id";
        
        $us = new UsuarioDAO();

        if(isset($_REQUEST['id'])){
            $us = $this->objetoUs->read($_REQUEST['id'],$key);
        }

        require_once 'vista/layout/layout_header.php';
        require_once 'vista/crud/usuario/usuario_editar.php';
        require_once 'vista/layout/layout_footer.php';
    }
    
    public function Nuevo(){
        $us = new UsuarioDAO();

        require_once 'vista/layout/layout_header.php';
        require_once 'vista/crud/usuario/usuario_nuevo.php';
        require_once 'vista/layout/layout_footer.php';
        
    }

       public function Guardar(){
       
        $us = new UsuarioDAO();
        $us->nombre = $_REQUEST['nombre'];
        $us->apPat = $_REQUEST['apPat'];
        $us->apMat = $_REQUEST['apMat'];
        $us->correo = $_REQUEST['correo'];
        $us->password = $_REQUEST['password'];
        


        $this->objetoUs->insert($us);

           header('Location: index.php?c=usuario&a=Index');
    }
    
      public function Editar(){
        $us = new UsuarioDAO();
        
        $us->nombre = $_REQUEST['nombre'];
        $us->apPat = $_REQUEST['apPat'];
        $us->apMat = $_REQUEST['apMat'];
        $us->correo = $_REQUEST['correo'];
        $us->password = $_REQUEST['password'];
        
       $us->id = $_REQUEST['id'];

        $this->objetoUs->update($us);

            header('Location: index.php?c=usuario&a=Index');

    }
    
    public function Eliminar(){
        $this->objetoUs->delete($_REQUEST['id']);
        echo 'valor key'.$_REQUEST['id'];
               header('Location: index.php?c=usuario&a=Index');

    }

}
