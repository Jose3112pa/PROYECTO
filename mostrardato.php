<?php 
$inc = include("conex.php");
if ($inc) {
	$consulta = "SELECT  * FROM datos ORDER by id DESC LIMIT 1";
	$resultado = mysqli_query($conex,$consulta);
	if ($resultado) {
		while ($row = $resultado->fetch_array()) {
	    $id = $row['id'];
	    $nombre = $row['Max'];
	    $email = $row['Fecha'];
	    $fechareg = $row['Hora'];
	    ?>
        <div>
        <h2><b>Hola, paciente</h2>	
		<h2><b>Su último registro de ritmo cardiaco y nivel de oxigenación es: </b><?php echo $nombre; ?></h2>
			<h2><b>La fecha es: </b><?php echo $email; ?></h2>
			
        	
        </div> 
	    <?php
	    }
	}
}
?>