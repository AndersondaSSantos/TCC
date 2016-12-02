<!DOCTYPE html>
<html lang="pt-br">

<head>

		<title>Formulario de Reclamacao</title>
		<link href="css/1.css" type="text/css" rel="stylesheet"/>
		<meta charset= utf-8>
	</head>
	<body>
	<div id= "dois">
<?php 
if (!isset ($_SESSION)) session_start();

$nivel_necessario =2;

if (!isset($_SESSION['email']) OR ($_SESSION['nivel'] <> $nivel_necessario)){
	
	session_destroy();
	header("location: login.html");
	exit;
}
$_SESSION['email'];
$email= $_SESSION['email'];
echo "Usuario: $email";
?>
</div>
<div id= "um">

<?php
	
	$email = $_SESSION["email"];
	$departamento	= $_POST["departamento"];
	$registrar = $_POST["registrar"];
	$mensagemdigi = $_POST["mensagemdigi"];
	$dtnasc = $_POST["dtnasc"];
	$erro = 0;
	
		if ($departamento == 'Selecione')
			{echo"<br><h1>Campo não preenchido (Selecione o Departamento). Esse é um campo Obrigatorio</h1>"; $erro=1;}
		if ($registrar == 'Selecione')
			{echo"<br><h1>Campo não preenchido (Você Deseja Registrar um(a)). Esse é um campo Obrigatorio</h1>"; $erro=1;}
		if ($dtnasc == '')
			{echo"<br><h1>Campo não preenchido (Data do Fato Ocorrido). Esse é um campo Obrigatorio</h1>"; $erro=1;}
		if ($mensagemdigi == '')
			{echo"<br><h1>Campo não preenchido (Escreva Resumidamente o ocorrido). Esse é um campo Obrigatorio</h1>"; $erro=1;}
		
		if ($erro==1)
		{
			}
		if ($erro==0)
		{
		 include "inserirRecla.php"	;
		
		}
			
		
?>
<input type="button" value="Voltar" onClick="history.go(-1)"> 
	
</div>

</body>
</html>