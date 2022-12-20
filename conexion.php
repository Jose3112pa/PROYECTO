<?php 
    function conexion(){
        $conexion=mysqli_connect('localhost','root','','adri','3306');
        return $conexion;
    }

?>