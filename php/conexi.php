<?php 
    function conexion(){
        $link=mysqli_connect('localhost','root','','adri','3306');
        return $link;
    }

?>