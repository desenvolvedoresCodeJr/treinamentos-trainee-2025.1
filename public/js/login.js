let eyeIconPassword = document.querySelector('#icon-password');

function toggleTypeInputPassword(idInput){
    console.log("Entrou")
    let inputPassword = document.getElementById(idInput);
    
    if(inputPassword.type === 'password'){
        inputPassword.type = 'text';
        eyeIconPassword.classList.remove('fa-eye');
        eyeIconPassword.classList.add('fa-eye-slash');
    }
    else{
        inputPassword.type = 'password';
        eyeIconPassword.classList.remove('fa-eye-slash');
        eyeIconPassword.classList.add('fa-eye');
    }
        
}