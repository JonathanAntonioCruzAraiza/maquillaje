<div class="box" style="width: 80%; margin-left: 20%;">
<h1 class="page-header" >
      
    Nuevo Usuario
</h1>



    <form id="frm-proveedor" action="?c=usuario&a=Guardar" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre"  class="form-control" placeholder="Ingrese Nombre" data-validacion-tipo="requerido|min:20" />
        </div>

        <div class="form-group">
            <label>Apellido Paterno</label>
            <input type="text" name="apPat"  class="form-control" placeholder="IngreseApellido Paterno" data-validacion-tipo="requerido|min:100" />
        </div>

        <div class="form-group">
            <label>Apellido Materno</label>
            <input type="text" name="apMat"  class="form-control" placeholder="Ingrese Apellido Materno" data-validacion-tipo="requerido|min:20" />
        </div>

        <div class="form-group">
            <label>Correo</label>
            <input type="email  " name="correo" class="form-control" placeholder="Ingrese Correo" data-validacion-tipo="requerido|min:100" />
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password"  class="form-control" placeholder="Ingrese Password" data-validacion-tipo="requerido|min:20" />
        </div>

        <hr />

        <div class="text-right">
            <a class="btn btn-danger " href="?c=usuario">Cancelar</a>
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