// selecionando os elementos
let password = document.getElementById("password");
let confirm_password = document.getElementById("confirm_password");
let mensagem_validacao = document.getElementById("validacao");
let interacao = document.getElementById("form");
let msg_php = document.getElementById("msg_php");
let env = document.getElementById('form')

// ao fazer envio com senhas diferentes surje um alerta
env.addEventListener('submit', function(e){
  if((password.value) != (confirm_password.value)){
    e.preventDefault();
    window.alert("Suas senhas devem ser iguais");
  }
})

interacao.addEventListener("click", function(){
  msg_php.classList.remove("active");
});


// funcao que valida os campos de senha ( input senha e confirmar senha)
function validarPassword() {
  if (password.value != confirm_password.value) {
    // adicionando a class active no paragrafo de aviso
    mensagem_validacao.classList.add("active");
  } else {
    // removendo class
    mensagem_validacao.classList.remove("active");
  }
}

// =============== ANIMAÇÃO INPUT ====================
