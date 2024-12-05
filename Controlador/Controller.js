const Controller = ((Model, View) => {
    const init = () => {
        bindEvents();
        setupModal();
    };

    const bindEvents = () => {
        const continenteSelect = document.getElementById("continente");
        const paisSelect = document.getElementById("pais");

        continenteSelect.addEventListener('change', handleContinenteChange);
        paisSelect.addEventListener('change', handlePaisChange);
    };

    const setupModal = () => {
        const modal = document.getElementById("confirmModal");
        const btnEliminar = document.querySelectorAll('.boton-eliminar'); // Selecciona todos los botones de eliminar
        const closeModal = document.getElementById("closeModal");
        const confirmDelete = document.getElementById("confirmDelete");
        const cancelDelete = document.getElementById("cancelDelete");

        let viajeId; // Variable para almacenar el ID del viaje a eliminar

        // Función para abrir el modal
        btnEliminar.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Previene el comportamiento por defecto del botón
                viajeId = this.nextElementSibling.value; // Obtiene el ID del viaje a eliminar
                modal.style.display = "block"; // Muestra el modal
            });
        });

        // Función para cerrar el modal
        closeModal.onclick = function() {
            modal.style.display = "none";
        }

        cancelDelete.onclick = function() {
            modal.style.display = "none"; // Cierra el modal al cancelar
        }

        // Función para confirmar la eliminación
        confirmDelete.onclick = function() {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'index.php'; // Cambia esto a la URL correcta
            const hiddenField = document.createElement('input');
            hiddenField.type = 'hidden';
            hiddenField.name = 'pagina';
            hiddenField.value = 'Eliminar'; // Cambia esto según tu lógica
            form.appendChild(hiddenField);

            const idField = document.createElement('input');
            idField.type = 'hidden';
            idField.name = 'id_viatge';
            idField.value = viajeId; // Asigna el ID del viaje
            form.appendChild(idField);

            document.body.appendChild(form); // Agrega el formulario al DOM
            form.submit(); // Envía el formulario
        }

        // Cierra el modal si se hace clic fuera de él
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    };

    const handleContinenteChange = () => {
        const continenteSelect = document.getElementById("continente");
        const continenteId = continenteSelect.value;

        if (!continenteId) {
            return;
        }

        Model.getPaises(continenteId)
            .then(paises => {
                View.renderPaises(paises);
            })
            .catch(error => console.error('Error al cargar los países:', error));
    };

    const handlePaisChange = () => {
        const paisSelect = document.getElementById("pais");
        const paisId = paisSelect.value;
        const optionSeleccionada = paisSelect.options[paisSelect.selectedIndex];
        const rutaImagen = optionSeleccionada.getAttribute('data-foto');

        View.mostrarFotoPais(rutaImagen);

        if (!paisId) {
            return;
        }

        Model.getPrecio(paisId)
            .then(data => {
                if (data && data.precio) {
                    View.renderPrecio(data.precio);
                } else {
                    console.error("No se encontró el precio para el país seleccionado.");
                    View.renderPrecio(null);
                }
            })
            .catch(error => console.error('Error al cargar el precio:', error));
    };

    return {
        init
    };
})(Model, View);
