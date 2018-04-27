window.onload = function(){
    //alert('Hola sariss ');
    //validarProducto();
};


//funcion para llamar validacion de producto 
function llamarValidarProducto() {
   
    //se svalida el form
    $('#frmVehiculo').bootstrapValidator("validate");
    var iValido = false;
    //se recupera el estatus 
    iValido = $('#frmVehiculo').data("bootstrapValidator").isValid();
    //se verifica si el form es valido
    if (iValido == true) {
        realizaProceso();
    } else {
       
        alert("Debe de llenar Todos los campos");
    }
}
//Rhuerta
//Función para validar formulario 
function validarProveedor() {
    $('#frmProducto').bootstrapValidator({
        excluded: [':disabled', ':hidden', ':not(:visible)'],
        message: 'El valor no es valido.',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'fa fa-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            marca: {
                validators: {
                    notEmpty: {
                        message: 'El Campo es obligatorio.'
                    },
                    regexp: {
                        regexp: /^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/,
                        message: 'Campo no acepta caracteres especiales'
                    }
                }
            },
            modelo: {
                validators: {
                    notEmpty: {
                        message: 'El Campo es obligatorio.'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Campo sólo acepta nùmeros'
                    }
                }
            },
            color: {
                validators: {
                    notEmpty: {
                        message: 'El Campo es obligatorio.'
                    },
                    regexp: {
                        regexp: /^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/,
                        message: 'Campo solo acepta caracteres números'
                    }
                }
            },
            descripcion: {
                validators: {
                    notEmpty: {
                        message: 'El Campo es obligatorio.'
                    },
                    regexp: {
                        regexp: /^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/,
                        message: 'Campo no acepta caracteres especiales'
                    }
                }
            },
            idTipoV: {
                excluded: false,
                validators: {
                    notEmpty: {
                        message: 'Campo obligatorio debe seleccionar una opción.'
                    }
                }
            },
            precio: {
                validators: {
                    notEmpty: {
                        message: 'El Campo es obligatorio.'
                    },
                    regexp: {
                        regexp: /^\d{1,10}(\.\d{1,2})?$/,
                        message: 'Campo acepta números con dos decimales'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        e.preventDefault();

    });
}

function readId(idProducto){
  console.log("error id proeuo");
   
        $.ajax({
              url:   'controlador/VehiculoControlador.php?c=producto&a=Crud&IdProducto='+idProducto,
                dataType: 'json',  
                success:  function (response) {
    
                     alert("datos->"+response);
                    },
                error: function(XMLHttpRequest, textStatus, erroThrown){
                    alert("Error al obtener datos->"+erroThrown);
                    

                }
        });
}


function IdEliminarVehiculo(id){
    $(htxtiIdRegistroEliminar).val(id);
}

function obtenerIdEliminar(){
    var idV = $(htxtiIdRegistroEliminar).val();
    eliminarVehiculo(idV);
}

function eliminarVehiculo(idVehiculo){

    var datos = { action: 'delete', idProducto:idProducto };
        $.ajax({
                data:  datos,
                url:   '../controlador/productoControlador.php',
                type:  'post',
                dataType: 'json',
                success:  function (response) {

                    var  respuesta = response.Mensaje;
                 
                    alert(respuesta);  
                     
                    location.reload();
                },
                error: function(XMLHttpRequest, textStatus, erroThrown){
                    alert("mall");
                }
        });
}

//Insertar y Editar
function realizaProceso(){
    var idVehiculo = $("#IdProducto").val();
    var marca = $("#producto").val();
    var modelo = $("#precio").val();
    var color = $("#marca").val();
    var descripcion = $("#proveedor").val();
    var idTipoAuto = $("#codigo").val();
    var precio = $("#precioVenta").val();
   
   
 
    
    var datos = { action: 'insert',  IdProducto: IdProducto, producto: producto, precio: precio,
             precio: precio , marca:  marca, 
             idTiPr: IdProducto, precio:  precio 
            };
   alert(datos);
        $.ajax({
                data:  datos,
                url:   '../../../controlador/ProductoControlador.php',
                type:  'post',
                dataType: 'json',
                success:  function (response) {
                  var  resultado = response.Mensaje;
                    
                    alert(resultado);

                    location.reload();
                },
                error: function(XMLHttpRequest, textStatus, erroThrown){
                    alert("mall");
                }
        });
}
