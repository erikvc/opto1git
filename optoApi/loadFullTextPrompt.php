<?php

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
header('Content-Type: text/html; charset=utf-8');


require("conexaoPDO.php");

$promptID = $_GET['id'];

$sqlGet = mysqli_query($conexao, "SELECT * FROM gpttext WHERE prompt_id = '$promptID'") or die(mysqli_error($conexao));

$array_retorno = array();

while($rows = mysqli_fetch_array($sqlGet)){
	
	$enviarArray['id'] = $rows['id'];
	$enviarArray['text'] = $rows['text'];
	
	array_push($array_retorno, $enviarArray);
	
}


echo json_encode($array_retorno);
