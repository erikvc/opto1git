<?php
require("optoApi/conexaoPDO.php");


session_start();
if(!isset($_SESSION['OPTO1'])){
    echo '<script>window.location.href="login.php"</script>';
}

if(isset($_GET['logout']) && $_GET['logout'] == 'ok'){

    unset($_SESSION['OPTO1']);

    session_destroy();

    header('location:login.php');

}


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPTO1</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="opto/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center my-5">Dashboard</h1>
        <p><a href="?logout=ok">logout</a></p>
        <div class="row">
            <div class="col-md-6">
                <div class="column-content">
                    <h2>Categories</h2>
                    <ul>
                        <?php 
                            $sqlGetCategory = mysqli_query($conexao, "SELECT * FROM categories");
                            while($rowsCategories=mysqli_fetch_array($sqlGetCategory)){
                        ?>
                        <li><a href="#" onclick="return openSubCategory(<?php echo $rowsCategories['id']; ?>);"><?php echo $rowsCategories['name']; ?></a></li>
                        <?php } ?>
                    </ul>
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="column-content">
                    <h2>Chat List</h2>
                    <ul>
                        <li><a href="#" id="categoryBTO" onclick="return openCategory();">Email Marketing</a></li>
                        <li><a href="#">Social Media</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="column-content">
                    <h2>Categories</h2>
                    <section id="recebeBTO" class="container flex flex-wrap">
                        
                    </section>
                </div>
            </div>
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- OPTO JS -->
    <script src="opto/js/opto.js"></script>
    <!-- Custom JS -->
    <script>
        $(document).ready(function() {

        });
    </script>
</body>
</html>