<?php
include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="cat">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estils/estilos.css">
    <script src="Vista/javaScript/metodos.js"></script>
    <title>Projecte</title>
</head>
<body>
        <div class="container">
            <!-- Formulario principal -->
            <form class="form" action="index.php?pagina=Formulario" method="POST">
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
                        <select class="select" id="continente" name="continente" onchange="cargarPaises()" >
                            <option value="">Selecciona un continente</option>
                            <?php echo mostrarContinente(isset($continente) ? $continente : null); ?>
                        </select>
                    </label>
                       
                    <label>
                        <span>Pais</span>
                        
                        <select class="select" id="pais" name="pais" onchange="Precio(); mostrarFoto();">
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
                    <input min="1" class="input" id="personas" name="personas" type="number" value="<?php echo isset($numPersones) ? $numPersones : ''; ?>">
                </label>
                <label>
                    <input type="checkbox" class="input">
                    <span class="custom-checkbox">Descompte del 20%</span>
                </label>
                <div id="imagenPais">
                    <img id="fotoPais" src="" alt="Imagen del país seleccionado" style="display:none; max-width: 300px;">
                </div>
                <?php echo isset($mostrar) ? $mostrar : '' ?>
                <div class="flex">
                    <button class="submit" name="boton" id="boton" value="Afegir">Afegir</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>