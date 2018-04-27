<div class="box" style="width: 60%; margin-left: 20%;">
<h1 class="page-header">
    <?php echo $prov->id != null ? $prov->nombre : 'Nuevo Registro'; ?>
    Actulizar Proveedor
</h1>



<form id="frm-tipucto" action="?c=proveedor&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $prov->id; ?>" />

     <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $prov->nombre; ?>" class="form-control" placeholder="Ingrese Nit Proveedor" data-validacion-tipo="requerido|min:20" />
        </div>

        <div class="form-group">
            <label>Apellido Paterno</label>
            <input type="text" name="apPat" value="<?php echo $prov->apPat; ?>" class="form-control" placeholder="Apellido Materno" data-validacion-tipo="requerido|min:100" />
        </div>

        <div class="form-group">
            <label>Apellido Materno</label>
            <input type="text" name="apMat" value="<?php echo $prov->apMat; ?>" class="form-control" placeholder="Ingrese Apellido Materno" data-validacion-tipo="requerido|min:20" />
        </div>
        <div class="form-group">
            <label>Marca</label>
            <input type="text" name="marca" value="<?php echo $prov->marca; ?>" class="form-control" placeholder="Ingrese Razón Social" data-validacion-tipo="requerido|min:100" />
        </div>

        <div class="form-group">
            <label>Dirección</label>
            <input type="text" name="direccionPro" value="<?php echo $prov->direccionPro; ?>" class="form-control" placeholder="Ingrese Nit Proveedor" data-validacion-tipo="requerido|min:20" />
        </div>

        <div class="form-group">
            <label>Producto</label>
            <input type="text" name="producto" value="<?php echo $prov->Producto; ?>" class="form-control" placeholder="Ingrese Razón Social" data-validcion-tipo="requerido|min:100" />
        </div>
        <div class="form-group">
            <label>Ciudad</label>
            <input type="text" name="ciudad" value="<?php echo $prov->ciudad; ?>" class="form-control" placeholder="Ingrese Nit Proveedor" data-validacion-tipo="requerido|min:20" />
        </div>

        <div class="form-group">
            <label>Cantidad</label>
            <input type="text" name="cantidad" value="<?php echo $prov->cantidad; ?>" class="form-control" placeholder="Ingrese Razón Social" data-validacion-tipo="requerido|min:100" />
        </div>
   

    <hr />

    <div class="text-right">
        <a class="btn btn-danger " href="?c=proveedor">Salir</a>
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
