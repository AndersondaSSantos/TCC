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
<?php

$con = mysql_connect("localhost", "root", "thaand17012015");
		if (!$con){
			die ('Erro de conexão:' .mysql_erro());
			
		}
	mysql_select_db("cadastro", $con);
	
	
	$idd= $_SESSION['idd'];
	$email = $_SESSION['email'];					
	$ocorrenciar = $_POST['ocorrenciar'];
	
	
	$verifica = mysql_query("SELECT * FROM reclamacao WHERE id=$idd") or die("erro ao selecionar");
    while ($resultado=mysql_fetch_array($verifica)){
	
	$emailadm = $email;
	$emailusu = $resultado['email'];
	$estatus = 'Pendente';
	$estatuss = 'Concluido';
	$assunto='Status do seu prostesto ou congratulação';
	}
	switch ($_POST['envia']) {
case 'Ocorrenciar':
		$query = mysql_query("INSERT INTO ocorrenciar(id, emailadm, emailusu, cadastro, Comentario) VALUES ('$idd', '$emailadm', '$emailusu', now(), '$ocorrenciar' )") or die(mysql_error());
		
		$query = mysql_query("UPDATE reclamacao SET estatus='$estatus' WHERE id=$idd");
		echo"<script language='javascript' type='text/javascript'>alert('Ocorrencia efetuado com sucesso ')</script>";
	
	$to = $emailusu;
	$subject = "$assunto";
	$message = "<strong>Seu processo está pendente segue a trativa até agora: </strong> $ocorrenciar<br/><br/>";
	$header = "MIME-Version: 1.0\n";
	$header .= "Content-type: text/html; charset=iso-8859-1\n";
	$header .="From:$email\n"; 
	mail($to, $subject, $message, $header);
	
   break;
   
case 'Ocorrenciar e Finalizar':

		$query = mysql_query("INSERT INTO ocorrenciar(id, emailadm, emailusu, cadastro, Comentario) VALUES ('$idd', '$emailadm', '$emailusu', now(), '$ocorrenciar' )") or die(mysql_error());
		
		$query = mysql_query("UPDATE reclamacao SET estatus='$estatuss' WHERE id=$idd");
		echo"<script language='javascript' type='text/javascript'>alert('Ocorrencia efetuado com sucesso ')</script>";
		
	$to = $emailusu;
	$subject = "$assunto";
	$message = "<strong>Processo finalizado segue resposta final: </strong> $ocorrenciar<br/><br/>";
	$header = "MIME-Version: 1.0\n";
	$header .= "Content-type: text/html; charset=iso-8859-1\n";
	$header .="From:$email\n"; 
	mail($to, $subject, $message, $header);
	

	
   
   break;
   
   default:
	}
mysql_close($con);
?>
<input type="button" value="Voltar para fila" onClick="location.href='relatorio.php';"> 
	
	</body>
	</html>