<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Formulario de Reclamação</title>
		<link href="css/1.css" type="text/css" rel="stylesheet"/>
		<meta charset= utf-8>
	</head>
	
	<body>
	<div id= "dois">
<?php 
if (!isset ($_SESSION)) session_start();

$nivel_necessario = 2;

if (!isset($_SESSION['email']) OR ($_SESSION['nivel'] <> $nivel_necessario)){
	
	session_destroy();
	header("location: login.html");
	exit;
}

$_SESSION['email'];
$email= $_SESSION['email'];
echo "Usuario: $email";

?>
<header>
		<a href="logout.php?act=logout">Sair</a>
</header>
</div>
<p class= "c">
<img src="imagens\cadas2.png" alt= "Login de Usuarios" title="Usuarios cadastrado." width="100" height="80"/>
</p>

 
		<form	 action="verificarecla.php" method="post">
			
			
			<fieldset>
				
				<legend><h1>Preencha o Formulário da Reclamação</h1></legend>
				<label><h3>Selecione o Departamento:</h3> <br/> 
					
					<select name = "departamento" id= "departamento">
					<option value = "Selecione"> Selecione </option>
					<option value = "RH"> RH </option>
					<option value = "LIMPEZA"> LIMPEZA </option>
					<option value = "SECRETARIA"> SECRETARIA </option>
					<option value = "TESOURARIA"> TESOURARIA </option>
					<option value = "COMUNICACOES"> COMUNICAÇÕES </option>
					<option value = "BACKOFFICE"> BACKOFFICE </option>
					<option value = "CANTINA"> CANTINA </option>
					</select><br/></label>
					
				<br><label><h3>Você Deseja Registrar um(a):</h3> <br/> 
					
					<select name = "registrar" id= "registrar">
					<option value = "Selecione"> Selecione </option>
					<option value = "RECLAMACAO"> RECLAMAÇÃO </option>
					<option value = "SUGESTAO"> SUGESTÃO </option>
					<option value = "CRITICA"> CRÍTICA </option>
					<option value = "ELOGIO"> ELOGIO </option>
					<option value = "DUVIDA"> DÚVIDA </option>
					</select><br/></label>
					
					<br><label for="dtnasc"><h3>Informe a Data do Fato Ocorrido:</h3></label><br>
					<input type="date" name="dtnasc" id= "dtnasc"/>
										<h3>Escreva Resumidamente o ocorrido ou as Observações:</h3>
					<textarea name="mensagemdigi" cols="60" rows="10" placeholder="Escreva aqui..."/></textarea>
					
					<label><br><h3>Clique aqui caso queira Anexar algum arquivo:</h3> <br/></label>
			<input type = "file" name = "aquivo"/><br/><br/>
			
			<input type = "reset" name = "limpar" value = "Limpar">
			<input type = "submit" name = "envia" value = "Cadastrar">
				
</fieldset>
		</form>
	</body>
</html>













