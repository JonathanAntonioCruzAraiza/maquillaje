<?php
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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Enviar Pedido a Proveedor</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="nombre" type="text" placeholder="Nombre(s)" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="lname" name="apellido" type="text" placeholder="Apellido(s)" class="form-control">
                            </div>
                        </div>
                               <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="producto" type="text" placeholder="Producto" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="cantidad" type="text" placeholder="Cantidad" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="marca" type="text" placeholder="Marca" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message" name="Descripción" placeholder="Redacta un mensaje" rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" placeholder="Correo Electronico" class="form-control">
                            </div>
                        </div>

                 
                        <div class="row">
                        <div class="form-group">
                            <div class="col-md-12 text-left">
                                <button type="submit" class="btn btn-primary btn-lg">Enviar Pedido</button>
                                <button type="submit" class="btn btn-primary btn-lg">Imprimir</button>
                            </div>
                        </div>
                            </div>
                    </fieldset>
                </form>
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
