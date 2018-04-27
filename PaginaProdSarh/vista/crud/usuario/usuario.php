
<div class="box" style="width: 60%; margin-left: 20%;">
<h1 class="page-header">Usuario</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=producto&a=Nuevo">Nuevo Usuario</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre</th>
            <th style="width:120px;">Apellido Paterno</th>
            <th style="width:120px;">Apellido Materno</th>
            <th style="width:180px;">Correo</th>
            <th style="width:120px;">Password</th>
           
          
    </thead>
    <tbody>
    <?php foreach($this->objetoUs->Listar() as $u): ?>
        <tr>
            
            <td><?php echo $u->nombre; ?></td>
            <td><?php echo $u->apPat; ?></td>
            <td><?php echo $u->apMat ; ?></td>
            <td><?php echo $u->correo; ?></td>
            <td><?php echo $u->password; ?></td>
            
            <td>
                <a class="btn btn-success " href="?c=usuario&a=CrudUs&id=<?php echo $u->id; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar El Usuario Seleccionado?');" href="?c=usuario&a=Eliminar&id=<?php echo $u->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>

