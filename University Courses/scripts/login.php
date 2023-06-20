<?php
//Denying access to script files
http_response_code(403);

//Connection script containing the connection parameters "required" in the file
require("conn.php");
//Starting a session
session_start();

// Checking if the user has submitted the login form
if (isset($_POST['login'])) {

    //Get username and password from the login form submitted
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Check database for the username and password entered by the user
    $sql = "SELECT * FROM users WHERE
            username = '$username' and password = '$password'";

    $result = mysqli_query($conn, $sql);

    //If the credentials are correct, set session variables and redirect to courseReport.html

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: ../courseReport.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Invalid Login Credentials. Try Again";
        header("Location: ../index.php");
        exit();
    }


}


?>