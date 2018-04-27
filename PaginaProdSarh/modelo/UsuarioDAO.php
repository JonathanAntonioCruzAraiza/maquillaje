<?php
include 'configuracion/DAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author sarai
 */
class UsuarioDAO extends DAO {
    private $tabla = 'usuario';
    public $id;
    public $nombre;
    public $apPat;
    public $apMat;
    public $correo;
    public $password;
    
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
        $delete ="DELETE FROM " . $this->tabla .
                " WHERE id='$key'";
        echo $delete;
        $stmt = $this->con->prepare($delete);

        if ($stmt->execute()) {
            return true;
        }
        return false;
        
        
    }

    public function insert($objUs = NULL) {
        try {
            $sql="INSERT INTO usuario 
                (nombre, 
                apPat, 
                apMat, 
                correo, 
                password)
                VALUES (?, ?, ?, ?, ?)";
            $this->con->prepare($sql)
                    ->execute(array(
                        $objUs->nombre,
                        $objUs->apPat,
                        $objUs->apMat,
                        $objUs->correo,
                        sha1($objUs->password))
                    );
                    echo 'se Inserto'.$sql; 
        } catch (Exception $exc) {
            die($e->getMessage());
        }
            
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
        if (is_null($this->getIdUsuario())) {
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
        $this->correo = $row['correo'];
        $this->password = $row['correo'];
        
    
        
    }

    public function update($objUs = NULL) {
       
        $sql = "UPDATE " . $this->tabla . " SET ";
        $sql .= " nombre = ?  ,  apPat = ?  ,  apMat = ? "
                . ", correo = ? , password = ? "
              
                . " where id = ? ";
echo $sql;
        $campos = array(
                        $objUs->nombre,
                        $objUs->apPat,
                        $objUs->apMat,
                        $objUs->correo,
                        sha1($objUs->password),
                        $objUs->id);
                     
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
    function getTabla() {
        return $this->tabla;
    }

    function setTabla($tabla) {
        $this->tabla = $tabla;
    }


//put your code here
}
