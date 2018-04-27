<?php

include 'configuracion/DAO.php';
include_once 'configuracion/Database.php';

/**
 * Description of ProveedorDAO
 *
 * @author sarai
 */
class ProveedorDAO extends DAO {

    private $tabla = 'proveedor';
    public $id;
    public $nombre;
    Public $apPat;
    public $apMat;
    public $marca;
    public $direccionPro;
    public $producto;
    public $ciudad;
    public $cantidad;

    function getTabla() {
        return $this->tabla;
    }

    function setTabla($tabla) {
        $this->tabla = $tabla;
    }

    function __construct() {
        if ($this->con == NULL) {
            $instance = Database::getInstance(); //Única instancia
            $this->con = $instance->getConexion(); //Extrae conexión
        }
    }

    public function delete($key = NULL) {

        if (is_null($key)) {
            $key = $this->primaryKey;
        }
        $delete = "DELETE FROM " . $this->tabla .
                " WHERE id='$key'";
        echo 'ELIMINAR ' . $delete;
        $stmt = $this->con->prepare($delete);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    public function read($value = NULL, $key = NULL) {
        $sql = NULL;
        if (is_null($key)) {
            $sql = "SELECT * FROM " . $this->tabla;
            $this->showData($sql);
        } else {

            $sql = "SELECT * FROM " . $this->tabla . " WHERE {$key} = {$value}";
           
        }

        $stmt = $this->con->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function readId() {
        if (is_null($this->id)) {
            exit('Se requiere un valor para el ID');
        } else {
            $sql = " SELECT * FROM " . $this->tabla . " WHERE id={$this->getId()}";
        }

        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        $this->nombre = $row['nombre'];
        $this->apPat = $row['apPat'];
        $this->apMat = $row['apMat'];
        $this->marca = $row['marca'];
        $this->direccionPro = $row['direccionPro'];
        $this->producto = $row['producto'];
        $this->ciudad = $row['ciudad'];
        $this->cantidad = $row['cantidad'];
    }

    public function update($obj = null) {
        $sql = "UPDATE " . $this->tabla . " SET ";
        $sql .= " nombre = ?  ,  apPat = ?  ,  apMat = ? "
                . ", marca = ? , direccionPro = ?, "
                . "producto = ?, ciudad = ? , cantidad = ?"
                . " where id = ? ";
echo $sql;
        $campos = array(
            $obj->getNombre(),
            $obj->getApPat(),
            $obj->getApMat(),
            $obj->getMarca(),
            $obj->getDireccionPro(),
            $obj->getProducto(),
            $obj->getCiudad(),
            $obj->getCantidad(),
            $obj->getId());
        $stmt = $this->con->prepare($sql);
        if ($stmt->execute($campos)) {
            return true;
        } else {
            return false;
        }
    }

    public function Listar() {
        try {
            $result = array();
            $query = "SELECT * FROM " . $this->getTabla();
            $stm = $this->con->prepare($query);
            echo $query;
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insert($obj = NULL) {
          try {         
            $sql = "INSERT INTO proveedor (nombre
                                           ,apPat
                                           ,apMat
                                           ,marca
                                           ,direccionPro
                                           ,producto
                                           ,ciudad
                                           ,cantidad)
		          VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";

            $this->con->prepare($sql)
                    ->execute( array(
                                $obj->getNombre(),
                                $obj->getApPat(),
                                $obj->getApMat(),
                                $obj->getMarca(),
                                $obj->getDireccionPro(),
                                $obj->getProducto(),
                                $obj->getCiudad(),
                                $obj->getCantidad())
                             );
            echo 'valor insert'.$sql;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    

}
