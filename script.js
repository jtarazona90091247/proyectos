document.getElementById('reviewForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita el envío del formulario

    const nombre = document.getElementById('nombre').value;
    const reseña = document.getElementById('reseña').value;

    // Crea un nuevo elemento para la reseña
    const nuevaReseña = document.createElement('div');
    nuevaReseña.className = 'reseña';
    nuevaReseña.innerHTML = `<strong>${nombre}</strong><p>${reseña}</p>`;

    // Agrega la nueva reseña a la lista
    document.getElementById('reseñas-lista').appendChild(nuevaReseña);

    // Limpia el formulario
    document.getElementById('reviewForm').reset();
});
