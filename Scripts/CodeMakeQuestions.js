document.addEventListener('DOMContentLoaded', setup);

function setup(_) {
    cerrarModal();
    borrarTextArea();
    previewTextArea();
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
        return true;
    });
}

function previewTextArea() {
    const text_area = document.querySelector('#text-area');
    const text_area_preview = document.querySelector('#text-area-preview');
    const nP = document.createElement('p');
    const borrar = document.querySelector('#span-borrar-todo');

    text_area.addEventListener('input', function(){
        text_area_preview.appendChild(nP);
        nP.innerHTML = text_area.value;

        borrar.addEventListener('click', function(){
        nP.innerHTML = "";
        });
    });
}

function retrieveEtiquetas() {
    
}


