<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "to_do_list";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificamos la conexión
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}

// Crea la tabla si no existe
$query = "CREATE TABLE IF NOT EXISTS tareas (
    id INT AUTO_INCREMENT,
    nombre VARCHAR(255),
    fecha_inicio DATE,
    fecha_tarea DATE,
    descripcion TEXT,
    PRIMARY KEY (id)
  )";

$conn->query($query);

// Procesa el formulario
if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $fecha_inicio = date("Y-m-d");
    $fecha_tarea = $_POST['fecha_tarea'];
    $descripcion = $_POST['descripcion'];

    // Verificamos si los datos están vacíos
    if (!empty($nombre) && !empty($fecha_inicio) && !empty($fecha_tarea) && !empty($descripcion)) {
        // Insertamos los datos en la tabla
        $query = "INSERT INTO tareas (nombre, fecha_inicio, fecha_tarea, descripcion)
                  VALUES ('$nombre', '$fecha_inicio', '$fecha_tarea', '$descripcion')";
        $conn->query($query);
        echo "<script>alert('Datos guardados con éxito!');</script>";
    } else {
        echo "<script>alert('Por favor, complete todos los campos.');</script>";
    }
}

// Consultamos la base de datos para mostrar los datos
$query = "SELECT * FROM tareas";
$result = $conn->query($query);

// Mostramos los datos en una tabla HTML


// Cerramos la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do List</title>
    <style>
    #formulario {
      float: right;
    }
    #cuadro {
      float: left;
    }
  </style>
</head>
<body>
    <!-- Formulario para ingresar datos -->
<div id="formulario">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>
        <label for="fecha_tarea">Fecha Limite:</label>
        <input type="date" id="fecha_tarea" name="fecha_tarea"><br><br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"></textarea><br><br>
        <input type="submit" name="guardar" value="Guardar">
    </form>
</div>
<div id="cuadro">
<?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<th>Nombre</th><th>Fecha de Creacion</th><th>Fecha Limite</th><th>Descripción</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["fecha_inicio"] . "</td>";
            echo "<td>" . $row["fecha_tarea"] . "</td>";
            echo "<td>" . $row["descripcion"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No hay datos para mostrar.";
    }
?>
</div>
</body>
</html>