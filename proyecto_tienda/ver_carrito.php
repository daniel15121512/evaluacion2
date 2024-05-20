<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
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
                        <a class="nav-link" href="productos.php">Productos</a>
                        <a class="nav-link" href="login.html">Inicia seion</a>
                        <a class="nav-link" href="registrar.html">Registrate</a>
                        <a class="nav-link" href="ver_carrito.php">Carrito (<?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?>)</a>
                    </div>
                </div>
            </div>
        </nav>
    </header> 

    <div class="container mt-5">
        <h1>Carrito de Compras</h1>
        <?php if (!empty($_SESSION['carrito'])): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach ($_SESSION['carrito'] as $producto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                            <td><?php echo number_format($producto['precio'], 0, ',', '.'); ?></td>
                            <td><?php echo $producto['cantidad']; ?></td>
                            <td><?php echo number_format($producto['precio'] * $producto['cantidad'], 0, ',', '.'); ?></td>
                        </tr>
                        <?php $total += $producto['precio'] * $producto['cantidad']; ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Total</td>
                        <td><?php echo number_format($total, 0, ',', '.'); ?></td>
                    </tr>
                </tfoot>
            </table>
            <a href="productos.php" class="btn btn-primary">Seguir comprando</a>
            <a href="#" class="btn btn-success">Proceder al pago</a>
            <form action="vaciar_carrito.php" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-danger">Vaciar Carrito</button>
            </form>
        <?php else: ?>
            <p>Tu carrito está vacío.</p>
            <a href="productos.php" class="btn btn-primary">Volver a la tienda</a>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>