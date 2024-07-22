<?php

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
header('Content-Type: text/html; charset=utf-8');

require("conexaoPDO.php");

$text = $_GET['text'];
$promptID = $_GET['promptID'];


$sqlinsert = mysqli_query($conexao, "INSERT INTO gpttext (text, promptID)VALUES('$text', '$promptID')"); 

echo "ok";

