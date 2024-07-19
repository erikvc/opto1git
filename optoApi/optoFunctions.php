<?php

//LOGOUT*************************************************



if(isset($_GET['logout']) && $_GET['logout'] == 'ok'):

    unset($_SESSION['OPTO1']);

    session_destroy();

    header('location:login.php');

endif;



//LOGOUT*************************************************/