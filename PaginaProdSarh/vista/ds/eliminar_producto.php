<?php
include_once "../../modelo/Producto.php";
include_once '../../configuracion/Database.php';;

//obtiene el id de la entidad  a modifdeicar
$id = isset($_GET['id'])?$_GET['id']:die('ERROR:missing ID.');
//generar la relacion a la base  datos

/*foreach ($_POST['seleccion'] as $key => $value) {
    echo "valor id".$value."<br/>";
}*/


$producto = new Producto();
$producto->setId($id);
$producto->delete();