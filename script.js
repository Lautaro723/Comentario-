// Cargar los comentarios al cargar la página
window.addEventListener('load', cargarComentarios);

function cargarComentarios() {
    // Hacer una solicitud HTTP para obtener los comentarios de la base de datos
    fetch('obtener_comentarios.php')
        .then(response => response.json())
        .then(data => mostrarComentarios(data))
        .catch(error => console.error('Error:', error));
}

function mostrarComentarios(comentarios) {
    const comentariosDiv = document.getElementById('comentarios');
    comentariosDiv.innerHTML = '';

    comentarios.forEach(comentario => {
        const comentarioDiv = document.createElement('div');
        comentarioDiv.classList.add('comentario');

        const nombreElement = document.createElement('h3');
        nombreElement.textContent = comentario.nombre;

        const contenidoElement = document.createElement('p');
        contenidoElement.textContent = comentario.contenido;

        comentarioDiv.appendChild(nombreElement);
        comentarioDiv.appendChild(contenidoElement);

        comentariosDiv.appendChild(comentarioDiv);
    });
}
