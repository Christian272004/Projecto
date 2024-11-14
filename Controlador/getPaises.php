<?php


require_once '../Model/Model.php';

if (isset($_POST['continente_id'])) {
    $continente_id = $_POST['continente_id'];

    $result = paises($continente_id); // Asumiendo que esta función ya está definida y obtiene los países

    if ($result) {
        $paises = [];
        foreach ($result as $row) {
            // Asegúrate de que el campo 'foto' exista en tu base de datos
            $paises[] = [
                'id' => $row['id_pais'],
                'nombre' => $row['nombre_pais'],
                'foto' => $row['foto'] // Incluye la ruta de la imagen en la respuesta
            ];
        }
        header('Content-Type: application/json'); // Asegúrate de que la respuesta sea JSON
        echo json_encode($paises); // Enviar los datos en formato JSON al frontend
    } else {
        // Si no hay países, puedes devolver un array vacío
        echo json_encode([]);
    }
} else {
    echo json_encode(['error' => 'No se recibió continente_id.']);
}



