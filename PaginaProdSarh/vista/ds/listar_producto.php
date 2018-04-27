<?php
include '../../modelo/Producto.php';
include '../../configuracion/Database.php';
$url_page = "../../";
include_once '../layout/layout_header.php';
$producto  = new Producto();

echo "<div class='right-button-margin'>";
//echo "<a href='crear_Producto.php' class='btn btn-primary'>Crear</a>";
echo "</div>";


// El contenido va aqui
$producto->gridHtml();
echo " <div class='box'> <a href='crear_producto.php' class='btn btn-primary'>Agregar Producto(s)</a> </div>";
include_once '../layout/layout_footer.php';

?>



