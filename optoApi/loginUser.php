<?php

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
header('Content-Type: text/html; charset=utf-8');

include('conexaoPDO.php');

session_start();

    $email = trim($_GET['Lemail']);
	$password = md5($_GET['Lpassword']);
	$verificadorDeOrigem = $_GET['newlogin'];

	require("conexaoPDO.php");
	//$email = mysql_real_escape_string($conexao, $_POST['email']);
	//$password = mysql_real_escape_string($conexao, $_POST['password']);
	$selectUser = "SELECT * FROM users WHERE loginEmail = '$email' AND loginPassword = '$password'";
	$runUser = mysqli_query($conexao, $selectUser) or die(mysqli_error($conexao));
	$verifica = mysqli_num_rows($runUser);
	//echo '<script>alert("'.$verifica.'")</script>';
	if($verifica != 0){
		session_start();
		$_SESSION['OPTO1'] = $email;
		echo 'ok';
		if(isset($verificadorDeOrigem)){
			echo '<script>window.location.href="../dashboard.php"</script>';
		}
	}else{
		echo 'erro2';
	}
