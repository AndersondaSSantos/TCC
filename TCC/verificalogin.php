<?php

    $email = $_POST['email'];
    $envia = $_POST['envia'];
    $senha = $_POST['senha'];
    $connect = mysql_connect("localhost", "root", "thaand17012015");
    $db = mysql_select_db("cadastro");
        if (isset($envia)) {
                     
            $verifica = mysql_query("SELECT * FROM cadastrousuario WHERE email = '$email' AND senha = '$senha'") or die("erro ao selecionar");
                if (mysql_num_rows($verifica)<=0){
                    echo"<script language='javascript' type='text/javascript'>alert('email e/ou senha incorretos');window.location.href='login.html';</script>";
                    die();
                }else{
					$verifica2 = mysql_query("SELECT * FROM cadastrousuario WHERE email = '$email' AND senha = '$senha'") or die("erro ao selecionar");
                $resultado=mysql_fetch_array($verifica2);
				$permissao=$resultado['nivel'];
				if($permissao=="1"){
					session_start();
						$_SESSION['email'] = $email;
						$_SESSION['nivel'] = $permissao;
					setcookie("email",$email);
                    header("Location:relatorio.php");
					
				}else{
					if($permissao=="2"){
						session_start();
						$_SESSION['email'] = $email;
						$_SESSION['nivel'] = $permissao;
										
						setcookie("email",$email);
                    header("Location:formularioRecla.php");
						
					}
					
				}	
					
					
				}
        }
		
        
?>