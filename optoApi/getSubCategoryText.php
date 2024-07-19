<?php

require("conexaoPDO.php");

$subCategoryID = $_GET['id'];

$sqlGet = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM text WHERE subCategory_id = '$subCategoryID'"));

echo $sqlGet['text'];