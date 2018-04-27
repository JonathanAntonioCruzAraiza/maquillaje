<?php
$url_page ="../../";
include_once '../layout/layout_header.php';
include_once "../../configuracion/Database.php";
include_once "../../modelo/Producto.php";

//obtiene el id de la entidad  a modificar
$id = isset($_GET['id'])?$_GET['id']:die('ERROR:missing ID.');

//obtiene la conexion hacia la base de dato 
$producto = new Producto();
$producto->setId($id);
$producto->readId();

//Establese el titulo de la pagina
$page_title = " ";

?>

<h1><?php echo $page_title?></h1>

<!--Botón de consultar entidades-->

<!--Procesar la información-->

<!--Forma a modificar el registro entidad-->

<form  class="form-horizontal" method="post">
    <fieldset>
                        <legend class="text-center header">Detalle de productos</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="nombre" name="nombre" type="text"class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="precio" name="precio" type="text" class="form-control">
                            </div>
                        </div>
                               <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="marca" name="marca" type="text"  class="form-control">
                            </div>
                               </div>
                        <div class="row"> 
                                   <div class="col-md-8 text-right">
                                   <div class="right-button_margin ">
                                       
                                           <button type="submit" class="btn btn-primary ">Agregar Producto</button>
                                       
                                       <a id="btn_listar" href="listar_producto.php" class='btn btn-primary' style="background-color: #2ecc71"> Ver Productos</a>
                                       
                                       <a href='listar_producto.php' class='btn btn-primary' style="background-color: orange">Consultar</a>

                                   </div>
                                       
                               </div>
                            </div>
    </fieldset>
</form>
<!--  <table class='table table-hover'>
        <tr>
            <td>Nombre</td>
            <td><input type='text' name='nombre' id='nombre' class="form-control"></td>
        </tr>
        <tr>
            <td>Alias</td>
            <td><input type='text' name='precio' id='precio' class="form-control"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><button  type='submit' name='enviar' id='enviar' class="btn btn-primary" >
                    Insertar</button></td>
        </tr>
    </table>
   -->
</form>



<!--<form action='' method='POST'>
    <table class='table table-hover'>
        <tr>
            <td>Nombre</td>
            <td><input type='text' readonly="true" name='nombre' id="nombre" value="<?php echo $producto->getNombre(); ?>"
                       class="form-control"></td>
        </tr>
        <tr>
            <td>Alias</td>
            <td><input type='text' name='precio' readonly="true" value="<?php echo $producto->getPrecio(); ?>"
                       class="form-control"></td>
        </tr>
    </table>
</form>
-->


<?php
include_once "../layout/layout_footer.php";
?>
