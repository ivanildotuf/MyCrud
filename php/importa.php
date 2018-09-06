<?php
include("conexao.php");
$tabela = "cliente"; 
$arquivo = 'testeCsv.csv';
$arq = fopen($arquivo,'r');
$ll=0;
while(!feof($arq)){

	$testeFimArquivo = fgetc($arq);
  	if($testeFimArquivo === false) 
  	break;	
	for($i=0; $i<1; $i++){
		if ($conteudo = fgets($arq)){
			$ll++; 
			$linha = explode(';', $conteudo);
		
		}
		
		$sql = "insert into $tabela (nome, telefone) VALUES ('$linha[0]', '$linha[1]')";
		$result = mysqli_query($conn,$sql);
		$linha = array();	
	}
}

fclose($arq);
?>
<script>
	alert("Inserido com sucesso");
	window.location="agenda.php";
</script>