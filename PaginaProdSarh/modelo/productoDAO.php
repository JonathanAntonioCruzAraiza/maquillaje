<?php
require_once 'configuracion/DAO.php';
require_once 'configuracion/Database.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productoDAO
 *
 * @author sarai
 */

class ProductosDAO extends DAO {

    private $tabla = 'producto';

    //Propiedades de la entidad
    private $idProducto;
    private $producto;
    private $precio;
    private $marca;
    private $proveedor;
    private $codigo;
    private  $precioVenta;
    
   
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

      public function read($value = NULL, $key = NULL) {

        $sql = NULL;
        if (is_null($key)) {
            $sql = "SELECT * FROM " . $this->tabla;
        } else {
            $key = $this->primaryKey;
            $sql = "SELECT * FROM " . $this->tabla . " WHERE {$key}='{$value}'";
        }
        //echo $sql;
        $stmt = $this->con->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function insert($objPro = NULL) {
       
        try {
            $sql= "INSERT INTO producto
                    (producto,
                    precio,
                    marca,
                    proveedor,
                    codigo,
                    precioVenta)
                    VALUES(?, ?, ?, ?, ?, ?)";
            $this->con->prepare($sql)
                    ->execute(array(
                    $objPro->producto,
                    $objPro->precio,
                    $objPro->marca,
                    $objPro->proveedor,
                    $objPro->codigo,
                    $objPro->precioVenta));
                            
            echo 'se Inserto'.$sql; 
        } catch (Exception $exc) {
            die ($e->getMessage());
        }
    }


    
    public function update($objPro = NULL){
        $sql = "UPDATE " . $this->tabla . " SET ";
        
        $sql .= " producto = ?, "
                . "precio = ? "
                . "marca = ?, "
                . "proveedor = ?, "
                . " codigo = ?,"
                . " precioVenta = ? "
                . " where idProducto= $this->IdProducto";
        echo $sql;
        $campos = array(
            $objPro->producto,
            $objPro->precio,
            $objPro->marca,
            $objPro->proveedor,
            $objPro->codigo,
            $objPro->precioVenta,
            $objPro->IdProducto
        );
        
        $stmt = $this->con->prepare($sql);
        if ($stmt->execute($campos)){
            return true;
        }else{
            return false;
        }
    }

    
    public function readId(){
        
        if (is_null($this->getId())){
            exit('Se requiere un valor para el ID');
        } else{
            $sql =" SELECT * FROM " . $this->tabla . " WHERE idProducto={$this->getIdProducto()}";
        }
        
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        
        $this->producto = $row['producto'];
        $this->precio = $row['precio'];
        $this->marca = $row['marca'];
        $this->proveedor = $row['proveedor'];
        $this->codigo = $row['codigo'];
        $this->precioVenta = $row['precioVenta'];
    }
    
    

     public function delete( $key = NULL){
        
        if (is_null($key)){
            $key = $this->primaryKey;
        }
        $delete = "DELETE FROM " . $this->tabla .
                " WHERE IdProducto='$key'";
        $stmt = $this->con->prepare($delete);
        echo $delete;
        if ($stmt->execute()){
            return true;
        }
        return false;
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

}

