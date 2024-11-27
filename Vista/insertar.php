<?php
include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="cat">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projecte</title>
    <link rel="stylesheet" href="Vista/Estilos/insertar.css">
    <link rel="stylesheet" href="Vista/Estilos/viatgesInserits.css">
    <!-- Incluir los archivos JavaScript del Modelo, Vista y Controlador -->

    <script src="Model/Model.js"></script>
    <script src="Vista/View.js"></script>
    <script src="Controlador/Controller.js"></script>
    <script>
        function setPagina(valor) {
            document.getElementById('pagina').value = valor;
        }
    </script>

</head>

<body>
    <div class="container">
        <!-- Formulario principal -->
        <form class="form" action="index.php" method="POST">
            <input type="hidden" name="pagina" id="pagina" value="Formulario">

            <div>
                <label>
                    <span>Data</span>
                    <input class="input" type="date" id="fecha" name="fecha" value="<?php echo isset($fecha) ? $fecha : ''; ?>">
                </label>
            </div>

            <span>Destí</span>
            <div class="flex">
                <!-- Selección de Continente y País dentro del mismo formulario -->
                <label>
                    <label>Continente</label>
                    <select class="select" id="continente" name="continente">
                        <option value="">Selecciona un continente</option>
                        <?php echo mostrarContinente(isset($continente) ? $continente : null); ?>
                    </select>
                </label>

                <label>
                    <span>Pais</span>
                    <select class="select" id="pais" name="pais">
                        <option value="<?php echo isset($pais) ? $pais : ''; ?>">Pais</option>
                    </select>
                </label>
            </div>

            <label>
                <span>Preu</span>
                <input class="input" id="precio" name="precio" readonly value="<?php echo isset($preu) ? $preu : ''; ?>">
            </label>
            <label>
                <span>Nom</span>
                <input class="input" id="nom" name="nom" value="<?php echo isset($nom) ? $nom : ''; ?>">
            </label>
            <label>
                <span>Telèf.</span>
                <input class="input" id="telef" name="telef" value="<?php echo isset($telef) ? $telef : ''; ?>">
            </label>
            <label>
                <span>Persones</span>
                <input min="1" class="input" id="personas" name="personas" type="number" value="<?php echo isset($numPersones) ? $numPersones : '1'; ?>">
            </label>
            <label class="checkbox-label">
                <input type="checkbox" class="input" name="descuento" value="1">
                <span class="checkbox-text">Descompte del 20%</span>
            </label>


            <div id="imagenPais">
                <img id="fotoPais" src="" alt="Imagen del país seleccionado" style="display:none; max-width: 300px;">
            </div>
         
            <div class="flex">
                <div class="flex">
                    <button type="submit" class="submit" name="boton" id="boton_afegir" value="Afegir">Afegir</button>
                    <button type="submit" class="submit" name="boton" id="boton_guardats" value="ViatgesGuardats" onclick="setPagina('ViatgesGuardats')">Viatges guardats</button>
                </div>

            </div>
        </form>
    </div>
   
    <?= require_once __DIR__ . '../../Controlador/viatgesInserits.php' ?>
    <div class="viajesGuardados"> <?= mostrarViajes() ?></div>
    

    <!-- Inicialización del Controlador -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Controller.init();
        });
    </script>
</body>

</html>