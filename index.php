<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $opcion = isset($_GET['pagina']) ? $_GET['pagina'] : 'Vista';
    switch ($opcion){
        case 'Vista':
            require_once 'Controlador/getContinentes.php';
            include 'Vista/vista.php';
            break;
        case 'NouViatge':
            require_once 'Controlador/getContinentes.php';
            include 'Vista/insertar.php';
            break;
        case 'ViatgesGuardats':
            require_once 'Controlador/getContinentes.php';
            include 'Vista/viatgesInserits.php';
            break;
        default:
            require_once 'Controlador/getContinentes.php';
            include 'Vista/vista.php';
            break;
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $opcion = isset($_GET['pagina']) ? $_GET['pagina'] : 'Mostrar';
    switch ($opcion) {
        case 'Formulario':
            if ($_POST['boton'] === 'Afegir') {
                // Acción cuando se presiona el botón "Sí"
                include 'Afegir.php';
            } elseif ($_POST['boton'] === 'Reservar') {
                // Acción cuando se presiona el botón "No"
                include 'Reservar.php';
            }
            break;
        default:
            include 'Html/Mostrar.php';
    }
}
?>