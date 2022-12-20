<?php 
    

    #CAPTURA DE LOS DATOS
    $usuario_nombre=$_POST['txtid'];
    $usuario_email=$_POST['txtNombre'];
    $usuario_password=$_POST['txtSexo'];
	$usuario_passwordi=$_POST['txtEdad'];
    $usuario_passworddd=$_POST['txtO'];
    $usuario_passwordddd=$_POST['txtR'];
    $usuario_pais=$_POST['oxigenacion1'];
	$usuario_paiss=$_POST['ritmo1'];
    include_once 'conexion.php';
	$con=conexion();

        #consulta
        $sql="INSERT INTO paciente(id,Nombre,Sexo,Edad,O,R,enf_rec,enf_rec_) VALUES 
		($usuario_nombre,'$usuario_email','$usuario_password','$usuario_passwordi','$usuario_passworddd','$usuario_passwordddd','$usuario_pais','$usuario_paiss')";
        $query=mysqli_query($con,$sql);
        if($query){
            ?> 
	    	<h3 class="ok">¡Hecho!</h3>
           <?php
        }else{
            header('refresh:0;url=index.php?error');
        }
?>