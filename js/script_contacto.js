function enviarwsp() {
    let nombre = document.getElementById("contact_name").value;
    let email = document.getElementById("contact_email").value;
    let message = document.getElementById("contact_message").value;
    if (!nombre || !email || !message) {
        document.getElementById("alert_contacto").innerHTML = `<div class="alert alert-danger" role="alert">
                Rellene todos los campos
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>`;
        return;
    }

    let etiqueta = document.createElement('a');
    etiqueta.target = '_blank';
    etiqueta.href = `https://api.whatsapp.com/send?phone=+593998899063&text=Hola mi nombres es ${nombre} y mi correo es ${email}, quiero enviarte este mensaje: ${message}`;
    etiqueta.click();
    //location.href = ``;
}