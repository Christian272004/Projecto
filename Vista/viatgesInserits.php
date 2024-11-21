<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="cat">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estils/estilos.css">
    <title>Document</title>
</head>
<body>
<div class="contenedor-central">
        <h1>**EXEMPLE DE VIATGES INSERITS**</h1><br>
        
        <!-- Barra de búsqueda -->
        <form class="search-form" action="buscar.php" method="get">
            <input type="text" name="query" class="search-input" placeholder="Buscar viatges...">
            <button type="submit" class="search-button">Buscar</button>
        </form>
        
        <form class="contenedor-imagenes" method="POST" action="index.php?pagina=Eliminar">
            <?= mostrarViajes() ?>
        </form>
    </div>
</body>
</html>