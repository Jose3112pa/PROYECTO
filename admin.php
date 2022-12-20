<?php 
    include_once 'conexion.php';
    if(isset($_GET['registrado'])){
        $mensage="<h3 id='alerta'>¡¡¡ Paciente !!!</h3>";
    }else{
        $mensage='';
    }
?>
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
    <script src="js/bootstrap.js"></script>
    <script src="js/alertify.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/funciones.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/eb443385a1.js" crossorigin="anonymous"></script>
    

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
                       <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-download">
                        Administrar tus datos
                       </i>  
                       </a>
                       <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" id="menuPacientes">Pacientes</a></li>
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
        </div>
        </div>
    </nav>
</div>
    <!--Div de cuerpo-->
    <hr><br>
     
    



    <!--Termina div de cuerpo-->
    
    <!--Inicia div de cuerpo-->
 
    
 

    <div id="divFormulario" ">
    <div class="alert alert-dark">
    <h1>Bienvenido Administrador
                
            </h1>
            </div>
    
    
            
           
            <form action="registrar.php" method="POST">
            <div class="alert alert-primary">
            <p><?php 
            include("mostraralumnos.php");
            ?></p>
            </div>
        <div class="ro1" width:1500px>
            <div class="col-md-3">
            <div class="ro1"></div>
            <?php 
        echo $mensage;
        ?>
                id_paciente
                <input type="text" name="txtid" class="form form-control" placeholder="Ingrese id">
                Nombre_paciente
                <input type="text" name="txtNombre" class="form form-control" placeholder="Ingrese nombre">
                Sexo_paciente
                <input type="text" name="txtSexo" class="form form-control" placeholder="Ingrese sexo">
                Edad_paciente
                <input type="text" name="txtEdad" class="form form-control" placeholder="Ingrese edad">
                Oxigenación
                <input type="text" name="txtO" class="form form-control" placeholder="Ingrese Oxigenación">
                Ritmo cardíaco
                <input type="text" name="txtR" class="form form-control" placeholder="Ingrese Ritmo Cardíaco">
                Recomendacion según su oxigenacion
                <select name="oxigenacion1">
            <?php 
                $con=conexion();
                #consulta de todos los paises
                $sql='SELECT * FROM oxigenacion';
                $query=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($query)){
                    $ido=$row['Oxigenacion'];
                    $oxigenacion=$row['oxigenacionn'];
                ?>
                    <option value="<?php echo $ido ?>"><?php echo $oxigenacion ?></option>
                <?php
                }
            
            ?>
            
        </select>
        <br>
        Recomendacion según su ritmo cardíaco</br>
                <select name="ritmo1">
            <?php 
                $con=conexion();
                #consulta de todos los paises
                $sql='SELECT * FROM ritmo';
                $query=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($query)){
                    $idr=$row['Ritmo'];
                    $ritmo=$row['ritmoo'];
                ?>
                    <option value="<?php echo $idr ?>"><?php echo $ritmo ?></option>
                <?php
                }
            
            ?>
            
        </select>
        <br>
           <br>     
        <input type="submit" value="Registrado"></br>
        </br>
        </div>

        <br>
        <div class="alert alert-danger">
        <h1>Tabla de pacientes:</h1>
        </div>
        <?php 
            include("mostrarpacientes.php");
            ?></br>
        </div>
        <div class="col-9" id="mostrar">
        
        
        <div class="row" width=250px heigh="500px">
        
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8" id="mostrarGrafica"></div>


            </div>     
               
            <div class="alert alert-danger">
        <h1>Grafica de pacientes:</h1>
        </div>
            <?php 
  $conn = new mysqli('localhost','root','','adri');
  $query = $conn->query("
  SELECT * FROM `paciente` WHERE 1
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
            include("generar_grafica.php");
            ?>


                </form>
                </div>

</div>

 </div>
 
 </div>
</body>
</html>