<?php 
include "php/conexion.php";

$accion=$_GET["accion"];

switch($accion){
    case 'guardarAlumno':

        $usuario_nombre=$_POST['txtid'];
    $usuario_email=$_POST['txtNombre'];
    $usuario_password=$_POST['txtSexo'];
	$usuario_passwordi=$_POST['txtEdad'];
    $usuario_passworddd=$_POST['txtO'];
    $usuario_passwordddd=$_POST['txtR'];
    $usuario_pais=$_POST['oxigenacion1'];
	$usuario_paiss=$_POST['ritmo1'];
    include_once 'conexion.php';

        $sql="insert into alumno values ($usuario_nombre,'$usuario_email','$usuario_password','$usuario_passwordi','$usuario_passworddd','$usuario_passwordddd','$usuario_pais','$usuario_paiss')";

        $ejecutarSQL=$conexion->query($sql);

        if($ejecutarSQL){
            echo "1";
        }
        else {
            echo "0";
        }
        break;

        case 'eliminarAlumno':

            $usuario_passwordi=$_GET["id"];
           
    
            $sql="delete from paciente where id='$id'";
    
            $ejecutarSQL=$conexion->query($sql);
    
            if($ejecutarSQL){
                echo "1";
            }
            else {
                echo "0";
            }
            break;

            case 'editarAlumno':

                $clave=$_GET["clave"];
                $nombre=$_GET["nombre"];
                $apelido=$_GET["apellido"];
        
                $sql="update alumno set nombre='$nombre', apellido='$apellido' where clave='$clave'";
        
                $ejecutarSQL=$conexion->query($sql);
        
                if($ejecutarSQL){
                    echo "1";
                }
                else {
                    echo "0";
                }
                break;
        
}
?>