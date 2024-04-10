document.addEventListener('DOMContentLoaded', setup);

function setup(_) {
    cerrarModal();
    borrarTextArea();
}

function cerrarModal() {
    const ventanaModal = document.querySelector('#ventana_modal');
    const btn_cerrar = document.querySelector('#btn-close');

    btn_cerrar.addEventListener('click', function(){
        ventanaModal.style.display = "none";
    });
}

function borrarTextArea() {
    const borrar = document.querySelector('#span-borrar-todo');
    const text_area = document.querySelector('#text-area');
    borrar.addEventListener('click', function(){
        text_area.value = "";        
    });
}
