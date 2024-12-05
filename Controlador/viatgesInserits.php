<?php

require_once 'Model/Model.php';


function mostrarViajes()
{
    // Comenzamos un contenedor para los viajes
    $htmlViatges = '<div class="contenedor-viajes">';
    $ordenar = isset($_GET['ordenar']) ? $_GET['ordenar'] : 'fecha';
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $viajes = viatges($ordenar, $search);

    foreach ($viajes as $viaje) {
        // Extraemos los datos del viaje
        $fecha = htmlspecialchars($viaje['data']);
        $pais = htmlspecialchars($viaje['pais']);
        $nombrePais = obtenerNombrePaisPorId($pais);
        $precio = htmlspecialchars($viaje['preu_viatge']);
        $nombre = htmlspecialchars($viaje['nom']);
        $telefono = htmlspecialchars($viaje['telef']);
        $numPersonas = htmlspecialchars($viaje['persones']);

        $Id = htmlspecialchars($viaje['Id']);
        $rutaImagen = obtenerRutaImagenPorId($pais);

        // Mostramos los datos del viaje
        $htmlViatges .= '<div class="carta-viaje">';

       // Formulario para eliminar el viaje
       $htmlViatges .= '<form action="index.php" method="POST" style="display: inline;" class="form-eliminar">';
       $htmlViatges .= '<input type="hidden" name="pagina" value="Eliminar">';
       $htmlViatges .= '<input type="hidden" name="id_viatge" value="' . $Id . '">';
       $htmlViatges .= '<button type="button" class="boton-eliminar" data-id="' . $Id . '">';
       $htmlViatges .= '<img src="./Vista/imagenes/assets/trash.svg" alt="Eliminar" class="icono-eliminar">';
       $htmlViatges .= '</button>';
       $htmlViatges .= '</form>';

        $htmlViatges .= '<h2>Dades del viatge</h2>';
        $htmlViatges .= '<p><strong>Data:</strong> ' . $fecha . '</p>';
        if ($nombrePais) {
            $htmlViatges .= '<p><strong>País:</strong> ' . $nombrePais . '</p>';
        } else {
            $htmlViatges .= '<p><strong>País:</strong> ' . $pais . '</p>';
        }
        $htmlViatges .= '<p><strong>Preu del viatge:</strong> ' . $precio . '€</p>';
        $htmlViatges .= '<p><strong>Nom:</strong> ' . $nombre . '</p>';
        $htmlViatges .= '<p><strong>Telèfon:</strong> ' . $telefono . '</p>';
        $htmlViatges .= '<p><strong>Nombre de Persones:</strong> ' . $numPersonas . '</p>';

        // Mostramos la foto del viaje
        if ($rutaImagen) {
            $htmlViatges .= '<img src="' . $rutaImagen . '" alt="Foto del viaje a ' . $nombrePais . '" class="foto-viaje">';
        } else {
            //echo "No se encontró una imagen para el país con ese ID.";
        }

        $htmlViatges .= '</div>'; 
    }

    $htmlViatges .= '</div>'; 

    return $htmlViatges;
}
