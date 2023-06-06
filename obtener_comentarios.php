<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', ' ', 'chisme_m_a');

// Verificar la conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Consulta SQL para obtener los comentarios ordenados por fecha descendente
$sql = "SELECT * FROM comentarios ORDER BY fecha DESC";

// Ejecutar la consulta
$resultado = $conexion->query($sql);

// Array para almacenar los comentarios
$comentarios = array();

// Obtener los resultados y almacenarlos en el array
while ($row = $resultado->fetch_assoc()) {
    $comentarios[] = $row;
}

// Convertir el array a formato JSON y devolverlo como respuesta
header('Content-Type: application/json');
echo json_encode($comentarios);

// Cerrar la conexión
$conexion->close();
?>
