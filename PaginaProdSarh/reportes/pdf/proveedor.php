<?php 
	require_once("dompdf/dompdf_config.inc.php");
	$conexion = mysql_connect("localhost","root","");
	mysql_select_db("curso",$conexion);

$codigoHTML='
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista</title>
</head>

<body>
<div align="center">
	
    <table width="100%" border="1">
      <tr>
     
        <td bgcolor="#e50073"><strong>Nombre</strong></td>
        <td bgcolor="#e50073"><strong>Apellido Paterno</strong></td>
        <td bgcolor="#e50073"><strong>Apellido Materno</strong></td>
        <td bgcolor="#e50073"><strong>Marca</strong></td>
        <td bgcolor="#e50073"><strong>Direccion</strong></td>
        <td bgcolor="#e50073"><strong>Producto</strong></td>
        <td bgcolor="#e50073"><strong>Ciudad</strong></td>
        <td bgcolor="#e50073"><strong>Cantidad</strong></td>
      </tr>';

        $consulta=mysql_query("SELECT * FROM proveedor");
        while($dato=mysql_fetch_array($consulta)){
$codigoHTML.='
      <tr>
    
        <td>'.$dato['nombre'].'</td>
        <td>'.$dato['apPat'].'</td>
        <td>'.$dato['apMat'].'</td>
        <td>'.$dato['marca'].'</td>
        <td>'.$dato['direccionPro'].'</td>
        <td>'.$dato['Producto'].'</td>
        <td>'.$dato['ciudad'].'</td>
         <td>'.$dato['cantidad'].'</td>	
		  
      </tr>';
      } 
$codigoHTML.='
    </table>
	
</div>
</body>
</html>';

$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Listado Proveedores.pdf");
?>
<H2 align="center"><a href="http://adf.ly/1011082/html-dompdf">DESCARGAR CODIGO FUENTE</a></H2>