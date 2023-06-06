<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', ' ', 'chisme_m_a');

// Verificar la conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Obtener los datos del comentario del formulario
$nombre = $_POST['nombre'];
$contenido = $_POST['contenido'];

// Preparar la consulta SQL
$sql = "INSERT INTO comentarios (nombre, contenido) VALUES ('$nombre', '$contenido')";

// Ejecutar la consulta
if ($conexion->query($sql) === TRUE) {
    // Redireccionar al index.html
    header('Location: index.html');
    exit;
} else {
    echo 'Error al guardar el comentario: ' . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
