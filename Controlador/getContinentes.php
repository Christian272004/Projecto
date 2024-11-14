<?php 
    require_once 'Model/Model.php';
    function mostrarContinente(){
        $result = '';
        $result = continente();
        $options = "";
        foreach ($result as $row) {
            $options .= '<option value="' . $row['id_continente'] . '">' . $row["nombre_continente"] . '</option>';
        }
        return $options;
    }

?>