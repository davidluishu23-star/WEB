<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    $sql = "INSERT INTO contactos (nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('✅ Mensaje enviado correctamente. ¡Gracias por contactarnos!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>