addEventListener('DOMContentLoaded', setup);

function setup(_){
    upData();
}

function upData(){
    const counter = document.querySelector('#count');
    const speed = 97;
    const target = Number(counter.getAttribute('data-target'));
    const count = Number(counter.innerText);
    const inc = target / speed;
    if(count < target){
        counter.innerText = Math.floor(inc + count);
        setTimeout(upData, 1);
    } else {
        counter.innerText = target;
    }

}