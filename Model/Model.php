<?php
    require_once __DIR__ . '/../conexion.php';

    function continente(){
        global $conn;
        $sql = "SELECT * FROM continentes";
        $result = $conn->prepare($sql);
        $result->execute();
        return $result;
        
    }

    function obtenerPrecio($pais){
        global $conn;
        $sql = "SELECT precio_por_persona FROM paises WHERE nombre_pais = :nombre";
        $result = $conn->prepare($sql);
        $result->execute([':nombre' => $pais]);
        return $result;
    }
    function paises($continente_id) {
        global $conn;
        $sql = "SELECT id_pais, nombre_pais, foto FROM paises WHERE id_continente = :continente_id";
        $query = $conn->prepare($sql);
        $query->bindParam(':continente_id', $continente_id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
?>