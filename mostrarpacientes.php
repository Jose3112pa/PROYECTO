<?php
//mostrar los datos almacenados en la tabla 

	include "php/conexion.php";
	$consultaSQL="Select *from paciente";
	//ejecutamos la consulta
	$ejecutarConsulta=$conexion->query($consultaSQL);
	//recorre los elementos de la consulta dentro de un 
	//array y almacenarlos en una variable cada fila
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tabla").DataTable();
		});
	</script>
	<?php
	echo "<table id='tabla'><thead><th>Nombre</th><th>Sexo</th>
	<th>Edad</th><th>O</th><th>R</th><th>Eliminar</th><th>Editar</th></thead>";
	while ($fila=$ejecutarConsulta->fetch_array()) {
        //mostrar cada fila del array
		echo "<tr>";
		echo "<td>".$fila[1]."</td><td>".$fila[2]."</td>
		<td>".$fila[3]."</td><td>".$fila[4]."</td><td>".$fila[5]."</td><td>
		<p class='btn btn-warning' onclick='eliminar(".$fila[0].")'>
        <i class='fas fa-trash-alt'></i> Eliminar</p></td><td>
		<p class='btn btn-primary' onclick=editar(".$fila[0].",'".$fila[1]."','".$fila[2]."','"
		.$fila[3]."','".$fila[4]."')><i class='far fa-edit'></i> Editar</p></td>";
		echo "</tr>";
	}
	echo "</table>";


?>
<div class='col-12' style='text-align: center; '>
		<button type='button' class='btn btn-info' id='btnImprimir'>
			<i class='fas fa-file-pdf'></i> Imprimir reporte
		</button>
	</div>
	<script type="text/javascript">
		$("#btnImprimir").click(function(event){
			window.open("php/imprimepacientes.php","","fullscreen");
		});
	</script>
