<?php

$conexion = new mysqli("localhost", "root", "", "liga");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
<h1>Partidos</h1>
<?php
echo "<table>
<th>id_partido</th>
<th>local</th>
<th>visitante</th>
<th>resultado</th>
";

$resultado = $conexion->query("SELECT * FROM partido");
          foreach ($resultado as $partido) {
            echo "<tr>";
            echo "<td>".$partido['id_partido']."</td>";
            echo "<td>"."<a href=equipo.php?equipo=".$partido['local'].">".$partido['local']."</a> </td>";
            echo "<td>"."<a href=equipo.php?equipo=".$partido['visitante'].">".$partido['visitante']."</a></td>";
            echo "<td>".$partido['resultado']."</td>";
            echo "</tr>";
          }
          echo "</table>";
          ?>

</body>
</html>