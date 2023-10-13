function getTours() {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'funciones/logica_data.php', true);
    xhr.onload = function() {
        if (this.status == 200) {
            let rsp = JSON.parse(xhr.responseText);
            let r = "";
            console.log(rsp);
            rsp.forEach(e => {
                r += `
                <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Room Thumbnail -->
                        <div class="room-thumbnail">
                            <img src="img/bg-img/${e.foto_tour.split(',')[0]}" alt="">
                        </div>
                        <!-- Room Content -->
                        <div class="room-content">
                            <h2>${e.nombre_tour}</h2>
                            <h4>$${e.precio_tour} <span>/ por dia</span></h4>
                            <div class="room-feature">
                                <h6>Vacantes: <span>${e.vacantes_tour}</span></h6>
                            </div>
                            <a href="./detalles.php?id_tour=${e.id_tour}&nombre_tour=${e.nombre_tour}&precio_tour=${e.precio_tour}" class="btn view-detail-btn">Ver Detalles <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                `;

            });
            document.getElementById("list_tours").innerHTML = r;
        }
    }
    let opcion = new FormData();
    opcion.append('flag', 'get_tours');
    xhr.send(opcion);
}

function getLugar() {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'funciones/logica_data.php', true);
    xhr.onload = function() {
        if (this.status == 200) {
            let rsp = JSON.parse(xhr.responseText); //capturo los datos del back-end para el front-end
            let r = "";
            let rr = `<select name="id_destino" id="id_destino" class="form-control">`;
            //console.log(rsp);
            rsp.forEach(e => {
                rr += `<option value="${e.id_lugar}">${e.nombre_lugar}</option>`;

            });
            rr += `</select>`;
            document.getElementById("selectD").innerHTML = rr;
        }
    }
    let opcion = new FormData();
    opcion.append('flag', 'get_lugar');
    xhr.send(opcion);
}

function getTourLugar() {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'funciones/logica_data.php', true);
    xhr.onload = function() {
        if (this.status == 200) {
            let rsp = JSON.parse(xhr.responseText); //capturo los datos del back-end para el front-end
            let r = `<h3 class="btn view-detail-btn" onclick="getTours()">Ver todos</h3>`;
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
                                <h6>Vacantes: <span>${e.vacantes_tour}</span></h6>
                            </div>
                            <a href="./detalles.php?id_tour=${e.id_tour}&nombre_tour=${e.nombre_tour}&precio_tour=${e.precio_tour}" class="btn view-detail-btn">Ver Detalles <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                `;

            });
            document.getElementById("list_tours").innerHTML = r;
        }
    }
    let opcion = new FormData();
    opcion.append('flag', 'get__tour_lugar');
    opcion.append('id_lugar', $('#id_destino').val());
    xhr.send(opcion);
}

getTours();
getLugar();