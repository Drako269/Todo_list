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
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_tarea = $_POST['fecha_tarea'];
    $descripcion = $_POST['descripcion'];

    // Verificamos si los datos están vacíos
    if (!empty($nombre) && !empty($fecha_inicio) && !empty($fecha_tarea) && !empty($descripcion)) {
        // Insertamos los datos en la tabla
        $query = "INSERT INTO tareas (nombre, fecha_inicio, fecha_tarea, descripcion)
                  VALUES ('$nombre', '$fecha_inicio', '$fecha_tarea', '$descripcion')";
        $conn->query($query);
        echo "Datos guardados con éxito!";
    } else {
        echo "Por favor, complete todos los campos.";
    }
}

// Cerramos la conexión
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do List</title>
</head>
<body>
    <!-- Formulario para ingresar datos -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre"><br><br>
  <label for="fecha_inicio">Fecha Inicial:</label>
  <input type="date" id="fecha_inicio" name="fecha_inicio"><br><br>
  <label for="fecha_tarea">Fecha Final:</label>
  <input type="date" id="fecha_tarea" name="fecha_tarea"><br><br>
  <label for="descripcion">Descripción:</label>
  <textarea id="descripcion" name="descripcion"></textarea><br><br>
  <input type="submit" name="guardar" value="Guardar">
</form>
</body>
</html>