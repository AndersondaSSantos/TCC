<?php

    
	$nomecompleto	= $_POST["nomecompleto"];
	$senha = $_POST["senha"];
	$email = $_POST["email"];
	$erro = 0;
	
		if (empty($nomecompleto) OR strstr ($nomecompleto, ' ')==false)
			{echo "<br>Campo Nome Completo eh de preenchimento obrigatorio .<br>"; $erro=1;}
		if ($senha == '')
			{echo "<br>Campo Senha eh obrigatorio.<br>"; $erro=1;}
		if (strlen($email)<8 || strstr($email, '@')==false)
			{echo "<br>e-mail invalido.<br>"; $erro=1;}
		if ($erro==1)
		{echo '<br><br><br /><a href="cadastro.html" >Votar</a>';
			}
		if ($erro==0)
		{ 
			include "inserirdadosadm.php";
			}
			
		
?>
