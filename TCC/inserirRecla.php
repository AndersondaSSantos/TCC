<!DOCTYPE html>
<html lang="pt-br">

<head>

		<title>Formulario de Reclamacao</title>
		<link href="css/1.css" type="text/css" rel="stylesheet"/>
		<meta charset= utf-8>
	</head>
	<body>
	<br><br><p><p>
<?php 
if (!isset ($_SESSION)) session_start();

$nivel_necessario =2;

if (!isset($_SESSION['email']) OR ($_SESSION['nivel'] <> $nivel_necessario)){
	
	session_destroy();
	header("location: login.html");
	exit;
}

echo "<h1>Registro efetuado com sucesso!</h1>";
?>

<?php

$con = mysql_connect("localhost", "root", "thaand17012015");
		if (!$con){
			die ('Erro de conexão:' .mysql_erro());
			
		}
	mysql_select_db("cadastro", $con);
		
	
	
	
	$email = $_SESSION["email"];
	$departamento	= $_POST["departamento"];
	$registrar = $_POST["registrar"];
	$mensagem = $_POST["mensagemdigi"];
	$dtnasc = $_POST["dtnasc"];
	$estatus = 'Novo';
	$assunto='Status do seu prostesto ou congratulação';
	
	$query = mysql_query("INSERT INTO reclamacao(email, departamento, registrar, mensagem, dtnasc	, estatus, cadastro) VALUES ('$email', '$departamento', '$registrar', '$mensagem', '$dtnasc', '$estatus', now())") or die(mysql_error());

                  
	$to = $email;
	$subject = "$assunto";
	$message = "<strong><h1>Seu processo foi aberto com sucesso aguarde nosso contato pelo e-mail com status da sua Reclamacao</h1> </strong><br/><br/>";
	$header = "MIME-Version: 1.0\n";
	$header .= "Content-type: text/html; charset=iso-8859-1\n";
	$header .="From:ADM de Reclamacao\n"; 
	mail($to, $subject, $message, $header);
	
mysql_close($con);
		
?>
<p><p><p><label><h3><a href="formularioRecla.php">Clique aqui.</a> para realizar um nova Reclamação</h3></label>
<br><br><p><p>

<label><h3>	Ou <a href="logout.php?act=logout">clique aqui</a> para sair</h3></label>

</body>
</html>