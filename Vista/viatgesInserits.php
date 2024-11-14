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
        
        <div class="contenedor-imagenes">
        <img src="Vista/imagenes/fotosEjemplos/img1.jpg" alt="Imagen 1" class="imagen"> 
            <img src="Vista/imagenes/fotosEjemplos/img2.jpg" alt="Imagen 2" class="imagen">
            <img src="Vista/imagenes/fotosEjemplos/img3.jpg" alt="Imagen 3" class="imagen">
            <img src="Vista/imagenes/fotosEjemplos/img4.jpg" alt="Imagen 4" class="imagen">
            <img src="Vista/imagenes/fotosEjemplos/img5.jpg" alt="Imagen 5" class="imagen">
            <img src="Vista/imagenes/fotosEjemplos/img6.jpg" alt="Imagen 6" class="imagen">
        </div>
    </div>
</body>
</html>