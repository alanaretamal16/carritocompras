<?php include_once "encabezado.php" ?>
<div class="columns">
    <div class="column">
        <h2 class="is-size-2">Productos existentes</h2>
        <a class="button is-success" href="agregar_producto.php">Nuevo&nbsp;<i class="fa fa-plus"></i></a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="cuerpoTabla">
            </tbody>
        </table>
    </div>
</div>
<script src="js/productos.js"></script>
<?php include_once "pie.php" ?>