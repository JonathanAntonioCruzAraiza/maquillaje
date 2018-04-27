<?php

include_once "../../configuracion/Database.php";
include_once "../../modelo/Producto.php";
$url_page ="../../";

//obtiene el id de la producto  a modificar
$id = isset($_GET['id'])?$_GET['id']:die('ERROR:missing ID.');

//obtiene la conexion hacia la base de dato 
$producto = new Producto();
$producto->setId($id);
$producto->readId();

//Establese el titulo de la pagina
$page_title = " ";
include_once "../layout/layout_header.php"; //header
?>

<h1><?php echo $page_title?></h1>

<!--Botón de consultar productoes-->

<!--Procesar la información-->

<!--Forma a modificar el registro producto-->

<form  class="form-horizontal" method="post">
     <div class="box">
    <fieldset>
      
                        <legend class="text-center header">Actualizar Productos</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="nombre" name="nombre" type="text"class="form-control" value="<?php echo $producto->getNombre(); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="precio" name="precio" type="text" class="form-control" value="<?php echo $producto->getPrecio(); ?>">
                            </div>
                        </div>
                               <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="marca" name="marca" type="text"  class="form-control" value="<?php echo $producto->getPrecio(); ?>">
                            </div>
                               </div>
                        <div class="row"> 
                                   <div class="col-md-8 text-right">
                                   <div class="right-button_margin ">
                                       
                                           <button type='submit' name='enviar' id='enviar' class="btn btnprimary">Modificar</button>
                                           <button type="submit" class="btn btn-primary ">Agregar Producto</button>
                                       
                                       <a id="btn_listar" href="listar_producto.php" class='btn btn-primary' style="background-color: #2ecc71"> Ver Productos</a>
                                       
                                       <a href='listar_producto.php' class='btn btn-primary' style="background-color: orange">Consultar</a>
                                       <br>
                                       <br>
                                   </div>
                                       
                               </div>
                            </div>
                       
    </fieldset>
     </div>
</form>
<!--<form action='' method='POST'>
    <table class='table table-hover'>
        <tr>
            <td>Nombre</td>
            <td><input type='text' name='nombre' value="<?php echo $producto->getNombre(); ?>"
                       class="form-control"></td>
        </tr>
        <tr>
            <td>Precio</td>
            <td><input type='text' name='precio' value="<?php echo $producto->getPrecio(); ?>"
                       class="form-control"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><button type='submit' name='enviar' id='enviar' class="btn btnprimary">Modificar</button></td>
        </tr>
    </table>
</form>
-->

<?php
//Vía método POSTa
if ($_POST) {
//Llena el objeto $producto con los parámetros enviados
    $producto->setNombre($_POST['nombre']);
    $producto->setPrecio($_POST['precio']);
    if ($producto->update()) {
        echo "<div class='alert alert-success'></div>";
    } else {
        echo "<div class='alert alert-danger'></div>";
    }
}
?>
<?php
include_once "../layout/layout_footer.php";
?>