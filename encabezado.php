<?php?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras con JavaScript y AJAX </title>
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <script src="js/sweetalert2.min.js" type="text/javascript"></script>
</head>

<body>

    <nav class="navbar is-warning" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <button class="navbar-burger is-warning button" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </button>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="productos.php">Productos</a>
                <a class="navbar-item" href="tienda.php">Tienda</a>
            </div>
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a href="ver_carrito.php" class="button is-success">
                            <strong>Ver carrito <span id="conteoCarrito">
                                    (1)
                                </span>&nbsp;<i class="fa fa-shopping-cart"></i></strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <script type="text/javascript" src="js/Carrito.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", () => {
            const boton = document.querySelector(".navbar-burger");
            const menu = document.querySelector(".navbar-menu");
            boton.onclick = () => {
                menu.classList.toggle("is-active");
                boton.classList.toggle("is-active");
            };
            const refrescarConteoDeCarrito = () => {
                const $conteoCarrito = document.querySelector("#conteoCarrito");
                const carritoEncabezado = new Carrito();
                const conteo = carritoEncabezado.obtenerConteo();
                if (conteo > 0) {
                    $conteoCarrito.textContent = "(".concat(conteo, ")");
                } else {
                    $conteoCarrito.textContent = "";
                }
            };
            window.refrescarConteoDeCarrito = refrescarConteoDeCarrito;
            refrescarConteoDeCarrito();

        });

        ;
    </script>
    <section class="section">