<?php
require_once   'Database.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAO
 *
 * @author sarai
 */

abstract class DAO {
    
    protected $con = NULL; //Objeto conexión a datos.
            
    /*
     * Aqui va el Constructor de la clase.
     */
    
    public function __constructor(){
        $instance = Database::getInstance(); //Única instanc
        $this->con = $instance->getConexion(); //Extraer conexión
        
    }
    
    /*
     * Método genérico que realiza consultas a la base de datos.
     * @param type $value Valor del campo a consultar
     * @param type $key clave del campo
     * @return type Un enunciado.
     */
    public abstract function read($value = NULL, $key = NULL); 
    
    /*
     * Método realizado para realizar  consultas a  base de datos
     * @return type Un enunciado - rhuerta.
     */
    public abstract function readId();
    
    /*
     * Métod genérico  realizado para realizar Actualización a datos de base de datos.
     */
    public abstract function update($objecto = NULL);
    
    /*
     * Método   realizado para eliminar  registros de base de datos.
     * @param type $key clave del campo
     */
    public abstract function delete( $key = NULL);
    
      /*
     * Método  realizado para realizar  inserción a base de datos.
     */
    public abstract function insert($obj = NULL);
    
}
