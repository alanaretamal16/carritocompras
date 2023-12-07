const $nombre = document.querySelector("#nombre"),
    $descripcion = document.querySelector("#descripcion"),
    $precio = document.querySelector("#precio"),
    $btnGuardar = document.querySelector("#btnGuardar");
let idProducto;

const rellenarFormulario = async () => {

    const urlSearchParams = new URLSearchParams(window.location.search);
    idProducto = urlSearchParams.get("id"); 
    const respuestaRaw = await fetch(`./obtener_producto_por_id.php?id=${idProducto}`);
    const producto = await respuestaRaw.json();

    $nombre.value = producto.nombre;
    $descripcion.value = producto.descripcion;
    $precio.value = producto.precio;
};


rellenarFormulario();

$btnGuardar.onclick = async () => {

    const nombre = $nombre.value,
        descripcion = $descripcion.value,
        precio = parseFloat($precio.value);
    if (!nombre) {
        return Swal.fire({
            icon: "error",
            text: "Escribe el nombre",
            timer: 700, 
        });
    }
    if (!descripcion) {
        return Swal.fire({
            icon: "error",
            text: "Escribe la descripción",
            timer: 700, 
        });
    }

    if (!precio) {
        return Swal.fire({
            icon: "error",
            text: "Escribe el precio",
            timer: 700, 
        });
    }

    const cargaUtil = {
        id: idProducto,
        nombre: nombre,
        descripcion: descripcion,
        precio: precio,
    };

    const cargaUtilCodificada = JSON.stringify(cargaUtil);

    try {
        const respuestaRaw = await fetch("actualizar_producto.php", {
            method: "PUT",
            body: cargaUtilCodificada,
        });

        const respuesta = await respuestaRaw.json();
        if (respuesta) {

            await Swal.fire({
                icon: "success",
                text: "Producto actualizado",
                timer: 700, 
            });
            window.location.href = "./productos.php";
        } else {
            Swal.fire({
                icon: "error",
                text: "El servidor no envió una respuesta exitosa",
            });
        }
    } catch (e) {
        Swal.fire({
            icon: "error",
            title: "Error de servidor",
            text: "Inténtalo de nuevo. El error es: " + e,
        });
    }
};