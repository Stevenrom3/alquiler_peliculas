<?php
require "conexion.php";

$busqueda = $_GET['buscar'] ?? "";

if ($busqueda != "") {
    $query = "SELECT * FROM peliculas 
              WHERE titulo LIKE '%$busqueda%' 
              OR genero LIKE '%$busqueda%' 
              OR anio LIKE '%$busqueda%'";
} else {
    $query = "SELECT * FROM peliculas";
}

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Punto 24 - Películas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include "header.php"; ?>

<form class="buscador" method="GET">
    <input 
        type="text" 
        name="buscar" 
        placeholder="Buscar películas..."
        value="<?= $busqueda ?>"
    >
    <button class="btn">Buscar</button>
</form>

<h1>Películas registradas</h1>

<a class="btn" href="crear.php">Añadir película</a>

<?php while($row = mysqli_fetch_assoc($result)): ?>
<div class="card" style="background: <?= $row['color'] ?>;">
    <h3><?= $row['titulo'] ?></h3>
    <p><strong>Género:</strong> <?= $row['genero'] ?></p>
    <p><strong>Año:</strong> <?= $row['anio'] ?></p>

    <a class="btn-edit" href="editar.php?id=<?= $row['id_pelicula'] ?>">Editar</a>
    <a class="btn-del" href="eliminar.php?id=<?= $row['id_pelicula'] ?>">Eliminar</a>
</div>
<?php endwhile; ?>

<?php if (mysqli_num_rows($result) == 0): ?>
<p style="color:#ffb703">No hay resultados para la búsqueda.</p>
<?php endif; ?>

<script src="js/main.js"></script>

</body>
</html>
