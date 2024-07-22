<?php

session_start();
if (isset($_SESSION['OPTO1'])) {
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
    <div class="row justify-content-center">
      <div class="col-md-4">
        <h2 class="text-center">Login</h2>
        <form id="login">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="Lemail" name="Lemail" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="Lpassword" name="Lpassword" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
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
            $('#login').submit(function(event) {
                event.preventDefault();
                
                $.ajax({
                    url: "optoApi/loginUser.php",
                    type: "GET",
                    crossDomain: true,
                    data: "Lemail="+email+"&Lpassword="+password,
                    success: function(retorno){
                        if(retorno == "ok"){
                            retorno = 'ok';
                            window.location.href="dashboard.php";
                        }else if(retorno == "erro1"){
                            alert("Incorrect Password!");
                            retorno = 'erro1';
                        }else if(retorno == "erro2"){
                            alert("This User does not Exist!");
                            retorno = 'erro2';
                        }
                    },
                    error: function(){
                        alert("erro");
                    }
                })

            });
        });
    </script>
</body>

</html>