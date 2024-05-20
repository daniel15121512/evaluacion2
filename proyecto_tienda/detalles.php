<?php
include 'conexion/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $pdo->prepare('SELECT id, nombre, precio, descripcion FROM producto WHERE id = ?');
        $stmt->execute([$id]);
        $producto = $stmt->fetch();

        if (!$producto) {
            echo "Producto no encontrado.";
            exit();
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
        exit();
    }
} else {
    echo "ID de producto no proporcionado.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Bodoques PC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link" href="index.html">Inicio</a>
                        <a class="nav-link" href="componentes.html">Componentes</a>
                        <a class="nav-link" href="accesorios.html">Accesorios</a>
                        <a class="nav-link" href="ver_carrito.php">Carrito (<?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?>)</a>
                        <a class="nav-link" href="login.html">Conectate</a>
                    </div>
                </div>
            </div>
        </nav>
    </header> 

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="imagenes/productos/<?php echo htmlspecialchars($producto['id']); ?>/principal.jpg" class="img-fluid" alt="Imagen de <?php echo htmlspecialchars($producto['nombre']); ?>">
            </div>
            <div class="col-md-6">
                <h1><?php echo htmlspecialchars($producto['nombre']); ?></h1>
                <p>Precio: <?php echo number_format($producto['precio'], 0, ',', '.'); ?></p>
                <p><?php echo nl2br(htmlspecialchars($producto['descripcion'])); ?></p>
                <a href="productos.php" class="btn btn-primary">Volver a la tienda</a>
                <button type="submit" class="btn btn-primary">Agregar al carrito</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>