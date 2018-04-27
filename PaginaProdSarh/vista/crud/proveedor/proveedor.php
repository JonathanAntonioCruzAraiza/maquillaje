<div class="box" style="width: 60%; margin-left: 20%;">
<h1 class="page-header">Proveedor</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=proveedor&a=Nuevo">Nuevo Proveedor</a>
    <a class="btn btn-primary" href="?c=proveedor&a=Reporte">Reporte Proveedor</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre</th>
            <th style="width:120px;">Apellido Paterno</th>
            <th style="width:120px;">Apellido Materno</th>
            <th style="width:180px;">Marca</th>
            <th style="width:120px;">Direccion</th>
            <th style="width:120px;">Producto</th>
            <th style="width:180px;">Ciudad</th>
            <th style="width:120px;">Cantidad</th>
          
    </thead>
    <tbody>
    <?php foreach($this->objeto->Listar() as $r): ?>
        <tr>
            
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->apPat; ?></td>
            <td><?php echo $r->apMat ; ?></td>
            <td><?php echo $r->marca; ?></td>
            <td><?php echo $r->direccionPro; ?></td>
            <td><?php echo $r->Producto ; ?></td>
            <td><?php echo $r->ciudad; ?></td>
            <td><?php echo $r->cantidad; ?></td>
            <td>
                <a class="btn btn-success " href="?c=proveedor&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=proveedor&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>
