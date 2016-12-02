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
<input type="button" value="cadastrar um novo usuario" onClick="location.href='cadastroAdm.html';"> 

				<form	 action="relatorio2.php" method="post">
		
				<label><h3>Selecione status:</h3>
					<select name = "status" id= "status">
					<option value = "Selecione"> Selecione </option>
					<option value = "Novo"> Novo </option>
					<option value = "Pendente"> Pendente </option>
					<option value = "Concluido"> Concluido </option>
					</select></label>
					<input type = "submit" name = "envia" value = "filtrar">
		
	<fieldset>
	<legend>FILA PARA TRATAMENTO DAS RECLAMACOES </legend>
<?php	

$con = mysql_connect("localhost", "root", "thaand17012015");
		if (!$con){
			die ('Erro de conexão:' .mysql_erro());
			
		}
	mysql_select_db("cadastro", $con);
	
		
	echo '<table boder rules =all cellspacing=4 cellpadding=8>';
	echo '<tr>';
	echo '<th>ID</th>';
	echo '<th>DEPARTAMENTO</th>';
	echo '<th>REGISTRO</th>';
	echo '<th>STATUS DA RECLAMACAO</th>';
	echo '<th>DATA DA ABERTURA DA RECLAMACAO</th>';
	echo '<th>Detalhar</th>';
	echo '</tr>';
	echo '<tbody>';
	
	$query = mysql_query('SELECT * FROM reclamacao where estatus=\'Novo\' or estatus=\'Pendente\'');
	while($esc = mysql_fetch_assoc($query)){
	echo '<tr>';
    echo '<td>' . $esc['id'] . '</td>';
	echo '<td>' . $esc['departamento'] . '</td>';
	echo '<td>' . $esc['registrar'] . '</td>';
	echo '<td>' . $esc['estatus'] . '</td>';
	echo '<td>' . $esc['cadastro'] . '</td>';
	echo '<td><a href=\'ocorrenciar.php?idd='.$esc['id'].'\'>Detalhar/Ocorrenciar</a></td>';
	echo '</tr>';
		
	
	
}
	echo"</table>";
	
	mysql_close($con);
		
?>
</fieldset>
</body>
</html>