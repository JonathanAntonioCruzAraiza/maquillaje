<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../../configuracion/Database.php';
include_once '../../modelo/Producto.php';
// Obtiene la conexión hacia la base de datos
$producto = new Producto();
$url_page ="../../";
// Establece el título de la página
$page_title = "  ";
include_once "../layout/layout_header.php"; //header

// Establece la cabecera
//$page_title = "Agregar Productos";
include_once "../layout/layout_header.php"; //header
?>
<!—Visualiza título de la página -->
<h1><?php echo $page_title ?></h1>
<!-- Aqui va el contenido -->

<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="..." alt="...">
      <div class="caption">
        <h3>Thumbnail label</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
</div>

<?php
//Vía método POSTa
if ($_POST) {
//Llena el objeto $entidad con los parámetros enviados
    $producto->setNombre($_POST['nombre']);
    $producto->setPrecio($_POST['precio']);
    
  
    if ($producto->insert()) {
        echo "<div class='alert alert-success'></div>";
    } else {
        echo "<div class='alert alert-danger'></div>";
    }
}
?>

<?php
include_once "../layout/layout_footer.php"; //footer
?>


