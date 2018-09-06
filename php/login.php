<?php
include("conexao.php");
$opcao = $_GET['opcao'];



if($opcao == "logout"){
	session_start();
	unset($_SESSION['usuario']);
	unset($_SESSION['senha']);
	echo "Deslogado com sucesso";
	exit();
}

$usuario = $_GET['usuario'];
$senha = $_GET['senha'];


if ($conn->connect_error)
  die(sprintf('Unable to connect to the database. %s', $conn->connect_error));

$sql = "Select * from acesso";
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
		if ($usuario==$row["login"] && $senha==$row["senha"]){
			session_start();
			$_SESSION['usuario'] = $usuario;
			$_SESSION['senha'] = $senha;
			echo "Logado com sucesso";

		}else{
			echo "Verificar o usuario e senha";
		}

        
    }
} else {
    echo "nenhum usuário registrado";
}
?>

