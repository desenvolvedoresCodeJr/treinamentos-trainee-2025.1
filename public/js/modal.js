function abrirModal(idModal, idTela){
    document.getElementById(idModal).style.display = 'block';
    document.getElementById(idTela).style.display = 'block';
}

function mostrarSenha(idInput, idOlho){

    const inputSenha = document.getElementById(idInput);
    const Icone = document.getElementById(idOlho);

    if(inputSenha.type === 'password'){
        inputSenha.setAttribute('type', 'text');
        Icone.classList.replace('bi-eye', 'bi-eye-slash')
    } else{
        inputSenha.setAttribute('type', 'password');
        Icone.classList.replace('bi-eye-slash', 'bi-eye');
    }

}

const image = document.getElementById('imgProfile');
const inputImg = document.getElementById('inputImage');

inputImg.onchange = function(){
    image.src = URL.createObjectURL(inputImg.files[0]);
    image.style.display = 'block';
}

function erroChecker(idErroEmail, idErroSenha, idForm, idInputEmail, idInputSenha, event){
    event.preventDefault();

    

    const email = document.getElementById(idInputEmail).value;
    const usuario = document.getElementById('user').value;
    const senha = document.getElementById(idInputSenha).value;
    const img = document.getElementById('inputImage').files[0];

    let valid = true;

    if(!email){
        const erroEmail = document.getElementById(idErroEmail);
        erroEmail.innerText = 'email é obrigatório';
        erroEmail.style.display = 'block';
        console.log("confere");
        valid = false;
    }

    if(!usuario){
        document.getElementById('erroUser').innerText = 'usuário é obrigatório';
        valid = false;
    }

    if(!senha){
        document.getElementById(idErroSenha).innerText = 'senha é obrigatória';
        valid = false;
    }

    if(!img){
        document.getElementById('erroImg').innerText = 'imagem é obrigatória';
        valid = false;
    }

    if(!valid) return;

    document.getElementById(idForm).submit();

}