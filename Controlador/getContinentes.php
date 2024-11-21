<?php 
    require_once 'Model/Model.php';
    function mostrarContinente($continenteSeleccionado = null) {
        $result = continente(); // Suponiendo que esta función devuelve un array de continentes
        $options = "";
    
        foreach ($result as $row) {
            // Compara el id del continente con el seleccionado
            $selected = ($continenteSeleccionado !== null && $continenteSeleccionado == $row['id_continente']) ? 'selected' : '';
            $options .= '<option value="' . $row['id_continente'] . '" ' . $selected . '>' . $row["nombre_continente"] . '</option>';
        }
    
        return $options;
    }

?>