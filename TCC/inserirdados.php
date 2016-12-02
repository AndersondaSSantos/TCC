<html lang="pt-br">
<body>
<?php

$con = mysql_connect("localhost", "root", "thaand17012015");
		if (!$con){
			die ('Erro de conexão:' .mysql_erro());
			
		}
	mysql_select_db("cadastro", $con);
		
	
	$nomecompleto	= $_POST['nomecompleto'];
	$senha = $_POST['senha'];
	$email = $_POST['email'];
	$nivel = '2';
	$ativo = '1';
	
	$query = mysql_query("INSERT INTO cadastrousuario(nomecompleto, senha, email, nivel, ativo, cadastro) VALUES ('$nomecompleto', '$senha', '$email', '$nivel', '$ativo', now())") or die("<h1>Esse email já é cadastrado</h1>");

	echo "Bem vindo,$nomecompleto";
	
	mysql_close($con);
		
?>
<label>Clique aqui para retornar a tela de Login?</label>
	<br><a href="Login.html">Clique aqui.</a>

</body>
</html>	