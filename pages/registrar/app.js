// selecionando os elementos
let password = document.getElementById("password");
let confirm_password = document.getElementById("confirm_password");
let mensagem_validacao = document.getElementById('validacao')

function validarPassword(){
    if(password.value != confirm_password.value) {
        mensagem_validacao.classList.add("active");

    } else {
        mensagem_validacao.classList.remove("active");
    }


}
