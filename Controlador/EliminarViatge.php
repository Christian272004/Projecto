<?php

require_once 'Model/Model.php';

function eliminarViatge($id){
    var_dump($id);
    eliminarViatgeBD($id);
    header("Location: index.php?pagina=ViatgesGuardats");
}


?>