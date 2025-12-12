<?php
require "conexion.php";
$id = $_GET["id"];

$result = mysqli_query($conn, "SELECT * FROM peliculas WHERE id_pelicula=$id");
$data = mysqli_fetch_assoc($result);

if ($_POST) {
    $titulo = $_POST["titulo"];
    $genero = $_POST["genero"];
    $anio   = $_POST["anio"];
    $color  = $_POST["color"];

    mysqli_query($conn, "
        UPDATE peliculas SET 
            titulo='$titulo',
            genero='$genero',
            anio='$anio',
            color='$color'
        WHERE id_pelicula=$id
    ");

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include "header.php"; ?>

<h1>Editar Película</h1>

<form method="POST">
    <input name="titulo" value="<?= $data['titulo'] ?>" required>
    <input name="genero" value="<?= $data['genero'] ?>" required>
    <input type="number" name="anio" value="<?= $data['anio'] ?>" required>

    <label>Color de tarjeta:</label>
    <input type="color" name="color" value="<?= $data['color'] ?>">

    <button class="btn">Actualizar</button>
</form>

<script src="js/main.js"></script>

</body>
</html>
