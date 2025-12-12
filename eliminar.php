<?php
require "conexion.php";

$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM peliculas WHERE id_pelicula=$id");

header("Location: index.php");
exit;
