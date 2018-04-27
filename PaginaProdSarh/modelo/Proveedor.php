<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Proveedor
 *
 * @author sarai
 */
class Proveedor {
    private $id;
    private $nombre;
    private $apPat;
    private $apMat;
    private $marca;
    private $direccionPro;
    private $producto;
    private $ciudad;
    private $cantidad;
    
    function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApPat() {
        return $this->apPat;
    }

    function getApMat() {
        return $this->apMat;
    }

    function getMarca() {
        return $this->marca;
    }

    function getDireccionPro() {
        return $this->direccionPro;
    }

    function getProducto() {
        return $this->producto;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApPat($apPat) {
        $this->apPat = $apPat;
    }

    function setApMat($apMat) {
        $this->apMat = $apMat;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setDireccionPro($direccionPro) {
        $this->direccionPro = $direccionPro;
    }

    function setProducto($producto) {
        $this->producto = $producto;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }


    
}
