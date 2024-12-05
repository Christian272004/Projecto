import { getPaises, getPrecio } from '../Model/Model.js';
import { renderPaises, renderPrecio, mostrarFotoPais } from '../Vista/View.js';

function main() {
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

        let formToSubmit; // Variable para almacenar el formulario a enviar

        // Función para abrir el modal
        btnEliminar.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Previene el comportamiento por defecto del botón
                formToSubmit = this.closest('form'); // Obtiene el formulario correspondiente
                modal.style.display = "block"; // Muestra el modal
            });
        });

        // Función para cerrar el modal
        closeModal.onclick = function () {
            modal.style.display = "none";
        }

        cancelDelete.onclick = function () {
            modal.style.display = "none"; // Cierra el modal al cancelar
        }

        // Función para confirmar la eliminación
        confirmDelete.onclick = function () {
            modal.style.display = "none"; // Cierra el modal
            formToSubmit.submit(); // Envía el formulario
        }

        // Cierra el modal si se hace clic fuera de él
        window.onclick = function (event) {
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

        getPaises(continenteId)
            .then(paises => {
                renderPaises(paises);
            })
            .catch(error => console.error('Error al cargar los países:', error));
    };

    const handlePaisChange = () => {
        const paisSelect = document.getElementById("pais");
        const paisId = paisSelect.value;
        const optionSeleccionada = paisSelect.options[paisSelect.selectedIndex];
        const rutaImagen = optionSeleccionada.getAttribute('data-foto');

        mostrarFotoPais(rutaImagen);

        if (!paisId) {
            return;
        }

        getPrecio(paisId)
            .then(data => {
                if (data && data.precio) {
                    renderPrecio(data.precio);
                } else {
                    console.error("No se encontró el precio para el país seleccionado.");
                    renderPrecio(null);
                }
            })
            .catch(error => console.error('Error al cargar el precio:', error));
    };
    // Obtiene la URL actual
    const urlParams = new URLSearchParams(window.location.search);

    // Obtiene un parámetro específico
    const parametro = urlParams.get('pagina'); // Reemplaza 'parametro' con el nombre del parámetro que deseas obtener
    console.log(parametro);

    if (parametro === 'NouViatge' || parametro === null) {
        bindEvents();
        
    } else {
        setupModal();
    }
}

document.addEventListener('DOMContentLoaded', () => {
    main();
});