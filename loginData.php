<?php

session_start();
if(isset($_SESSION['OPTO1'])){
    echo '<script>window.location.href="login.php"</script>';
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
                <h2 class="mb-4">LOGIN DATA</h2>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <form id="loginData">
                    <div class="form-group">
                        <label for="name">Login Email</label>
                        <input type="email" class="form-control" id="Lemail" name="Lemail" placeholder="Enter your Email">
                    </div>
                    <div class="form-group">
                        <label for="email">Password</label>
                        <input type="password" class="form-control" id="Lpassword" name="Lpassword" placeholder="Enter your Password">
                    </div>
                    <div class="form-group">
                        <label for="message">Rewrite Password</label>
                        <input type="password" class="form-control" id="Lrpassword" name="Lrpassword" placeholder="Rewrite Password">
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
            $('#loginData').submit(function(event) {
                event.preventDefault();
                
                var formData = $(this).serialize();

                var Cname = localStorage.getItem("Cname");
                var Cemail = localStorage.getItem("Cemail");
                var Cdescription = localStorage.getItem("Cdescription");

                //alert(formData+"&Cname="+Cname+"&Cemail="+Cemail+"&Cdescription="+Cdescription);
                $.ajax({
                    url: "optoApi/setNewUser.php",
                    type: "GET",
                    crossDomain: true,
                    data: formData+"&Cname="+Cname+"&Cemail="+Cemail+"&Cdescription="+Cdescription,
                    success: function(data){

                            var Lemail = $("#Lemail").val();
                            var Lpassword = $("#Lpassword").val();
                            window.location.href="optoApi/loginUser.php?Lemail="+Lemail+"&Lpassword="+Lpassword+"&newlogin=ok";
                            
                    },
                    error: function(){
                        alert("erro");
                    }
                })
                //window.location.href="loginData.php";

            });
        });
    </script>
</body>
</html>