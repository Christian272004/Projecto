
export const getPaises = (continenteId) => {
    const formData = new FormData();
    formData.append('continente_id', continenteId);

    return fetch('Controlador/getPaises.php', {
        method: 'POST',
        body: formData
    }).then(response => response.json());
};

export const getPrecio = (paisId) => {
    const formData = new FormData();
    formData.append('pais_id', paisId);

    return fetch('Controlador/getPrecios.php', {
        method: 'POST',
        body: formData
    }).then(response => response.json());
};

