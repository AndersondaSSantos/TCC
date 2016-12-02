<?php
	$conecta = mysql_connect("localhost", "root", "thaand17012015") or print (mysql_error()); 
mysql_select_db("cadastro", $conecta) or print(mysql_error("Erro de conexão com banco de dados")); 
mysql_close($conecta); 
?>