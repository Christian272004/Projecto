<?php

require_once 'Model/Model.php';

function insertar($data,$contin,$country,$price,$name,$tel,$numPers) {
    $fecha = isset($data)? trim(htmlspecialchars($data)) : '';
    $continente = isset($contin)? trim(htmlspecialchars($contin)) : 0;
    $pais = isset($country)? trim(htmlspecialchars($country)) : 0;
    $preu = isset($price)? (float)trim(htmlspecialchars($price)) : 0;
    $nom = isset($name)? trim(htmlspecialchars($name)) : '';
    $telef = isset($tel)? trim(htmlspecialchars($tel)) : 0;
    $numPersones = isset($numPers)? (int)trim(htmlspecialchars($numPers)) : 0;
    $descuentoAplicado = isset($_POST['descuento']) && $_POST['descuento'] == '1';
    $mensajes = array();
    $mostrar = '';

    // Verificaciones de los datos.
    $campos = [
        'fecha' => 'El camp de la data no pot estar vuit.',
        'continente' => 'El camp del continent no pot estar vuit.',
        'pais' => 'El camp del pais no pot estar vuit.',
        'preu' => 'El camp del preu no pot estar vuit.',
        'nom' => 'El camp del nom no pot estar vuit.',
        'telef' => 'El camp del telef no pot estar vuit.',
        'numPersones' => 'El camp de Persones no pot estar vuit.'
    ];

    foreach ($campos as $campo => $mensaje) {
        if (empty($$campo)) {
            $mensajes[] = $mensaje;
        }
    }

    // Verificar y convertir a numérico
    if (!is_numeric($preu)) {
        $preu = 0; // O manejar el error de otra manera
    } else {
        $preu = (float)$preu; // Convertir a float
    }

    if (!is_numeric($numPersones)) {
        $numPersones = 0; // O manejar el error de otra manera
    } else {
        $numPersones = (int)$numPersones; // Convertir a int
    }

    if (empty($mensajes)) {
        $fechaVerificada = verificarFecha($fecha);
        $telefVerificado = validarTelefono($telef);
        if ($fechaVerificada || $telefVerificado) {

            $precioTotal = $preu * $numPersones;
            if ($descuentoAplicado) {
                $precioTotal *= 0.8; // Descuento del 20%
            }
            $precioTotalFormateado = number_format($precioTotal, 2);


            $resultado = insertarBD($fecha, $continente, $pais, $preu, ($precioTotalFormateado), $nom, $telef,$numPersones);
            $mostrar .= '<div id="caja_mensaje" class="enviar">' . $resultado . '</div>';
        } else {
            $mensajes[] = "La fecha no es valida";
        }
        
    }

    // Generar mensajes de error
    if (!empty($mensajes)) {
        $mostrar .= '<div class="errors">';
        foreach ($mensajes as $mensaje) {
            $mostrar .= $mensaje . '<br/>';
        }
        $mostrar .= '</div>';
    } 
    
    include 'Vista/insertar.php';
}


function verificarFecha($fecha) {
    // Convertir la fecha proporcionada a un objeto DateTime
    $fechaProporcionada = new DateTime($fecha);
    // Obtener la fecha actual
    $fechaActual = new DateTime();

    // Comparar las fechas
    if ($fechaProporcionada >= $fechaActual) {
        return true; // La fecha no es pasada
    } else {
        return false; // La fecha es pasada
    }
}

function validarTelefono($telefono) {
    // Eliminar espacios en blanco
    $telefono = trim($telefono);

    // Verificar si solo contiene dígitos y tiene una longitud entre 7 y 15
    if (preg_match('/^\d{7,15}$/', $telefono)) {
        return true; // El formato es válido
    } else {
        return false; // El formato no es válido
    }
}

?>
