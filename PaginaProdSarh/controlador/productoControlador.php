<?php

include_once 'modelo/productoDAO.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productoControlador1
 *
 * @author sarai
 */
class ProductoControlador {

    public $accion = NULL;
    private $objPro;

   
    function __construct() {
        $this->objPro = new ProductosDAO();
       
    }

    public function Index() {
        require_once 'vista/layout/layout_header.php';
        require_once 'vista/crud/producto/producto.php';
        require_once 'vista/layout/layout_footer.php';
    }

    public function Crud() {
        
         $key = "idProducto";
        
        $pro = new ProductosDAO();

        if(isset($_REQUEST['idProducto'])){
            $pro = $this->objPro->read($_REQUEST['idProducto'],$key);
        }
        require_once 'vista/layout/layout_header.php';
        require_once 'vista/crud/producto/producto_editar.php';
        require_once 'vista/layout/layout_footer.php';
    }

    public function Nuevo(){
        $pro = new ProductosDAO();

        require_once 'vista/layout/layout_header.php';
        require_once 'vista/crud/usuario/usuario_nuevo.php';
        require_once 'vista/layout/layout_footer.php';
        
    }
    
    public function Guardar(){
       
        $pro = new ProductosDAO();
        $pro->producto = $_REQUEST['producto'];
        $pro->precio = $_REQUEST['precio'];
        $pro->marca = $_REQUEST['marca'];
        $pro->proveedor = $_REQUEST['proveedor'];
        $pro->codigo = $_REQUEST['codigo'];
        $pro->precioVenta = $_REQUEST['precioVenta'];
        
        $this->objPro->insert($pro);

           header('Location: index.php?c=producto&a=Index');
    } 
    
      public function Editar(){
        $pro = new ProductosDAO();
        $pro->producto = $_REQUEST['producto'];
        $pro->precio = $_REQUEST['precio'];
        $pro->marca = $_REQUEST['marca'];
        $pro->proveedor = $_REQUEST['proveedor'];
        $pro->codigo = $_REQUEST['codigo'];
        $pro->precioVenta = $_REQUEST['precioVenta'];

        
        $pro->idProducto = $_REQUEST['idProducto'];

        $this->objPro->update($pro);

            header('Location: index.php?c=producto&a=Index');

    
      }
        public function Eliminar(){
        $this->objPro->delete($_REQUEST['idProducto']);
        echo 'valor key'.$_REQUEST['idProducto'];
               header('Location: index.php?c=producto&a=Index');

    }
}
