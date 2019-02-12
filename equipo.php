<?php
$conexion = new mysqli("localhost", "root", "", "liga");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
<h1>Equipo</h1>  

<?php 

if(!empty($_GET['equipo'])){

    $idEquipo = $_GET['equipo'];
    $equipoQ  = $conexion->query("SELECT * FROM `equipo` WHERE `id_equipo` = $idEquipo");
            echo "<table>
        <th>id_equipo</th>
        <th>nombre</th>
        <th>ciudad</th> 
        <th>web</th>
        <th>Puntos</th>
        ";


          foreach ($equipoQ as $equipo) {
            echo "<tr>";
            echo "<td>"."<a href=jugadores.php?verjugadores=".$equipo['id_equipo'].">".$equipo['id_equipo']."</a></td>";
            echo "<td>".$equipo['nombre']." </td>";
            echo "<td>".$equipo['ciudad']."</td>";
            echo "<td>".$equipo['web']."</td>";
            echo "<td>".$equipo['puntos']."</td>";
            echo "</tr>";
          }
          echo "</table>";
         



}else{
    echo "<h2>Tienes que seleccionar un equipo existente.</h2>";
}
?>

</body>
</html>