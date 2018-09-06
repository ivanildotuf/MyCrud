<?php
include("conexao.php");
$op = $_GET['op'];

switch ($op) {
    case "ins":
        $nome = $_GET['nome'];
        $telefone = $_GET['telefone'];
        $sql = "Insert into cliente(nome,telefone) values('$nome','$telefone')";
        $result = mysqli_query($conn,$sql);    
        break;
    case "del":
        $id = $_GET['id'];
        $sql = "Delete from cliente where codCliente = '$id' ";
        $result = mysqli_query($conn,$sql);
        break;
    case "upd":
        $nome = $_GET['nome'];
        $telefone = $_GET['telefone'];
        $id = $_GET['id'];
        $sql = "Update cliente SET nome = '$nome', telefone= '$telefone' where codCliente = '$id' ";
        $result = mysqli_query($conn,$sql);
        break;
}
?>
<script>
    window.location="agenda.php";
</script>