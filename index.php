<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $opcion = isset($_POST['pagina']) ? $_POST['pagina'] : 'ViatgesGuardats';

    switch ($opcion) {
        case 'Formulario':
            require_once 'Controlador/Insertar.php';
            require_once 'Controlador/getContinentes.php';
            require_once 'Controlador/viatgesInserits.php';
            insertar($_POST['fecha'], $_POST['continente'], $_POST['pais'], $_POST['precio'], $_POST['nom'], $_POST['telef'], $_POST['personas']);
            break;
        case 'Eliminar':
            require_once 'Controlador/EliminarViatge.php';
           
            eliminarViatge($_POST['id_viatge']);
            break;
        case 'ViatgesGuardats':
            // Redirigir a la página de viajes guardados
            header('Location: index.php?pagina=ViatgesGuardats');
            exit();
            break;
        default:
            require_once 'Controlador/getContinentes.php';
            include 'Vista/insertar.php';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $opcion = isset($_GET['pagina']) ? $_GET['pagina'] : 'NouViatge';

     switch ($opcion) {
        case 'NouViatge':
            require_once 'Controlador/viatgesInserits.php';
            require_once 'Controlador/getContinentes.php';
            include 'Vista/insertar.php';
            break;
        case 'ViatgesGuardats':
            require_once 'Controlador/viatgesInserits.php';
            include 'Vista/viatgesInserits.php';
            break;
        default:
            require_once 'Controlador/getContinentes.php';
            include 'Vista/insertar.php';
    }
}

