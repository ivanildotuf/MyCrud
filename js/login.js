 

function logar() {
var usuario = document.getElementById("usuario");
var senha = document.getElementById("senha");
var ajax = new XMLHttpRequest();
// Seta tipo de requisição e URL com os parâmetros
ajax.open("GET", "php/login.php?usuario="+usuario.value+"&senha="+senha.value+"&opcao=login", true);

ajax.send();

ajax.onreadystatechange = function() {

  if (ajax.readyState == 4 && ajax.status == 200) {
    var data = ajax.responseText;
    // Retorno do Ajax
    alert(data);
  }
}
}

function deslogar(){
var ajax = new XMLHttpRequest();
// Seta tipo de requisição e URL com os parâmetros
ajax.open("GET", "php/login.php?opcao=logout", true);

ajax.send();
ajax.onreadystatechange = function() {

  if (ajax.readyState == 4 && ajax.status == 200) {
    var data = ajax.responseText;
    // Retorno do Ajax
    alert(data);
  }
}
}