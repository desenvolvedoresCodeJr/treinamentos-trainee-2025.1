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

function erroChecker(idErroEmail, idErroSenha, idForm, idInputEmail, idInputSenha, event){
    event.preventDefault();

    const email = document.getElementById(idInputEmail).value;
    const senha = document.getElementById(idInputSenha).value;
    const img = document.getElementById('inputImage').files[0];

    let valid = true;

    if (!email) {
        const erroEmail = document.getElementById(idErroEmail);
        erroEmail.style.display = 'block';
        erroEmail.innerText = 'Email é obrigatório';
        valid = false;
    }

    if (!senha) {
        const erroSenha = document.getElementById(idErroSenha);
        erroSenha.style.display = 'block';
        erroSenha.innerText = 'Senha é obrigatória';
        valid = false;
    }

    if(!img){
        const erroImg = document.getElementById('erroImg');
        erroImg.style.display = 'block';
        erroImg.innerText = 'imagem é obrigatória';
        valid = false;
    }

    if (!valid) return;

    document.getElementById(idForm).submit();
}
