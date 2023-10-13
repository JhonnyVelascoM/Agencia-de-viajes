function getCarrito() {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'funciones/logica_data.php', true);
    xhr.onload = function() {
        if (this.status == 200) {
            let rsp = JSON.parse(xhr.responseText);
            let r = "";
            let total = 0.0;
            console.log(rsp);
            if (rsp.length == 0) return document.getElementById("list_carrito").innerHTML = '<h3>No hay productos en el carrito</h3>';
            rsp.forEach(e => {
                r += `
                <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Room Thumbnail -->
                        <div class="room-thumbnail">
                            <img src="img/bg-img/${e.foto_tour}" alt="">
                        </div>
                        <!-- Room Content -->
                        <div class="room-content">
                            <h2>${e.nombre_tour}</h2>
                            <h4>$${e.precio_tour} <span>/ por dia</span></h4>
                            <div class="room-feature">
                                <h6>Tickets: <span>${e.cantidad_tickets}</span></h6>
                            </div>
                        </div>
                    </div>
                `;
                total += e.cantidad_tickets * e.precio_tour;

            });
            document.getElementById("list_carrito").innerHTML = r;
            document.getElementById("total_carrito").innerHTML = '$' + total;
        }
    }
    let opcion = new FormData();
    opcion.append('flag', 'get_carrito');
    xhr.send(opcion);
}

function pagarCarrito() {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'funciones/logica_data.php', true);
    xhr.onload = function() {
        if (this.status == 200) {
            let rsp = JSON.parse(xhr.responseText);
            if (rsp === "True") {
                document.getElementById("alert_carrito").innerHTML = `<div class="alert alert-success" role="alert">
                Su compra ha sido exitosa
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>`;
                getCarrito();
            } else {
                document.getElementById("alert_carrito").innerHTML = `<div class="alert alert-danger" role="alert">
                No se podido completar la compra
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>`;
            }

        }
    }
    let opcion = new FormData();
    opcion.append('flag', 'pagar_carrito');
    xhr.send(opcion);
}

getCarrito();
pagarCarrito();