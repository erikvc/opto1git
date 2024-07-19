<?php

require("conexaoPDO.php");

session_start();

$emailSession = $_SESSION['OPTO1'];

$userInfo = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM users WHERE loginEmail = '$emailSession'"));
$userID = $userInfo['id'];
$companyName = $userInfo['companyName'];

