function abrirModal(idModal, idFundo){
    document.getElementById(idModal).style.display = "flex";
    document.getElementById(idFundo).style.display = "block";
}

function mostrarSenha(idIcon, idInput){
    const icon = document.getElementById(idIcon);
    const input = document.getElementById(idInput);

    if(input.type === 'password'){
        input.setAttribute('type', 'text');
        icon.classList.replace('bi-eye', 'bi-eye-slash');
    } else{
        input.setAttribute('type', 'password');
        icon.classList.replace('bi-eye-slash', 'bi-eye');
    }
}

const image = document.getElementById('imgProfile');
const inputImg = document.getElementById('inputImage');

inputImg.onchange = function(){
    image.src = URL.createObjectURL(inputImg.files[0]);
    image.style.display = 'block';
}

function fecharModal(idModalCr, idFundoCr){
    document.getElementById(idModalCr).style.display = 'none';
    document.getElementById(idFundoCr).style.display = 'none';
}