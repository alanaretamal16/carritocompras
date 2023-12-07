const $nombre = document.querySelector("#nombre"),
    $descripcion = document.querySelector("#descripcion"),
    $precio = document.querySelector("#precio"),
    $btnGuardar = document.querySelector("#btnGuardar");

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
        nombre: nombre,
        descripcion: descripcion,
        precio: precio,
    };
    
    const cargaUtilCodificada = JSON.stringify(cargaUtil);
    
    try {
        const respuestaRaw = await fetch("guardar_producto.php", {
            method: "POST",
            body: cargaUtilCodificada,
        });
        
        const respuesta = await respuestaRaw.json();
        if (respuesta) {

            
            Swal.fire({
                icon: "success",
                text: "Producto guardado",
                timer: 700, 
                });
              $nombre.value = $descripcion.value = $precio.value = "";
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