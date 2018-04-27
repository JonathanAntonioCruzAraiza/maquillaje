<?php
//Código configuracion de la base de datos
include_once '../configuracion/Database.php';
include_once '../modelo/Entidad.php';
//$database = new Database();
//$db = $database->getConexion();
$entidad = new Entidad();
// Establece cabecerEntidada
$page_title = "Listado de Entidades";
include_once "layout_header.php";
?>

<?php
//Código configuracion de la base de datos
// Establece cabecera
$page_title = "Listado de Entidades";
include_once "layout_header.php";
//Botón para crear un registro



echo "<div class='right-button-margin'>";
echo "<a href='crea_entidad.php' class='btn btn-primary'>Crear</a>";
echo "</div>";
echo "<div class='right-button-margin'>";
echo "<a href='#' id='eliminarEn' class='btn btn-primary'>Eliminar</a>";
echo "</div>";
// El contenido va aqui


$entidad->gridHtml();

//POR QUE ESTAN ESTAS BARIABLE $num_registro,$reg_por_pagina;
// Establece el footer
include_once "layout_footer.php";
?>


