<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/stilo.css">
    <link rel="stylesheet" href="css/alertify.default.css">
    <link rel="stylesheet" href="css/alertify.core.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/alertify.js"></script>
    <script src="js/funcioness.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="https://kit.fontawesome.com/8de3a2e9a4.js" crossorigin="anonymous"></script>
    <script src="js/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>
<body>
    <hr>
    <div class="containerasd">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid" style="color: white;">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupported"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#", id="menuInicio"><i class="fa-solid fa-house-user"></i>Inicio</a>
                    </li>
                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-brands fa-ubuntu">
                        Administrar
                       </i>  
                       </a>
                       <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" id="menuAlumno">Alumno</a></li>
                        <li><a class="dropdown-item" onclick="location.href='../PROYECTO'">Salir</a></li>
                        
                    </ul>
                       
                   </li>
                   
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn-outline-succes" type="submit">Search</button>
                </form>
            </div>
        </div>
        </nav>
    </div>
    <!--Div de cuerpo-->
    <hr><br>
    
    <!--Termina div de cuerpo-->
    
         <!--Termina Pag de principal-->
    </div>
    <!--Inicia div de Formulario-->
    <div id="divFormulario" ">
    <div class="alert alert-dark">
    <h1>Bienvenido Paciente
                
            </h1>
            </div>
            <div class="alert alert-primary">
    <p><?php 
            include("mostrardato.php");
            ?></p></div>
       
            <div class="alert alert-danger">
        <h1>Datos del paciente:</h1>
        </div>
            <br>
            
            
            
            <?php
            
//mostrar los datos almacenados en la tabla 
header("Content-Type: text/html;charset=utf-8");
	include "php/conexion.php";
	$consultaSQL="Select *from paciente ORDER by id DESC LIMIT 1";
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
	<th>Edad</th><th>O</th><th>R</th></thead>";
	while ($fila=$ejecutarConsulta->fetch_array()) {
        //mostrar cada fila del array
		echo "<tr>";
		echo "<td>".$fila[1]."</td><td>".$fila[2]."</td>
		<td>".$fila[3]."</td><td>".$fila[4]."</td><td>".$fila[5]."</td><td>
		
		</td>";
		echo "</tr>";
	}
	echo "</table>";


?>
</br>
<div class='col-12' style='text-align: center; '>
		<button type='button' class='btn btn-info' id='btnImprimir'>
			<i class='fas fa-file-pdf'></i> Imprimir reporte
		</button>
	</div>
	<script type="text/javascript">
		$("#btnImprimir").click(function(event){
			window.open("php/imprime_alumnos.php","","fullscreen");
		});
	</script>

                <div class="row" style="text-align: center;">
                    
                </div>
            </div>
            <div class="col-9" id="mostrar">
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8" id="mostrarGrafica"></div>


        </div>
        

        <!DOCTYPE html>
<html lang="es">
    
<!DOCTYPE html>
<html lang="es">
<?php 
  $conn = new mysqli('localhost','root','','adri');
  $query = $conn->query("
  Select *from paciente ORDER by id DESC LIMIT 1
  ");

  foreach($query as $data)
  {
    $month[] = $data['Nombre'];
    $amount[] = $data['O'];
  }

?>


<div style="width: 500px;">
  <canvas id="myChart"></canvas>
</div>
 
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Oxigenación de pacientes',
      data: <?php echo json_encode($amount) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
<?php 
  $conn = new mysqli('localhost','root','','adri');
  $query = $conn->query("
  Select *from paciente ORDER by id DESC LIMIT 1
  ");

  foreach($query as $data)
  {
    $month[] = $data['Nombre'];
    $amount[] = $data['R'];
  }

?>


<div style="width: 500px;">
  <canvas id="myChart"></canvas>
</div>
 
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Ritmo cardíaco',
      data: <?php echo json_encode($amount) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
</body>
</html>




    </div>
    
</body>

</html>