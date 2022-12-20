<?php 
include "php/conexion.php";

$accion=$_GET["accion"];

switch($accion){
    case 'guardarAlumno':

        $id=$_GET["id"];
        $nombre=$_GET["Nombre"];
        $sexo=$_GET["Sexo"];
        $edad=$_GET["Edad"];
        $o=$_GET["O"];
        $r=$_GET["R"];
        $en=$_GET["enf_rec"];
        $en_=$_GET["enf_rec_"];
        
        

        

        $sql="insert into paciente values ('$id','$nombre','$sexo','$edad','$o','$r','$en','$en_')";

        $ejecutarSQL=$conexion->query($sql);

        if($ejecutarSQL){
            echo "1";
        }
        else {
            echo "0";
        }
        break;

        case 'eliminarAlumno':

            $clave=$_GET["id"];
           
    
            $sql="delete from alumno where id='$id'";
    
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