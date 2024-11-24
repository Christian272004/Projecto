const Controller = ((Model, View) => {
    const init = () => {
        bindEvents();
    };

    const bindEvents = () => {
        const continenteSelect = document.getElementById("continente");
        const paisSelect = document.getElementById("pais");

        continenteSelect.addEventListener('change', handleContinenteChange);
        paisSelect.addEventListener('change', handlePaisChange);
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
