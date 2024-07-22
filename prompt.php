<?php

require("optoApi/conexaoPDO.php");

session_start();
if(!isset($_SESSION['OPTO1'])){
    echo '<script>window.location.href="login.php"</script>';
}

//$subCategoryID = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OPTO1</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mt-5">E-mail Marketing</h2>
        <form id="serviceForm">
          <div class="form-group">
            <label for="responseText">Response</label>
            <textarea class="form-control" id="responseText" rows="3" readonly></textarea>
          </div>
          <div class="form-group">
            <label for="serviceInput">E-mail Marketing</label>
            <input type="text" class="form-control" id="serviceInput" placeholder="Enter service name">
          </div>
          <!-- Hidden input to store subCategoryID -->
          <input type="hidden" id="subCategoryID" value="">
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- OPTO JS -->
  <script src="opto/js/opto.js"></script>
  <!-- Custom JS -->
  <script>
    $(document).ready(function() {

      var promptID = localStorage.getItem("promptID");
      alert(promptID)

      loadFullTextPrompt(promptID);

      /*
      $('#serviceForm').on('submit', function(event) {
        event.preventDefault();
        const serviceName = $('#serviceInput').val();
        const subCategoryID = $('#subCategoryID').val();
        $.ajax({
          url: 'process.php',
          type: 'POST',
          data: { serviceName: serviceName, subCategoryID: subCategoryID },
          success: function(response) {
            $('#responseText').val(response);
          },
          error: function(xhr, status, error) {
            $('#responseText').val('An error occurred: ' + error);
          }
        });
      });
      */
    });
  </script>
</body>
</html>
