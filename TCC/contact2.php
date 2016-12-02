<html>
	<head>
		<title>enviando email</title>
	</head>
	
	<body>
	<?php
	$nome='anderson';
	$email='solixiquexique@gmail.com';
	$assunto='teste';
	$mensagem='testando';
	
	$to = "solixiquexique@hotmail.com";
	$subject = "$assunto";
	$message = "<strong>Nome: </strong> $nome<br/><br/> <strong>Email: </strong> $email<br/><br/> <strong>Assunto: </strong> $assunto<br/><br/> <strong>Mensagem: </strong> $mensagem<br/><br/>";
	$header = "MIME-Version: 1.0\n";
	$header .= "Content-type: text/html; charset=iso-8859-1\n";
	$header .="From:$email\n"; 
	mail($to, $subject, $message, $header);
	
	echo "Mensgem enviada com sucesso!";
	?>
	
	
	</body>
</html>