function cargarPaises() {
    const continenteSelect = document.getElementById("continente");
    const paisSelect = document.getElementById("pais");
    const continenteSeleccionado = continenteSelect.value;

    if (!continenteSeleccionado) {
        return; // Si no hay continente seleccionado, salir de la función
    }

    // Hacer una petición AJAX para obtener los países de un continente
    const formData = new FormData();
    formData.append('continente_id', continenteSeleccionado);

    fetch('Controlador/getPaises.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(paises => {
            console.log(paises); // Verifica que el campo foto está presente
            paisSelect.innerHTML = '<option value="">Selecciona un país</option>';

            paises.forEach(pais => {
                const option = document.createElement("option");
                option.value = pais.id; // Asignamos el id del país
                option.textContent = pais.nombre;
                option.setAttribute('data-foto', pais.foto); // Guardamos la ruta de la foto en un atributo data
                paisSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error al cargar los países:', error));
}

// Función para mostrar el precio
function Precio() {
    const paisSelect = document.getElementById("pais");
    const precioInput = document.getElementById("precio");
    const paisSeleccionado = paisSelect.value;

    if (!paisSeleccionado) {
        return; // Si no hay país seleccionado, salir de la función
    }

    // Hacer una petición AJAX para obtener el precio del país seleccionado
    const formData = new FormData();
    formData.append('pais_id', paisSeleccionado);

    fetch('Controlador/getPrecios.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            // Limpiar el campo de precio
            precioInput.value = '';

            if (data && data.precio) {
                precioInput.value = data.precio + "€"; // Asignar el valor del precio
            } else {
                console.error("No se encontró el precio para el país seleccionado.");
            }
        })
        .catch(error => console.error('Error al cargar el precio:', error));
}


function mostrarFoto() {
    const select = document.getElementById('pais');
    const img = document.getElementById('fotoPais');
    const optionSeleccionada = select.options[select.selectedIndex];
    const rutaImagen = optionSeleccionada.getAttribute('data-foto'); 

    if (rutaImagen) {
        img.src = rutaImagen;
        img.style.display = 'block'; 
    } else {
        img.style.display = 'none'; 
    }
}