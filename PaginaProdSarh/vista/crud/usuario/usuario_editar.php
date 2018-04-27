<div class="box" style="width: 60%; margin-left: 20%;">
<h1 class="page-header">
    
</h1>



<form id="frm-tipucto" action="?c=usuario&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $us->id; ?>" />

     <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $us->nombre; ?>" class="form-control" placeholder="Ingrese Nit Proveedor" data-validacion-tipo="requerido|min:20" required/>
        </div>

        <div class="form-group">
            <label>Apellido Paterno</label>
            <input type="text" name="apPat" value="<?php echo $us->apPat; ?>" class="form-control" placeholder="Apellido Materno" required data-validacion-tipo="requerido|min:100" />
        </div>

        <div class="form-group">
            <label>Apellido Materno</label>
            <input type="text" name="apMat" value="<?php echo $us->apMat; ?>" class="form-control" placeholder="Ingrese Apellido Materno" required data-validacion-tipo="requerido|min:20" />
        </div>
        <div class="form-group">
            <label>correo</label>
            <input type="email" name="correo" value="<?php echo $us->correo; ?>" class="form-control" placeholder="Ingrese Correo Electronico" required data-validacion-tipo="requerido|min:100" />
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $us->password; ?>" class="form-control" placeholder="Ingrese Password" required data-validacion-tipo="requerido|min:20" />
        </div>


    <hr />

    <div class="text-right">
        <a class="btn btn-danger " href="?c=usuario">Salir</a>
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
