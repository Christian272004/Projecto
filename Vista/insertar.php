<?php
include_once 'header.php';

require_once 'Controlador/getContinentes.php';
?>

<!DOCTYPE html>
<html lang="cat">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estils/estilos.css">
    <script src="./Vista/javaScript/metodos.js"></script>
    <title>Projecte</title>
    
    
</head>
<body>
        <div class="container">
            <!-- Formulario principal -->
            <form class="form" action="index.php?pagina=Formulario" method="post">
                <div>
                    <label>
                        <span>Data</span>
                        <input class="input" type="date">
                    </label>
                </div>  
                
                <span>Destí</span>
                <div class="flex">
                    <!-- Selección de Continente y País dentro del mismo formulario -->
                    <label>
                    <label>Continente</label>
                        <select class="select" id="continente" onchange="cargarPaises()">
                            <option value="">Selecciona un continente</option>
                            <?php echo mostrarContinente(); ?>
                        </select>
                    </label>
                       
                    <label>
                        <span>Pais</span>
                        
                        <select class="select" id="pais" onchange="Precio(); mostrarFoto();">
                            <option value="">Pais</option>
                        </select>
                    </label>
                </div>
                
                <label>
                    <span>Preu</span>
                    <input id="precio" readonly class="input">
                </label> 
                <label>
                    <span>Nom</span>
                    <input class="input">
                </label>
                <label>
                    <span>Telèf.</span>
                    <input class="input">
                </label>
                <label>
                    <span>Persones</span>
                    <input min="1" class="input" type="number">
                </label>
                <label>
                    <input type="checkbox" class="input">
                    <span class="custom-checkbox">Descompte del 20%</span>
                </label>
                <div id="imagenPais">
                    <img id="fotoPais" src="" alt="Imagen del país seleccionado" style="display:none; max-width: 300px;">
                </div>
                <div class="flex">
                    <button class="submit" name="boton" value="Afegir">Afegir</button>
                    <button class="submit" name="boton" value="Reservar">Reserva</button>   
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // // Función para cargar los países
        // function cargarPaises() {
        //     const continenteSelect = document.getElementById("continente");
        //     const paisSelect = document.getElementById("pais");
        //     const continenteSeleccionado = continenteSelect.value;

        //     if (!continenteSeleccionado) {
        //         return; // Si no hay continente seleccionado, salir de la función
        //     }

        //     // Hacer una petición AJAX para obtener los países de un continente
        //     const formData = new FormData();
        //     formData.append('continente_id', continenteSeleccionado);

        //     fetch('Controlador/getPaises.php', {
        //             method: 'POST',
        //             body: formData
        //         })
        //         .then(response => response.json())
        //         .then(paises => {
        //             console.log(paises); // Verifica que el campo foto está presente
        //             paisSelect.innerHTML = '<option value="">Selecciona un país</option>';

        //             paises.forEach(pais => {
        //                 const option = document.createElement("option");
        //                 option.value = pais.id; // Asignamos el id del país
        //                 option.textContent = pais.nombre;
        //                 option.setAttribute('data-foto', pais.foto); // Guardamos la ruta de la foto en un atributo data
        //                 paisSelect.appendChild(option);
        //             });
        //         })
        //         .catch(error => console.error('Error al cargar los países:', error));
        //     }

        //     // Función para mostrar el precio
        //     function Precio() {
        //         const paisSelect = document.getElementById("pais");
        //         const precioInput = document.getElementById("precio");
        //         const paisSeleccionado = paisSelect.value;

        //         if (!paisSeleccionado) {
        //             return; // Si no hay país seleccionado, salir de la función
        //         }

        //         // Hacer una petición AJAX para obtener el precio del país seleccionado
        //         const formData = new FormData();
        //         formData.append('pais_id', paisSeleccionado);

        //         fetch('Controlador/getPrecios.php', {
        //                 method: 'POST',
        //                 body: formData
        //             })
        //             .then(response => response.json())
        //             .then(data => {
        //                 // Limpiar el campo de precio
        //                 precioInput.value = '';

        //                 if (data && data.precio) {
        //                     precioInput.value = data.precio + "€"; // Asignar el valor del precio
        //                 } else {
        //                     console.error("No se encontró el precio para el país seleccionado.");
        //                 }
        //             })
        //             .catch(error => console.error('Error al cargar el precio:', error));
        //     }

        //     // Función para mostrar la foto del país
        //     function mostrarFoto() {
        //         const select = document.getElementById('pais');
        //         const img = document.getElementById('fotoPais');
        //         const optionSeleccionada = select.options[select.selectedIndex];
        //         const rutaImagen = optionSeleccionada.getAttribute('data-foto'); // Obtener la ruta desde el atributo data-foto

        //         if (rutaImagen) {
        //             img.src = rutaImagen;
        //             img.style.display = 'block'; // Mostrar la imagen
        //         } else {
        //             img.style.display = 'none'; // Ocultar la imagen si no hay país seleccionado
        //         }
        //     }
    </script>
   
</body>
</html>