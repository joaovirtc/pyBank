// selecionando os elementos
let password = document.getElementById("password");
let confirm_password = document.getElementById("confirm_password");
let mensagem_validacao = document.getElementById('validacao')


// funcao que valida os campos de senha ( input senha e confirmar senha)
function validarPassword(){
    if(password.value != confirm_password.value) {
        // adicionando a class active no paragrafo de aviso
        mensagem_validacao.classList.add("active");

    } else {
        // removendo class
        mensagem_validacao.classList.remove("active");
    }
}
