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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>
<h1>Jugadores</h1>
<?php

    if(!empty($_GET['verjugadores'])){
        $equipoJugador = $_GET['verjugadores'];
        $JugadorEquipo  = $conexion->query("SELECT * FROM `jugador` WHERE `equipo` = $equipoJugador");
        echo "<table>
        <th>Id Jugador</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Posicion</th> 
        <th>id_capitan</th>
        <th>Fecha alta</th>
        <th>Salario</th>
        <th>Altura</th>
        ";


          foreach ($JugadorEquipo as $jugador) {
            echo "<tr>";
            echo "<td>".$jugador['id_jugador']."</td>";
            echo "<td>".$jugador['nombre']."</td>";
            echo "<td>".$jugador['apellido']." </td>";

            if ($jugador['posicion'] == "Base") {
                echo "<td><b>".$jugador['posicion']."</b></td>";
            }else{
            echo "<td>".$jugador['posicion']."</td>";
            }
            echo "<td>".$jugador['id_capitan']."</td>";
            echo "<td>".$jugador['fecha_alta']."</td>";
            echo "<td>".$jugador['salario']."</td>";
            echo "<td>".$jugador['altura']."</td>";
            echo "</tr>";
          }
          echo "</table>";




    }else{
        echo "<h2>Tienes que seleccionar un equipo existente.</h2>";
    }



?>





</body>
</html>