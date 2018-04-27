<?php

require 'modelo/ProveedorDAO.php';
require 'modelo/Proveedor.php';

/**
 * Description of proveedorControlador
 *
 * @author sarai
 */
class ProveedorControlador {

    private $objeto;

    public function __CONSTRUCT() {
        $this->objeto = new ProveedorDAO();
    }

    public function Index() {
        require_once 'vista/layout/layout_header.php';
        require_once 'vista/crud/proveedor/proveedor.php';
        require_once 'vista/layout/layout_footer.php';
    }

    public function Crud() {
        $key = "id";

        $prov = new Proveedor();

        if (isset($_REQUEST['id'])) {
            $prov = $this->objeto->read($_REQUEST['id'], $key);
        }

        require_once 'vista/layout/layout_header.php';
        require_once 'vista/crud/proveedor/proveedor_editar.php';
        require_once 'vista/layout/layout_footer.php';
    }

    public function Nuevo() {
        $prov = new Proveedor();

        require_once 'vista/layout/layout_header.php';
        require_once 'vista/crud/proveedor/proveedor_nuevo.php';
        require_once 'vista/layout/layout_footer.php';
    }

    public function Reporte() {
        require_once 'reportes/pdf/proveedor.php';
    }

    public function Guardar() {

        $prov = new Proveedor();
        $prov->setNombre($_REQUEST['nombre']);
        $prov->setApPat($_REQUEST['apPat']);
        $prov->setApMat($_REQUEST['apMat']);
        $prov->setMarca($_REQUEST['marca']);
        $prov->setDireccionPro($_REQUEST['direccionPro']);
        $prov->setProducto($_REQUEST['producto']);
        $prov->setCiudad($_REQUEST['ciudad']);
        $prov->setCantidad($_REQUEST['cantidad']);


        $this->objeto->insert($prov);

        header('Location: index.php?c=proveedor&a=Index');
    }

    public function Editar() {
        $prov = new Proveedor();

        $prov->setId($_REQUEST['id']);
        $prov->setNombre($_REQUEST['nombre']);
        $prov->setApPat($_REQUEST['apPat']);
        $prov->setApMat($_REQUEST['apMat']);
        $prov->setMarca($_REQUEST['marca']);
        $prov->setDireccionPro($_REQUEST['direccionPro']);
        $prov->setProducto($_REQUEST['producto']);
        $prov->setCiudad($_REQUEST['ciudad']);
        $prov->setCantidad($_REQUEST['cantidad']);


        $this->objeto->update($prov);

        header('Location: index.php?c=proveedor&a=Index');
    }

    public function Eliminar() {
        $this->objeto->delete($_REQUEST['id']);
        echo 'valor key' . $_REQUEST['id'];
        header('Location: index.php?c=proveedor&a=Index');
    }

}
