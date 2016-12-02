<?php 


   $con = mysql_connect("localhost", "root", "thaand17012015") or die('Erro de conexão:' .mysql_erro());
    
   if(mysql_query("CREATE DATABASE cadastro", $con)){
       echo 'Banco de dados e tabelas criado com sucesso';
   }
   else {
       die('Erro criando o banco de dados'.mysql_error());
  }
  
  mysql_select_db("cadastro") or die(mysql_error());
  mysql_query("create table if not exists cadastrousuario(
id int(7) unsigned not null AUTO_INCREMENT,
nome varchar(60) not null,
sobrenome varchar(200) not null,
senha varchar(14) not null,
email varchar(200) not null,
nivel int(1) unsigned not null default 1,
ativo bool not null default 1,
cadastro datetime not null,
primary key (email),
unique key (id),
key(nivel) 
) engine=myisam;") Or die(mysql_error());

 mysql_select_db("cadastro") or die(mysql_error());
 mysql_query("create table if not exists reclamacao(
id int(20) unsigned not null AUTO_INCREMENT,
email varchar(200) not null,
departamento varchar(20) not null,
registrar varchar(20) not null,
mensagem text,
dtnasc varchar(10) not null,
estatus varchar(9) not null,
cadastro datetime not null,
primary key (id)
) engine=myisam;") Or die(mysql_error());



mysql_select_db("cadastro") or die(mysql_error());
mysql_query("create table if not exists ocorrenciar(

idc int(7) unsigned not null AUTO_INCREMENT,
id int(7) not null,
emailadm varchar(200) not null,
emailusu varchar(60) not null,
cadastro datetime not null,
Comentario longtext,
primary key (idc)
) engine=myisam;") Or die(mysql_error());

  mysql_close($con);
  
?>
 