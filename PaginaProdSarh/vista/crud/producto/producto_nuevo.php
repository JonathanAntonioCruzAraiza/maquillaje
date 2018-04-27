<div class="box" style="width: 80%; margin-left: 20%;">
<h1 class="page-header" >
       <?php echo $objPro->idProducto != null ? $objPro->producto : 'Nuevo Registro'; ?>
    Nuevo Producto
</h1>


    <form id="frm-proveedor" action="?c=producto&a=Guardar" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Producto</label>
            <input type="text" name="producto" value="<?php echo $objPro->producto; ?>" class="form-control" placeholder="Ingrese Nombre del Producto" data-validacion-tipo="requerido|min:20" />
        </div>

        <div class="form-group">
            <label>Precio</label>
            <input type="text" name="precio" value="<?php echo $objPro->precio; ?>" class="form-control" placeholder="Ingrese Precio del Producto" data-validacion-tipo="requerido|min:100" />
        </div>

        <div class="form-group">
            <label>Marca</label>
            <input type="text" name="marca" value="<?php echo $objPro->marca; ?>" class="form-control" placeholder="Ingrese Marca del Poducto" data-validacion-tipo="requerido|min:20" />
        </div>

        <div class="form-group">
            <label>Proveedor</label>
            <input type="text" name="proveedor" value="<?php echo $objPro->proveedor; ?>" class="form-control" placeholder="Ingrese el Proveedor" data-validacion-tipo="requerido|min:100" />
        </div>

        <div class="form-group">
            <label>Codigo</label>
            <input type="text" name="codigo" value="<?php echo $objPro->codigo; ?>" class="form-control" placeholder="Ingrese el Codigo del Producto" data-validacion-tipo="requerido|min:20" />
        </div>

        <div class="form-group">
            <label>Precio de Venta</label>
            <input type="text" name="precioVenta" value="<?php echo $objPro->precioVenta; ?>" class="form-control" placeholder="IngresePrecio de Venta delProducto" data-validcion-tipo="requerido|min:100" />
        </div>


        <hr />

        <div class="text-right">
            <a class="btn btn-danger " href="?c=producto">Cancelar</a>
            <button class="btn btn-primary">Guardar</button>

        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        $("#frm-producto").submit(function () {
            return $(this).validate();
        });
    });
</script>
