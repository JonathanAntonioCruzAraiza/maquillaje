<div class="box" style="width: 60%; margin-left: 20%;">
<h1 class="page-header">
    
</h1>

<form id="frm-tipucto" action="?c=producto&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idProducto" value="<?php echo $objPro->idProducto; ?>" />

     <div class="form-group">
            <label>Producto</label>
            <input type="text" name="producto" value="<?php echo $objPro->producto; ?>" class="form-control" placeholder="Ingrese en nombre Producto" data-validacion-tipo="requerido|min:20" />
        </div>

        <div class="form-group">
            <label>Precio del Producto</label>
            <input type="text" name="precio" value="<?php echo $objPro->precio; ?>" class="form-control" placeholder="Precio deñl producto" data-validacion-tipo="requerido|min:100" />
        </div>

        <div class="form-group">
            <label>Marca</label>
            <input type="text" name="marca" value="<?php echo $objPro->marca; ?>" class="form-control" placeholder="Ingrese Marca del producto" data-validacion-tipo="requerido|min:20" />
        </div>
        <div class="form-group">
            <label>Proveedor</label>
            <input type="text" name="proveedor" value="<?php echo $objPro->proveedor; ?>" class="form-control" placeholder="Ingrese Correo Electronico" data-validacion-tipo="requerido|min:100" />
        </div>

        <div class="form-group">
            <label>Codigo</label>
            <input type="text" name="codigo" value="<?php echo $objPro->codigo; ?>" class="form-control" placeholder="Ingrese Password" data-validacion-tipo="requerido|min:20" />
        </div>
     <div class="form-group">
            <label>Precio De Venta</label>
            <input type="text" name="PrecioVenta" value="<?php echo $objPro->PrecioVenta; ?>" class="form-control" placeholder="Ingrese Password" data-validacion-tipo="requerido|min:20" />
        </div>


    <hr />

    <div class="text-right">
        <a class="btn btn-danger " href="?c=producto">Salir</a>
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>
 </div>
<script>
    $(document).ready(function(){
        $("#frm-tipucto").submit(function(){
            return $(this).validate();
        });
    });
</script>
