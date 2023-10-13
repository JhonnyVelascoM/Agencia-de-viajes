function agregar_carrito() {
    if (!document.getElementById("cantidad_tickets").value) return alert('Cantidad requerida');
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'funciones/logica_data.php', true);
    xhr.onload = function() {
        if (this.status == 200) {
            let rsp = JSON.parse(xhr.responseText);
            if (rsp === "True")
                document.getElementById("alert_carrito").innerHTML = `<div class="alert alert-success" role="alert">
                Se agrego con éxito 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>`;
            else if (rsp === "FalseF")
                document.getElementById("alert_carrito").innerHTML = `<div class="alert alert-danger" role="alert">
                     No hay vacantes suficientes 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                </button>
                </div>`;
            else
                document.getElementById("alert_carrito").innerHTML = `<div class="alert alert-danger" role="alert">
                No se a agregado 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>`;
        }
    }
    let opcion = new FormData();
    opcion.append('flag', 'insert_carrito');
    opcion.append('id_tour', id_tour);
    opcion.append('cantidad_tickets', document.getElementById("cantidad_tickets").value);
    xhr.send(opcion);
}