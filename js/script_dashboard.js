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
                r += `
                    <tr>
                        <td>${e.id_lugar}</td>
                        <td>${e.nombre_lugar}</td>
                        <td>${e.foto_lugar}</td>
                        <td><button class="btn btn-danger" onclick="eliminar_lugar(${e.id_lugar})"><i class="fa fa-trash-o"></i> </button></td>
                    </tr>
                `;
                rr += `<option value="${e.id_lugar}">${e.nombre_lugar}</option>`;

            });
            rr += `</select>`;
            document.getElementById("tabla_lugar").innerHTML = r;
            document.getElementById("selectD").innerHTML = rr;

        }
    }
    let opcion = new FormData();
    opcion.append('flag', 'get_lugar');
    xhr.send(opcion);
}

function insertLugar() {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'funciones/logica_data.php', true);
    xhr.onload = function() {
        if (this.status == 200) {
            validador(JSON.parse(xhr.responseText), 'alert_lugar', 'Registro');
            getLugar();
        }
    }
    let opcion = new FormData();
    opcion.append('flag', 'insert_lugar');
    opcion.append('nombre_lugar', document.getElementById('nombre_lugar').value);
    opcion.append('mapa_lugar', document.getElementById('mapa_lugar').value);
    opcion.append('foto_lugar', document.getElementById('foto_lugar').value);
    xhr.send(opcion);
}

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
                    <tr>
                        <td>${e.id_tour}</td>
                        <td>${e.nombre_tour}</td>
                        <td>${e.vacantes_tour}</td>
                        <td>${e.foto_tour}</td>
                        <td>${e.precio_tour}</td>
                        <td><button class="btn btn-danger" onclick="eliminar_tour(${e.id_tour})"><i class="fa fa-trash-o"></i> </button></td>
                    </tr>
                `;

            });
            document.getElementById("tabla_tour").innerHTML = r;
        }
    }
    let opcion = new FormData();
    opcion.append('flag', 'get_tours');
    xhr.send(opcion);
}

function eliminar_tour(id_tour) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'funciones/logica_data.php', true);
    xhr.onload = function() {
        if (this.status == 200) {
            validador(JSON.parse(xhr.responseText), 'alert_tour', 'Eliminacion');
            getTours();
        }
    }
    let opcion = new FormData();
    opcion.append('flag', 'delete_tour');
    opcion.append('id_tour', id_tour);
    xhr.send(opcion);

}

function eliminar_lugar(id_lugar) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'funciones/logica_data.php', true);
    xhr.onload = function() {
        if (this.status == 200) {
            validador(JSON.parse(xhr.responseText), 'alert_lugar', 'Eliminacion');
            getLugar();
        }
    }
    let opcion = new FormData();
    opcion.append('flag', 'delete_lugar');
    opcion.append('id_lugar', id_lugar);
    xhr.send(opcion);

}


function insertTour() {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'funciones/logica_data.php', true);
    xhr.onload = function() {
        if (this.status == 200) {
            validador(JSON.parse(xhr.responseText), 'alert_tour', 'Registro');
            getTours();
        }
    }
    let opcion = new FormData();
    opcion.append('flag', 'insert_tour');
    opcion.append('id_lugar', $('#id_destino').val());
    opcion.append('nombre_tour', document.getElementById('nombre_tour').value);
    opcion.append('vacantes_tour', document.getElementById('vacantes_tour').value);
    opcion.append('foto_tour', document.getElementById('foto_tour').value);
    opcion.append('precio_tour', document.getElementById('precio_tour').value);
    opcion.append('descripcion_tour', document.getElementById('descripcion_tour').value);
    xhr.send(opcion);
}

function validador(rsp, alert, txt) {
    if (rsp == "True")
        document.getElementById(alert).innerHTML = `<div class="alert alert-success" role="alert">
                ${txt} Exitoso 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>`;
    else
        document.getElementById(alert).innerHTML = `<div class="alert alert-danger" role="alert">
                ${txt} Fallido
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>`;
}

getLugar();
getTours();