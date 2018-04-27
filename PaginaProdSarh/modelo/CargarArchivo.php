<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of CargarArchivo
 *
 * @author MTI
 */
class CargarArchivo {
    //put your code here
    
    function agregarArchivo(){
         # definimos la carpeta destino
    $carpetaDestino = "../media/img/";
    # si hay algun archivo que subir
    if (isset($_FILES["archivo"]) && $_FILES["archivo"]["name"][0]) {
        
        # recorremos todos los arhivos que se han subido
        for ($i = 0; $i < count($_FILES["archivo"]["name"]); $i++) {
            
            # si es un formato de imagen
            if ($_FILES["archivo"]["type"][$i] == "image/jpeg" || $_FILES["archivo"]["type"][$i] == "image/pjpeg" || $_FILES["archivo"]["type"][$i] == "image/gif" || $_FILES["archivo"]["type"][$i] == "image/png") {
                
                # si exsite la carpeta o se ha creado
                if (file_exists($carpetaDestino) || @mkdir($carpetaDestino)) {
                    $origen = $_FILES["archivo"]["tmp_name"][$i];
                    $destino = $carpetaDestino . $_FILES["archivo"]["name"][$i];
                    
                    # movemos el archivo
                    if (@move_uploaded_file($origen, $destino)) {
                        echo "<br>" . $_FILES["archivo"]["name"][$i] . " movido correctamente";
                    } else {
                        echo "<br>No se ha podido mover el archivo: " . $_FILES["archivo"]["name"][$i];
                    }
                } else {
                    echo "<br>No se ha podido crear la carpeta: " . $carpetaDestino;
                }
            } else {
                echo "<br>" . $_FILES["archivo"]["name"][$i] . " - NO es imagen jpg, png o gif";
            }
        }
    } else {
        echo "<br>No se ha subido ninguna imagen";
    }
    }
}
