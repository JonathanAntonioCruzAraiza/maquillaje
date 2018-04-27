<?php
include_once '../../configuracion/Database.php';
include_once '../../modelo/productoDAO.php';
// Obtiene la conexión hacia la base de datos
$producto = new Producto();
$url_page ="../../";
// Establece el título de la página
$page_title = " ";
include_once "../layout/layout_header.php"; //header

// Establece la cabecera
$page_title = " ";
include_once "../layout/layout_header.php"; //header
?>
<!--—Visualiza título de la página -->
<h1><?php echo $page_title ?></h1>


 <div class="box">

        <div class="row">
<form  class="form-horizontal" method="post">
    <fieldset>
                        <legend class="text-center header">Agregar Productos</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-6">
                                <input id="nombre" name="producto" type="text" placeholder="Producto" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-6">
                                <input id="precio" name="precio" type="text" placeholder="Precio" class="form-control">
                            </div>
                        </div>
                               <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-6">
                                <input id="marca" name="marca" type="text" placeholder="Marca" class="form-control">
                            </div>
                               </div>
                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-6">
                                <input id="marca" name="proveedor" type="text" placeholder="Proveedor" class="form-control">
                            </div>
                               </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-6">
                                <input id="marca" name="codigo" type="text" placeholder="Codigo" class="form-control">
                            </div>
                               </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-6">
                                <input id="marca" name="precioVenta" type="text" placeholder="Precio Venta" class="form-control">
                            </div>
                               </div>
                        <div class="row"> 
                                   <div class="col-md-8 text-right">
                                   <div class="right-button_margin ">
                                       
                                           <button type="submit" class="btn btn-primary ">Agregar Producto</button>
                                       
                                       <a id="btn_listar" href="listar_producto.php" class='btn btn-primary' style="background-color: #2ecc71"> Ver Productos</a>
                                   </div>
                                       
                               </div>
                            </div>
    </fieldset>
     </div>
                            </div>
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




<?php
include_once "../layout/layout_footer.php"; //footer
?>

