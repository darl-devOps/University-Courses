<?php
//Denying access to script files
http_response_code(403);


session_start();

//Checking for the session variable else redirect to login page
if(!isset($_SESSION['username'])){
    header("Location: ./index.php");
    exit();
}



?>