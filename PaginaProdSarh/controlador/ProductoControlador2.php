<?php
include_once '../modelo/productoDAO.php';
/*Fujo

 * Vista, Js, controlador, DAO */


//Recibe los datos que manda el js
$action = null;
if (isset($_POST["action"]) && !empty($_POST["action"])) { //Revisa si existe el valor action 
    $action = $_POST["action"];
   }

$action and $action != ""?call_user_func($action, array()):"";

/*E L I M I N A R*/

function delete(){
    
    $key =$_POST['idProducto'];
    
    $PDAO = new ProductoDAO();
  
    $PDAO->setIdProducto( $key);
    
    $Mensaje="";
    $PDAO->delete($key);
    $Resultado = $PDAO->getIdProducto();
   
        if ($Resultado ==true) {
            $Respuesta=1;
            $Mensaje='EL Producto fue Eliminado Exitosamente.';
        } else  if ($Resultado ==false) {
            $Respuesta=2;
            $Mensaje='No es posible eliminar el Producto.';
        }
    
        $arrResultado = Array("Resultado" => $Respuesta,"Mensaje" => $Mensaje);
        echo json_encode($arrResultado);

}


//consultar datos
function readId(){
    $idProducto =$_POST['idProducto'];
    $PDAO = new ProductoDAO();
  
    $PDAO->setIdProducto($idProducto);
    
    $Mensaje="";
    $PDAO->readId();
    $Resultado = $PDAO->getIdProducto();
        
    if ($Resultado != NULL) {
        $Respuesta=1;
        $Mensaje='Los Datos Fueron Guardados exitosamente.';
    } else  if ($Resultado == NULL) {
        $Respuesta=2;
        $Mensaje='Los Datos No Fueron Guardados.';
    }
    
    
    $producto = $PDAO->getProducto();
    $precio = $PDAO->getPrecio();
    $marca = $PDAO->getMarca();
    $proveedor = $PDAO->getProveedor();
    $codigo = $PDAO->getCodigo();
    $precioVenta = $PDAO->getPrecioVenta();
     
   
    $arrDatos =Array("producto" => $producto, "precio" => $precio, "marca" => $marca, 
        "proveedor" => $proveedor, "codigo" => $codigo, "precioVenta" => $precioVenta, "idProducto" => $id);
    
    $arrResultado = Array("Resultado" => $Respuesta,"Mensaje" => $Mensaje, "arrDatos" => $arrDatos);
    echo json_encode($arrResultado );
    

}

function insert(){
   
    // Obtiene la conexión hacia la base de datos
    $PDAO = new ProductoDAO();
    
    $idProducto=$_POST['idProducto'];
    $producto=$_POST['producto'];
    $precio=$_POST['precio'];
    $marca=$_POST['marca'];
    $proveedor=$_POST['proveedor'];
    $codigo=$_POST['codigo'];
    $precioVenta=$_POST['precioVenta'];
    
 
    
    $PDAO->setIdProducto($idProducto);
    $PDAO->setProducto($producto);
    $PDAO->setPrecio($precio);
    $PDAO->setMarca($marca);
    $PDAO->setProveedor($proveedor);
    $PDAO->setCodigo($codigo); 
    $PDAO->setPrecioVenta($precioVenta);
    
  
    
   
    if($idProducto != ""){//Editar
        
            $Accion = 2;     
            $Mensaje="";
            $Resultado= $PDAO->update();
           
            if ($Resultado=true) {
                $Respuesta=1;
                $Mensaje='Producto modificado exitosamente.';
            } else  if ($Resultado=false) {
                $Respuesta=2;
                $Mensaje='No es posible modificar el Producto.';
            }


            $arrResultado = Array("Resultado" => $Respuesta,"Mensaje" => $Mensaje,"Accion" => $Accion);
            echo json_encode($arrResultado);
    } else {
       // echo 'insertar';
        $Accion = 2;
        $Mensaje="";
        $Resultado= $PDAO->insert();
    
        //echo $Resultado;
        if ($Resultado=true) {
            $Respuesta=1;
            $Mensaje='Producto agregado exitosamente.';
        } else  if ($Resultado=false) {
            $Respuesta=2;
            $Mensaje='No es posible agregar el Producto.';
        }
    
    
        $arrResultado = Array("Resultado" => $Respuesta,"Mensaje" => $Mensaje, "Accion" => $Accion);
        echo json_encode($arrResultado);
        }
}
?>
