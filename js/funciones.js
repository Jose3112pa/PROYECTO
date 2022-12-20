$(document).ready(function(){

    $("#menuInicio").click(function(event){
       $("#divPrincipal").show("slow");
       $("#divFormulario").hide("slow");
    });
    //evento clic del menu alumno
    $("#menuAlumno").click(function(event){
       $("#divPrincipal").hide("slow");
    //llenar div mostrar
    $("#mostrar").load("./php/mostrarAlumnos.php");
       $("#divFormulario").show("slow");
       $("#mostrarGrafica").load("./php/generargrafica.php");
    });
    
    //evento de boton guardar
    $("#btnGuardar").click(function(event){
        var id,nombre,sexo,edad,o,r,en,en_,accion,estadoBoton;
        //recoger los datos de las cajas 
        id=$("#txtid").val();
        nombre=$("#txtNombre").val();
        sexo=$("#txtSexo").val();
        edad=$("#txtEdad").val();
        o=$("#txtO").val();
        r=$("#txtR").val();
        en=$("#oxigenacion1").val();
        en_=$("#ritmo1").val();
        estadoBoton=$("#btnGuardar").val();
        if(estadoBoton=="guardar")
        accion="guardarAlumno";
        else
        accion="editarAlumno";


        //usamos ajax para enviar los datos recogidos
        $.ajax({
            url:"./php/server.php",
            type:"GET",
            data:{id:id,nombre:nombre,sexo:sexo,edad:edad,o:o,r:r,en:en,en_:en_,accion:accion},
            success:function(respuestaServer){
                if(respuestaServer=="1")
                {
                   alertify.success("Accion correcta");
                   $("#btnGuardar").removeClass();
                   $("#btnGuardar").val("guardar");
                   $("#btnGuardar").html("Guardar");
                   $("#btnGuardar").addClass("btn btn-primary");
                   
                      
                  limpiarCampos();
                   $("#mostrar").load("./php/mostrarAlumnos.php");
                   $("#mostrarGrafica").load("./php/generargrafica.php");
                }else{
                    alert("No se registro :( ");
                }
            }
        });
    });
});


$("#btnNuevo").click(function(event){
    $("#txtClave").val("");
    $("#txtNombre").val("");
    $("#txtApellido").val("");
    $("#txtClave").focus("");
});



function eliminar(id){
    alertify.confirm("Seguro de eliminar eliminar el id" + id+ "?", function(respuesta){
        if(respuesta){
            $.ajax({
                url:"./php/server.php",
                type:"GET",
                data: {id:id, accion:"eliminarAlumno"},
                success:function(respuestaServer){
                    if(respuestaServer){
                        alertify.success("Eliminacion exitosa");
                        $("#mostrar").load("./php/mostrarAlumnos.php");
                        $("#mostrarGrafica").load("./php/generargrafica.php");
                    }
                }
            });
        }
    })
}


function editar (id, clave, nombre, apellido){
    $("#txtClave").val(clave);
    $("#txtNombre").val(nombre);
    $("#txtApellido").val(apellido);

    $("#btnGuardar").removeClass();
    $("#btnGuardar").val("Actualizar");
    $("#btnGuardar").html("Actualizar");
    $("#btnGuardar").addClass("btn btn-secondary");
    $("#txtClave").prop("disable",true);

}

function limpiarCamos(){
    $("#txtClave").val("");
    $("#txtNombre").val("");
    //coclocar valor sobre un elemento
    $("#txtClave").focus("");
}
