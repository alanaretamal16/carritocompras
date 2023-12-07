<?php include_once "encabezado.php" ?>
<div class="columns">
    <div class="column">
        <h2 class="is-size-2">Mi carrito de compras</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Quitar del carrito</th>
                </tr>
            </thead>
            <tbody id="cuerpoTabla">
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="has-text-right is-size-5">Total</td>
                    <td colspan="2" class="is-size-5" id="celdaTotal"></td>
                </tr>
            </tfoot>
        </table>
        <button id="btnTerminarCompra" class="button is-success is-large"><i class="fa fa-check"></i>&nbsp;Terminar compra</button>
    </div>
</div>
<script src="js/ver_carrito.js"></script>
<?php include_once "pie.php" ?>
