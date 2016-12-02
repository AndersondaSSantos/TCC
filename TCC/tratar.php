<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Detalhe da Reclamação</title>
		
		<link href="css/2.css" type="text/css" rel="stylesheet"/>		
		<meta charset= utf-8>
	</head>
	<body>
	
<?php 

$idd = $_GET['idd']	;
echo $idd;			
	
	$con = mysql_connect("localhost", "root", "thaand17012015");
		if (!$con){
			die ('Erro de conexão:' .mysql_erro());
			
		}
	mysql_select_db("cadastro", $con);
$query = mysql_query("SELECT * FROM reclamacao WHERE id=$idd") or die("Nao foi possivel conectar ao banco de dados");
	while($exi = mysql_fetch_array($query)){
		$id = $exi["id"];
		$email = $exi["email"];
		$departamento = $exi["departamento"];
		$registrar = $exi["registrar"];
		$mensagem = $exi["mensagem"];
		$dtnasc = $exi["dtnasc"];
		$estatus = $exi["estatus"];
		$cadastro = $exi["cadastro"];
	
echo "Resultado:$id, $email, $departamento, $registrar, $mensagem, $dtnasc, $estatus, $cadastro;";
	}
echo "<header> Estilizando um elemento html sem a necesse de classe(.) ou id(#) </header>";
	?>
	
<div id="header">
<h1>teste</h1></div>
	<div id="content">
	<div id="feature">
	<p>Feature</p>
	</div>
	<div class="column1">
	<p>Column TWO</p>
	</div>
	</div>
	
	
	
	
	
	
</body>
 </html>