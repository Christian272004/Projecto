<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="cat">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Vista/Estilos/viatgesInserits.css">
    <script type="module" src="Controlador/Controller.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="contenedor-central">
        <h1>VIATGES INSERITS</h1><br>
        <form method="GET" action="index.php" class="formulario-ordenacion">
            <input type="hidden" name="pagina" value="ViatgesGuardats">
            <label for="ordenar">Ordenar per:</label>
            <select name="ordenar" id="ordenar">
                <option value="fecha">Data</option>
                <option value="pais">País</option>
            </select>
            <button type="submit">Ordenar</button>
        </form>
        <h4>Barra de cerca</h4>
        <form class="search-form" action="" method="GET">
            <input type="hidden" name="pagina" value="ViatgesGuardats">
            <input type="text" name="search" class="search-input" placeholder="Buscar viatges..." value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button type="submit" class="search-button">Buscar</button>
        </form>

       
            <?= mostrarViajes() ?>
            <button class="boton-atras" onclick="window.location.href='index.php?pagina=Formulari'">Atrás</button>
        
        <div id="confirmModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModal">&times;</span>
                <h2>Confirmació</h2>
                <p>Està segur que desitja eliminar aquest viatge?</p>
                <button id="confirmDelete">Eliminar</button>
                <button id="cancelDelete">Cancelar</button>
            </div>
        </div>
    </div>
    
</body>

</html>