
export const renderPaises = (paises, paisSeleccionado = null) => {
    const paisSelect = document.getElementById("pais");
    paisSelect.innerHTML = '<option value="">Selecciona un país</option>';

    paises.forEach(pais => {
        const option = document.createElement("option");
        option.value = pais.id;
        option.textContent = pais.nombre;
        option.setAttribute('data-foto', pais.foto);

        if (paisSeleccionado && paisSeleccionado == pais.id) {
            option.selected = true;
        }

        paisSelect.appendChild(option);
    });
};

export const renderPrecio = (precio) => {
    const precioInput = document.getElementById("precio");
    precioInput.value = precio ? `${precio}€` : '';
};

export const mostrarFotoPais = (rutaImagen) => {
    const img = document.getElementById('fotoPais');
    if (rutaImagen) {
        img.src = rutaImagen;
        img.style.display = 'block';
    } else {
        img.style.display = 'none';
    }
};


