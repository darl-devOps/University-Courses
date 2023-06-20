<?php
//Denying access to script files
http_response_code(403);

session_start();
session_destroy();
header("Location: ../index.php");
exit();

?>