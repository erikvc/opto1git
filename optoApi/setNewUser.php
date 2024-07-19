<?php

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
header('Content-Type: text/html; charset=utf-8');

require("conexaoPDO.php");

$Cname = $_GET['Cname'];
$Cemail = $_GET['Cemail'];
$Cdescription = $_GET['Cdescription'];
$Lemail = $_GET['Lemail'];
$Lpassword = md5($_GET['Lpassword']);


$sqlGet = mysqli_query($conexao, "SELECT * FROM users WHERE loginEmail = '$Lemail'"); 
$contagem = mysqli_num_rows($sqlGet);

if($contagem == 0){
    $sqlInsertUser = mysqli_query($conexao, "INSERT INTO users (companyName, companyEmail, companyDescription, loginEmail, loginPassword)VALUES('$Cname', '$Cemail', '$Cdescription', '$Lemail', '$Lpassword')") or die(mysqli_error($conexao));

    echo 'ok';
}else{
    echo 'ok';
}
