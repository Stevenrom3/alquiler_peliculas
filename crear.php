<?php
require "conexion.php";

if ($_POST) {
    $titulo = $_POST["titulo"];
    $genero = $_POST["genero"];
    $anio   = $_POST["anio"];
    $color  = $_POST["color"];

    mysqli_query($conn, "
        INSERT INTO peliculas (titulo,genero,anio,color)
        VALUES ('$titulo','$genero','$anio','$color')
    ");

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Crear</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include "header.php"; ?>

<h1>Añadir Película</h1>

<form method="POST">
    <input name="titulo" placeholder="Título" required>
    <input name="genero" placeholder="Género" required>
    <input type="number" name="anio" placeholder="Año" required>

    <label>Color de tarjeta:</label>
    <input type="color" name="color" value="#0077b6">

    <button class="btn">Guardar</button>
</form>

<script src="js/main.js"></script>

</body>
</html>
