
<div class="box" style="width: 60%; margin-left: 20%;">
<h1 class="page-header">Producto</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=producto&a=Nuevo">Nuevo Producto</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
           <th style="width:180px;">ID Prod.</th>
            <th style="width:120px;">Producto</th>
            <th style="width:120px;">Marca</th>
            <th style="width:180px;">Proveedor</th>
            <th style="width:120px;">Codigo</th>
            <th style="width:120px;">PrecioVenta</th>
           
          
    </thead>
    <tbody>
    <?php foreach($this->objPro->Listar() as $p): ?>
        <tr>
            
            <td><?php echo $p->idProducto; ?></td>
            <td><?php echo $p->producto; ?></td>
            <td><?php echo $p->marca ; ?></td>
            <td><?php echo $p->proveedor; ?></td>
            <td><?php echo $p->codigo; ?></td>
            <td><?php echo $p->precioVenta; ?></td>
            
            <td>
                <a class="btn btn-success " href="?c=producto&a=Crud&idProducto=<?php echo $p->idProducto; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar El Usuario Seleccionado?');" href="?c=producto&a=Eliminar&idProducto=<?php echo $p->idproducto; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>



