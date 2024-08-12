<!DOCTYPE html>
<html>
<head>
  <title>Ejemplo</title>
  <style>
    #cuadro {
      float: left;
      width: 200px;
      height: 200px;
      background-color: #ccc;
    }
    #formulario {
      float: right;
      width: 300px;
    }
  </style>
</head>
<body>
  <div id="cuadro"></div>
  <div id="formulario">
    <h2>Formulario</h2>
    <form>
      <input type="text" name="nombre" placeholder="Nombre">
      <input type="email" name="correo" placeholder="Correo">
      <input type="submit" value="Enviar">
    </form>
  </div>
  <div style="clear: both;"></div>
</body>
</html>