<?php

//**EXEMPLO DE FUNCIONAMENTO*** $Connection = new mysqli( 'localhost', 'usuario', 'senha', 'nome_da_db' );

/*$conexao = mysqli_connect("mariadb-012.wc1.lan3.stabletransit.com", "2022002_anatomy", "Password1234", "2022002_anatomytracker");

if(mysqli_connect_errno()){
	echo 'Erro na conexão:'.mysqli_connect_errno();
}*/

$conexao = mysqli_connect("localhost", "root", "", "opto1");

if(mysqli_connect_errno()){
	echo 'Erro na conexão:'.mysqli_connect_errno();
}



?>