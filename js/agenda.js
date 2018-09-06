function modalInsereContato(){
	document.getElementById("insereModal").style.display = "block";
}

function modalEditaContato(id,nome,telefone){
	document.getElementById("editaID").value=id;
	document.getElementById("editaModal").style.display = "block";
}

function apagarContato(id){
window.location="registro.php?id="+id+"&op=del";
}
function insereContato(op){
	
	if(op=="ins"){
		var nome =document.getElementById("nome");
		var telefone =document.getElementById("telefone");
	}else if(op=="upd"){
		var nome = document.getElementById("editaNome");
		var telefone = document.getElementById("editaTelefone");
		var id = document.getElementById("editaID");
	}

	if(nome.value==""){
		alert("favor preencher campo nome");
		return;
	}
	if(telefone.value==""){
		alert("favor preencher campo telefone");
		return;
	}
	if(op=="ins"){
		window.location="registro.php?nome="+nome.value+"&telefone="+telefone.value+"&op=ins";
	}else if(op=="upd"){
		window.location="registro.php?nome="+nome.value+"&telefone="+telefone.value+"&id="+editaID.value+"&op=upd";	
	}
	
}

function limparContato(){
	document.getElementById("nome").value="";
	document.getElementById("telefone").value="";
	document.getElementById("editaNome").value="";
	document.getElementById("editaTelefone").value="";
}

function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
    function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
//numérica
function mnum(v){
    v=v.replace(/\D/g,"");
    return v;
}
