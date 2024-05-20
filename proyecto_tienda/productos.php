<?php

require 'conexion/database.php';

try { 
    $stmt = $pdo->query('SELECT id, nombre, precio FROM producto where activo=1');
    $productos = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="img/b.png" type="image/x-icon">
    <link rel="stylesheet" href="css/productos.css">


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
                        <a class="nav-link" href="login.html">Iniciar sesion</a>
                        <a class="nav-link" href="registrar.html">registrarse</a>
                        <a class="nav-link" href="ver_carrito.php">Carrito</a>
                    </div>
                </div>
            </div>
        </nav>
    </header> 

    <main>

        <section class="contenedor text-center">
          <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
              <h1 class="fw-light">Accesorios</h1>
              <br>
              <p class=" text-white">Encuentra los mejores accesorios del mercado aquí abajo</p>
              <p>
                <a href="login.html" class="btn btn-primary my-2">Ir a iniciar sesion</a>
                <a href="ver_carrito.php" class="btn btn-primary my-2">Ir a tu carrito de compras</a>
              </p>
            </div>
          </div>
        </section>
      
        <div class="container mt-5">
            <div class="row">
                <?php foreach ($productos as $producto): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card product-card">

                            <img src="imagenes/productos/<?php echo htmlspecialchars($producto['id']); ?>/principal.jpg" class="card-img-top"
                             alt="Imagen de <?php echo htmlspecialchars($producto['nombre']); ?>">

                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($producto['nombre']); ?></h5>
                                <br>
                                <p class="card-text">Precio: $<?php echo number_format($producto['precio'], 0, ',', '.'); ?></p>
                            </div>
                            <div class="card-footer">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="detalles.php?id=<?php echo htmlspecialchars($producto['id']); ?>" class="btn btn-secondary me-md-2">Detalles</a>                           
                            <form action="carrito.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto['id']); ?>">
                                    <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>">
                                    <input type="hidden" name="precio" value="<?php echo htmlspecialchars($producto['precio']); ?>">
                                    <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


      </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>