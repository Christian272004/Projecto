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

    function insertarBD($fecha,$continente,$pais,$precio, $precioTotal, $nombre, $telef, $numPersonas){
        global $conn;
        $query = "INSERT INTO informacio_viatge (Data, continent, pais, preu_persona, preu_viatge, Nom, Telefon, Persones) VALUES (:Data, :continent, :pais,:preu_persona, :preu_viatge, :Nom, :Telefon, :Persones)";
        $statement = $conn->prepare($query);
        $statement->execute([':Data' => $fecha, ':continent' => $continente, ':pais' => $pais,':preu_persona' => $precio ,':preu_viatge' => $precioTotal, ':Nom' => $nombre, ':Telefon' => $telef, ':Persones' => $numPersonas]);
        
        if ($statement->rowCount() > 0) {
            $mensaje = "Viatge guardat";
        } else {
            $mensaje = "No s'ha pogut guardar el viatge";
        }

        return $mensaje;
    }

    function viatges($ordenar,$search) {
        global $conn;
        $query = "SELECT * FROM informacio_viatge";
        if (!empty($search)) {
            $query .= " WHERE pais LIKE :query"; // Filtrar por país
        }
        
        if ($ordenar == 'fecha') {
            $query .= " ORDER BY Data"; // Ordenar por fecha
        } elseif ($ordenar == 'pais') {
            $query .= " ORDER BY pais"; // Ordenar por país
        }
        $statement = $conn->prepare($query);
        if (!empty($search)) {
            $statement->bindValue(':query', '%' . $search . '%'); // Usar LIKE para búsqueda
        }
        $statement->execute();
        $resultado = $statement->fetchAll();
        $viatges = [];
        foreach ($resultado as $row) {
            $viatges[] = [
                'data' => $row['Data'],
                'continent' => $row['continent'],
                'pais' => $row['pais'],
                'preu_persona' => $row['preu_persona'],
                'preu_viatge' => $row['preu_viatge'],
                'nom' => $row['Nom'],
                'telef' => $row['Telefon'],
                'persones' => $row['Persones'],
                'descompte' => $row['Descompte'],
                'Id' => $row['Id']
            ];
        }
        return $viatges;
    }

    function obtenerNombrePaisPorId($pais_id) {
        global $conn; 
        $query = "SELECT nombre_pais FROM paises WHERE id_pais = :pais_id";
        $statement = $conn->prepare($query);
        $statement->execute([':pais_id'=> $pais_id]);
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);
    
        // Comprobamos si se encontró el país
        if ($resultado) {
            return $resultado['nombre_pais']; // Retornamos el nombre del país
        } else {
            return null; // Retornamos null si no se encontró el país
        }
    }

    function obtenerRutaImagenPorId($nombre_pais) {
        global $conn;
        $query = "SELECT foto FROM paises WHERE nombre_pais = :nombre_pais";
        $statement = $conn->prepare($query);
        $statement->execute([':nombre_pais' => $nombre_pais]);
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);
    
        // Comprobamos si se encontró la imagen
        if ($resultado) {
            return $resultado['foto']; // Retornamos la ruta de la imagen
        } else {
            return null; // Retornamos null si no se encontró la imagen
        }
    }

    function eliminarViatgeBD($id) {
        global $conn;
        $query = "DELETE FROM informacio_viatge WHERE Id = :id";
        $statement = $conn->prepare($query);
    
        // Ejecutamos la consulta
        if ($statement->execute([':id'=> $id])) {
            echo "El viaje ha sido eliminado correctamente.";
        } else {
            echo "Error al eliminar el viaje.";
        }
    }

?>