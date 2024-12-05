<?php
require_once '../Model/Model.php';
if (isset($_POST['pais_id'])) {
    $pais_id = $_POST['pais_id'];

    $result = buscarPrecioPorPersona($pais_id);

    if ($result) {
        // Devolver el precio como un objeto JSON
        echo json_encode(['precio' => $result['precio_por_persona']]);
    } else {
        // Si no hay resultado, devolver un error en JSON
        echo json_encode(['error' => 'No se encontró el precio']);
    }

}
?>