<div class="box" style="width: 80%; margin-left: 20%;">
<h1 class="page-header" >
       <?php echo $prov->getId() != null ? $prov->getNombre() :'Nuevo Proveedor'; ?>
 
</h1>



    <form id="frm-proveedor" action="?c=proveedor&a=Guardar" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre"  class="form-control" placeholder="Ingrese Nombre" data-validacion-tipo="requerido|min:20" />
        </div>

        <div class="form-group">
            <label>Apellido Paterno</label>
            <input type="text" name="apPat" class="form-control" placeholder="IngreseApellido Paterno" data-validacion-tipo="requerido|min:100" />
        </div>

        <div class="form-group">
            <label>Apellido Materno</label>
            <input type="text" name="apMat"  class="form-control" placeholder="Ingrese Apellido Materno" data-validacion-tipo="requerido|min:20" />
        </div>

        <div class="form-group">
            <label>Marca</label>
            <input type="text" name="marca"class="form-control" placeholder="Ingrese Marca del producto" data-validacion-tipo="requerido|min:100" />
        </div>

        <div class="form-group">
            <label>Dirección</label>
            <input type="text" name="direccionPro"  class="form-control" placeholder="Ingrese Dirección" data-validacion-tipo="requerido|min:20" />
        </div>

        <div class="form-group">
            <label>Producto</label>
            <input type="text" name="producto"  class="form-control" placeholder="Ingrese Producto" data-validcion-tipo="requerido|min:100" />
        </div>

        <div class="form-group">
            <label>Ciudad</label>
            <input type="text" name="ciudad"  class="form-control" placeholder="Ingrese Ciudad" data-validacion-tipo="requerido|min:20" />
        </div>

        <div class="form-group">
            <label>Cantidad</label>
            <input type="text" name="cantidad"  class="form-control" placeholder="Ingrese Cantidad" data-validacion-tipo="requerido|min:100" />
        </div>

        <hr />

        <div class="text-right">
            <a class="btn btn-danger " href="?c=proveedor">Cancelar</a>
            <button class="btn btn-primary">Guardar</button>

        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        $("#frm-proveedor").submit(function () {
            return $(this).validate();
        });
    });
</script>
