<?php
session_start();

// Vaciar el carrito
if (isset($_SESSION['carrito'])) {
    unset($_SESSION['carrito']);
}

// Redirigir al usuario de vuelta a la página del carrito
header('Location: ver_carrito.php');
exit();
?>