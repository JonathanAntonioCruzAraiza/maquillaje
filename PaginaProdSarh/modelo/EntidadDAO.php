<?php

require_once '/configuracion/DAO.php';
require_once '/configuracion/Database.php';

/**
 * Description of EntidadDAO
 *
 * @author sarai
 */
class EntidadDAO extends DAO {

    private $tabla = 'entidad';
    //Propiedades de la entidad
    private $id;
    private $nombre;
    private $alias;
    private $activo;

    //Métodos Getter y Setters
    function getTabla() {
        return $this->tabla;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getAlias() {
        return $this->alias;
    }

    function getActivo() {
        return $this->activo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setAlias($alias) {
        $this->alias = $alias;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    public function read($value = NULL, $key = NULL) {

        $sql = NULL;
        if (is_null($key)) {
            $sql = "SELECT * FROM " . $this->tabla;
        } else {
            $key = $this->primaryKey;
            $sql = "SELECT * FROM " . $this->tabla . " WHERE {$key}='{$value}'";
        }
        echo $sql;
        $stmt = $this->con->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function insert() {
        if ($this->con == NULL) {
            $instance = Database::getInstance(); //Única instancia
            $this->con = $instance->getConexion(); //Extrae conexión
        }
        $campos = array(
            ':nombre' => $this->nombre,
            ':alias' => $this->alias,
            ':activo' => $this->activo
        );
        $insert = 'INSERT INTO ' . $this->tabla .
                ' (nombre, alias, activo) VALUES ' .
                " (:nombre, :alias, :activo)";

        $stmt = $this->con->prepare($insert);

        if ($stmt->execute($campos)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function update(){
        $sql = "UPDATE " . $this->tabla . " SET ";
        $sql .= " nombre=:name, alias=:ali, activo=:active";
        
        $campos = array(
            ':name' => $this->nombre, 
            ':ali' => $this->alias,
            ':active' => $this->activo
        );
        
        $stmt = $this->con->prepare($sql);
        if ($stmt->execute($campos)){
            return true;
        }else{
            return false;
        }
    }

    
    public function readId(){
        if ($this->con == NULL) {
            $instance = Database::getInstance(); //Única instancia
            $this->con = $instance->getConexion(); //Extrae conexión
        }
        if (is_null($this->getId())){
            exit('Se requiere un valor para el ID');
        } else{
            $sql =" SELECT * FROM " . $this->tabla . " WHERE id={$this->getId()}";
        }
        echo $sql;
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        $this->nombre = $row['nombre'];
        $this->alias = $row['alias'];
        $this->activo = $row['activo'];
    }
    
    
    /*
     * Método que imprime el grid de los registros de entidad
     */
    public function gridHtml() {
        if ($this->con == NULL) {
            $instance = Database::getInstance(); //Única instancia
            $this->con = $instance->getConexion(); //Extrae conexión
        }
        $tableHtml = "<table class='table table-hover'>" .
                "<tr>" .
                "<th>Id</th>" .
                "<th>Nombre</th>" .
                "<th>Alias</th>" .
                "<th>Activo</th>" .
                "<th>&nbsp;</th>" .
                "<th>&nbsp;</th>" .
                "<th>&nbsp;</th>" .
                "</tr>";
        $registros = $this->read();
        if ($registros->rowCount() > 0) {
            while ($row = $registros->fetch(PDO::FETCH_ASSOC)) {
                $tableHtml = $tableHtml . "<tr>" .
                        "<td>" . $row['id'] . "</td>" .
                        "<td>" . $row['nombre'] . "</td>" .
                        "<td>" . $row['alias'] . "</td>" .
                        "<td><input type='checkbox' disabled='disabled' ";
                echo $row['activo'];
                if ($row['activo'] == 1) {
                    $tableHtml = $tableHtml . " checked";
                }
                $tableHtml = $tableHtml . "></td>" .
                        "<td><a href='read_entidad.php?id=" . $row['id'] . "' class='btn btn-primary left-margin'>"
                        . "<span class='glyphicon glyphicon-list'></span>Leer</a></td>" .
                        "<td><a href='update_entidad1.php?id=" . $row['id'] . "' class='btn btn-info left-margin'>"
                        . "<span class='glyphicon glyphicon-edit'></span>Editar</a></td>" .
                        "<td><a href='delete_entidad.php?id=" . $row['id'] . "' class='btn btn-danger delete-object'>"
                        . "<span class='glyphicon glyphicon-remove'></span>Eliminar</a></td>" .
                        "</tr>";
            }
            $tableHtml = $tableHtml . "</table>";
            echo $tableHtml;
        } else {
            echo "<div class='alert alert-warning'>No existen registros de Entidad.</div>";
        }
    }
    
    
    
    public function _toString() {
        return 'Nombre=' . $this->nombre . 'Alias' . $this->alias .
                'Activo=' . $this->activo;
    }

    public function delete($key = NULL) {
        
    }

}
