<?php
session_start(); 

 //Se incluye la configuración de conexión a datos en el

 require_once 'configuracion/Database.php';
 //Para registrar productos es necesario iniciar los proveedores
 //de los mismos, por ello la variable controller para este
 //ejercicio se inicia con el 'proveedor'.
// $controller = 'login';
$controller = 'login';
 // Todo esta lógica hara el papel de un FrontController
 if(!isset($_REQUEST['c']))
 {
   //Llamado de la página principal
     
   require_once "controlador/$controller"."Controlador.php";
   $controller = ucwords($controller) . 'Controlador';
   $controller = new $controller;
   $controller->Index();
   
   
 }
 else
 {
     
    // echo "<script> alert('loggedin->".$controller."session".$_SESSION['loggedin']."'); </script>";
     //echo "<script> alert('loggedin->".$_SESSION['loggedin']."'); </script>";
     $controller = strtolower($_REQUEST['c']);
     $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
     
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ||
             $controller == 'login' && $accion == 'Index' || $accion == 'CerrarSesion') {
           // Obtiene el controlador a cargar
           
         //  echo "<script> alert('loggedin->".$controller."'); </script>";
           // Instancia el controlador
           require_once "controlador/$controller"."controlador.php"; //contronlador/usuarioconstrolador
           $controller = ucwords($controller) . 'Controlador';
           $controller = new $controller; //usuaricontrolador();

           // Llama la accion
           call_user_func( array( $controller, $accion ) );
       }else{
           echo "acceso denegado por permisos o no se encuntra la pagina";
       }
       
 }