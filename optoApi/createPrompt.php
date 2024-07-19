<?php

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
header('Content-Type: text/html; charset=utf-8');

require("userInfo.php");


$subCategory = $_GET['id'];

$sqlInser = mysqli_query($conexao, "INSERT INTO prompts (user_id, subCategory_id, creation_date)VALUES('$userID', '$subCategory', NOW())") or die(mysqli_error($conexao));

$promptID = mysqli_insert_id($conexao);

echo $promptID;