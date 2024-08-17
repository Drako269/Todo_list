<?php
$conexion = mysqli_connect("localhost", "root", "", "to_do_list");

if (!$conexion) {
  die("Error de conexión: " . mysqli_connect_error());
}

$consulta = "SELECT * FROM ejemplo";
$resultado = mysqli_query($conexion, $consulta);

if (!$resultado) {
  die("Error en la consulta: " . mysqli_error($conexion));
}

echo "<table border='1'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nombre</th>";
echo "<th>Edad</th>";
echo "<th>Ciudad</th>";
echo "</tr>";

while ($fila = mysqli_fetch_assoc($resultado)) {
  echo "<tr>";
  echo "<td>" . $fila["id"] . "</td>";
  echo "<td>" . $fila["nombre"] . "</td>";
  echo "<td>" . $fila["edad"] . "</td>";
  echo "<td>" . $fila["ciudad"] . "</td>";
  echo "</tr>";
}

echo "</table>";

mysqli_close($conexion);

echo "<table border='1'>";
echo "<tr>";
echo "<th>ID <button onclick='ordenarPorID()'>↑</button> <button onclick='ordenarPorIDDesc()'>↓</button></th>";
echo "<th>Nombre <button onclick='ordenarPorNombre()'>↑</button> <button onclick='ordenarPorNombreDesc()'>↓</button></th>";
echo "<th>Edad <button onclick='ordenarPorEdad()'>↑</button> <button onclick='ordenarPorEdadDesc()'>↓</button></th>";
echo "<th>Ciudad <button onclick='ordenarPorCiudad()'>↑</button> <button onclick='ordenarPorCiudadDesc()'>↓</button></th>";
echo "</tr>";
?>
<script>
function ordenarPorID() {
  var table = document.getElementById("tabla");
  var rows = table.rows;
  var switching = true;

  while (switching) {
    switching = false;
    for (var i = 1; i < rows.length - 1; i++) {
      var row1 = rows[i];
      var row2 = rows[i + 1];
      var id1 = parseInt(row1.cells[0].textContent);
      var id2 = parseInt(row2.cells[0].textContent);

      if (id1 > id2) {
        rows[i].parentNode.insertBefore(row2, row1);
        switching = true;
      }
    }
  }
}

function ordenarPorIDDesc() {
  var table = document.getElementById("tabla");
  var rows = table.rows;
  var switching = true;

  while (switching) {
    switching = false;
    for (var i = 1; i < rows.length - 1; i++) {
      var row1 = rows[i];
      var row2 = rows[i + 1];
      var id1 = parseInt(row1.cells[0].textContent);
      var id2 = parseInt(row2.cells[0].textContent);

      if (id1 < id2) {
        rows[i].parentNode.insertBefore(row2, row1);
        switching = true;
      }
    }
  }
}

function ordenarPorNombre() {
  var table = document.getElementById("tabla");
  var rows = table.rows;
  var switching = true;

  while (switching) {
    switching = false;
    for (var i = 1; i < rows.length - 1; i++) {
      var row1 = rows[i];
      var row2 = rows[i + 1];
      var nombre1 = row1.cells[1].textContent.toLowerCase();
      var nombre2 = row2.cells[1].textContent.toLowerCase();

      if (nombre1 > nombre2) {
      }
    }
}
}
</script>;
