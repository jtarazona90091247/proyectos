<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Usuario de XAMPP
$password = ""; // Contraseña vacía por defecto
$dbname = "proyecto_wep_cucuta"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre']; // Cambia 'name' por 'nombre'
$telefono = $_POST['telefono']; // Cambia 'message' por 'resena'
$email = $_POST['email'];
$reseñas = $_POST['reseñas'];

// Preparar la consulta SQL
$sql = "INSERT INTO contactos (nombre_completo,telefono,correo_electronico,reseñas) VALUES (?, ? , ?, ?)";
$stmt = $conn->prepare($sql);

// Verificar si se preparó correctamente
if ($stmt === false) {
    die("Error en la preparación de la declaración: " . $conn->error);
}

// Vincular los parámetros
$stmt->bind_param("ssss",  $nombre,$telefono, $email, $reseñas); // Cambia 'mensaje' por 'resena'

// Ejecutar la consulta
if ($stmt->execute()) {
    // Mensaje de éxito con botón "Salir"
    echo '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reseña Enviada</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4; /* Color de fondo suave */
                margin: 0;
                padding: 0;
                display: flex; /* Centrar contenido */
                justify-content: center; /* Centrar horizontalmente */
                align-items: center; /* Centrar verticalmente */
                height: 100vh; /* Altura completa de la ventana */
            }
            .container {
                background-color: #ffffff; /* Fondo blanco */
                border-radius: 8px; /* Bordes redondeados */
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra sutil */
                padding: 20px; /* Espaciado interno */
                text-align: center; /* Centramos el texto */
            }
            h1 {
                color: #333; /* Color del título */
                font-size: 24px; /* Tamaño del título */
            }
            .btn {
                display: inline-block;
                margin-top: 20px; /* Espacio encima del botón */
                padding: 10px 15px; /* Espaciado interno */
                background-color: #4CAF50; /* Color del botón */
                color: white; /* Color del texto */
                text-decoration: none; /* Sin subrayado */
                border-radius: 5px; /* Bordes redondeados */
                transition: background-color 0.3s; /* Transición suave */
            }
            .btn:hover {
                background-color: #45a049; /* Color al pasar el mouse */
            }
        </style>
       
    </head>
    <body>
        <div class="container">
            <h1>Reseña enviada correctamente.</h1>
            <a href="http://127.0.0.1:3000/inicio.html" class="btn">Salir</a>
        </div>
    </body>
    </html>';
} else {
    echo "Error al enviar la reseña: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>