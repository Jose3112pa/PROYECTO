<?php 

include("conex.php");

if (isset($_POST['registrar'])) {
    if (strlen($_POST['txtid']) >= 1 && strlen($_POST['txtNombre']) >= 1 && strlen($_POST['txtSexo']) >= 1 && strlen($_POST['txtEdad']) >= 1 && strlen($_POST['txtOxigenacion']) >= 1 && strlen($_POST['txtRitmo']) >= 1) {
	    $id = trim($_POST['txtid']);
	    $nombre = trim($_POST['txtNombre']);
        $sexo = trim($_POST['txtSexo']);
        $edad = trim($_POST['txtEdad']);
        $oxigenacion = trim($_POST['oxigenacion1']);
        $ritmo = trim($_POST['Rritmo1']);

	    $nombres = "INSERT INTO pacientes(id,Nombre,Sexo,Edad,Oxigenacion,Ritmo)VALUES
         ('$id','$nombre','$sexo','$edad','$oxigenacion','$ritmo')";
	    $resultado = mysqli_query($conex,$nombres);
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Registrado!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Complete los campos!</h3>
           <?php
    }
}

?>