<?php

session_start();
if(isset($_SESSION['OPTO1'])){
    echo '<script>window.location.href="dashboard.php"</script>';
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

        <div class="row d-flex justify-content-center">
            <div class="col-12 d-flex justify-content-center pt-4">
                <h2 class="mb-4">LET´S START</h2>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <form>
                    <div class="form-group">
                        <label for="name">Company Name</label>
                        <input type="text" class="form-control" id="Cname" name="Cname" placeholder="Enter Company Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Company Email</label>
                        <input type="email" class="form-control" id="Cemail" name="Cemail" placeholder="Enter Company Email">
                    </div>
                    <div class="form-group">
                        <label for="message">Company Description</label>
                        <textarea class="form-control" id="Cdescription" name="Cdescription" rows="3" placeholder="Enter Company Description"></textarea>
                    </div>
                    <input type="hidden" name="acao" value="acao">
                    <button type="submit" class="btn btn-primary">next</button>
                </form>
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
            $('form').submit(function(event) {
                event.preventDefault();
                
                var Cname = $("#Cname").val();
                var Cemail = $("#Cemail").val();
                var Cdescription = $("#Cdescription").val();

                localStorage.setItem("Cname", Cname);
                localStorage.setItem("Cemail", Cemail);
                localStorage.setItem("Cdescription", Cdescription);

                window.location.href="loginData.php";

            });
        });
    </script>
</body>
</html>