<?php

require_once 'Model/Model.php';

function eliminarViatge($id){
    
    eliminarViatgeBD($id);
    header("Location: index.php?pagina=ViatgesGuardats");
}


?>