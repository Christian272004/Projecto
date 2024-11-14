<?php
if (isset($_POST['pais_id'])) {
    $pais_id = $_POST['pais_id'];

    // Conectar a la base de datos
    $conn = new mysqli('localhost', 'root', '', 'projecte');
    
    // Comprobar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "SELECT precio_por_persona FROM paises WHERE id_pais = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $pais_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Devolver el precio como un objeto JSON
        echo json_encode(['precio' => $row['precio_por_persona']]);
    } else {
        // Si no hay resultado, devolver un error en JSON
        echo json_encode(['error' => 'No se encontró el precio']);
    }

    $stmt->close();
    $conn->close();
}
?>