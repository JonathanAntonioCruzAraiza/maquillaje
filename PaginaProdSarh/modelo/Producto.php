<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author PC
 */
class Producto {
    //put your code here
    
     private $id;
     private $nombre;
     private $precio;
     private $proveedor;
     public $con;
     public $tabla = 'producto';


     public function __construct() {
         $db = Database::getInstance();
        $this->con = $db->getConexion();
     }     
      public function delete(){
       
        $delete = ' Delete From '. $this->tabla.
                  ' Where  id ='. $this->id;
      
        $stmt = $this->con->prepare($delete);
        $stmt->execute();
        echo "<script>
	          location='../crud/listar_producto.php';
		  </script>	  
	   ";
    }

    /**
     * Método que consulta a la tabla Entidad y extrae todos los registros.
     * @return Objeto recorset que contiene todos los registros
     */
    public function read() {
        $query = 'SELECT id, nombre, precio ' .
                ' FROM ' . $this->tabla ;
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        return $stmt;
    }

      public function insert() {
        $insert = 'INSERT INTO ' . $this->tabla .
                ' (nombre , precio ) VALUES '.
                " ('" . $this->getNombre(). "'," . $this->getPrecio() . ")";
        echo $insert;
        $stmt = $this->con->prepare($insert);
        $stmt->execute();
        echo $stmt->rowCount() . ' renglones afectados';
        echo "<div class='alert alert-success' role='alert'> <a href='#' class='alert-link'>Se ha Agregado un Producto Nuevo</a></div>";
    }


     /**
     * Método que imprime el grid de los registros de entidad
     */
    public function gridHtml() {
        $tableHtml = "<form id='formEn' method='post'><table class='table table-bordered'>" .
                "<br>".
                "<br>".
           
                
               " <thead class='thead-dark'>".
                "<tr>" .
                "<th>check</th>" .
                "<th disabled='true' >Id</th>" .
                "<th>Nombre</th>" .
                "<th>Precio</th>" .
                
                "<th>&nbsp;</th>" .
                "<th>&nbsp;</th>" .
                "<th>&nbsp;</th>" .
                "</tr>".
                "<thead>";
        $registros = $this->read();
        if ($registros->rowCount() > 0) {
            while ($row = $registros->fetch(PDO::FETCH_ASSOC)) {
                $tableHtml = $tableHtml . "<tr>" .
                        "<td> <input type='checkbox' name='seleccion[]' value='".$row['id']."' />  </td>" .
                        "<td>" . $row['id'] . "</td>" .
                        "<td>" . $row['nombre'] . "</td>" .
                        "<td>" . $row['precio'] . "</td>" .
                        "<td><a href='consultar_producto.php?id=".$row['id']."' class='btn btn-primary'>"
                        . "<span class='glyphicon glyphicon-edit'></span>Leer</a></td>" .
                        
                        "<td><a href='update_producto.php?id=".$row['id']."' class='btn btn-info left-margin'>"
                        . "<span class='glyphicon glyphicon-edit' ></span>Actualizar</a></td>" .
                        
                        "<td><a href='eliminar_producto.php?id=".$row['id']."' class='btn btn-danger delete-object'>"
                        . "<span class='glyphicon glyphiconremove'></span>Eliminar</a></td>"
                        .
                        "</tr>";
            }
            $tableHtml = $tableHtml . "</table></form>";
            
            $tableHtml = $tableHtml."<br/><div id='eliminados'> </div>";
            echo $tableHtml;
        } else {
            echo "";
        }
    }
    
    
    public function readId() {
        $query = 'SELECT id, nombre, precio' .
                ' FROM ' . $this->tabla .
                ' WHERE id= ' . $this->getId();

        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->setNombre($row['nombre']);
        $this->setPrecio($row['precio']);
        
    }

    /**
     * Método que modifica el registro en la base de datos
     * @return boolean True exitosamente y False no exitoso
     */
    public function update() {
        $update = "UPDATE " . $this->tabla .
                " SET " .
                " nombre='" . $this->getNombre() . "'," .
                " precio=" . $this->getPrecio() .
                " where id=" . $this->getId();
        $stmt = $this->con->prepare($update);
        $stmt->execute();
        echo "<script>
	          location='../crud/listar_producto.php';
		  </script>	  
	   ";
    }

  

    function getNombre() {
        return $this->nombre;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getProveedor() {
        return $this->proveedor;
    }

  

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setProveedor($proveedor) {
        $this->proveedor = $proveedor;
    }
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }



}
