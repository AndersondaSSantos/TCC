<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Ocorrenciar</title>
		
		<link href="css\1.css" type="text/css" rel="stylesheet"/>
		<meta charset= utf-8>
	</head>
	<body>
<div id= "dois">	
	<?php 
if (!isset ($_SESSION)) session_start();

$nivel_necessario =1;

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
	<div id= "um">


	<?php
	echo"<script language='javascript' type='text/javascript'>alert('Atençao ao ocorrenciar a reclamação o mesmo ficara pendente. Para finalizar a Reclamação digite o botão Ocorrenciar e Finalizar ')</script>";
	echo"<script language='javascript' type='text/javascript'>alert('Atençao toda e qualquer ocorrencia será enviado o e-mail para o Reclamante ')</script>";
		
	
	$email = $_SESSION['email'];
					
	$idd= $_GET['idd'];
	
	$connect = mysql_connect("localhost", "root", "thaand17012015");
    $db = mysql_select_db("cadastro");
	$verifica = mysql_query("SELECT * FROM reclamacao WHERE id=$idd") or die("erro ao selecionar");
    while ($resultado=mysql_fetch_array($verifica)){
	
	
	echo"<hr /><br />";
	$_SESSION['idd'] = $idd;
	
	$departamento = $resultado['departamento'];
	$mensagem = $resultado['mensagem'];
	
	echo"<h2>Detalhe da Reclamação</h2>";
	echo "<h3>ID:$idd</h3>";
	echo "<br>";
	echo "<h3>Contexto da Reclamação:$mensagem</h3>";	
	echo"<hr /><br /><br />";
	
	}
	
	?>

</div>

<br />
		<form name="commentform" method="post" action="inseriroco.php" >
		Registrar Acoes:<p> <textarea name="ocorrenciar" cols="60" rows="10" placeholder="Escreva aqui..."/></textarea><br>
		<input type = "reset" name = "limpar" value = "Limpar">
		<input type = "submit" name = "envia" value = "Ocorrenciar">
		<input type = "submit" name = "envia" value = "Ocorrenciar e Finalizar">
		<input type="button" value="Voltar" onClick="history.go(-1)"> 
	
			</form>
	
<?php	
	$idd= $_GET['idd'];
	$connect = mysql_connect("localhost", "root", "thaand17012015");
    $db = mysql_select_db("cadastro");
	$verifica = mysql_query("SELECT * FROM ocorrenciar WHERE id=$idd ORDER BY idc desc") or die("erro ao selecionar");
          if (mysql_num_rows($verifica)>0){
			  while($li= mysql_fetch_array($verifica)){
				  echo"<hr />";
				  $emailadm = $li['emailadm'];
				  $Comentario= $li['Comentario'];
				  $cadastro=$li['cadastro'];
				  echo "Ocorrenciado por:$emailadm<br>";
				  echo "Ocorrencia:$Comentario<br>";
				  echo "Data do ultimo registro:$cadastro<br>";
				  
				  echo"<hr /><br /><br />";
			  }
		  }  else{
			  echo "Ainda não existe Ocorrencia para essa Reclamação";
			  
		  }
   
   ?>
	</body>
	</html>