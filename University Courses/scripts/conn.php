<?php
//Denying access to script files
http_response_code(403);

//Connection parameters
 $serverName = "localhost";
 $username = "root";
 $password = "localhost://_";
 $dbName = "uniCourses";

 //Create database connection
 $conn = new mysqli($serverName,$username,$password,$dbName);

 //Check the database connection
 if($conn -> connect_error){
    die("Database Connection Failed: ".$conn->connect_error);
 }
//  else{
//     echo "Database Connection Succesful";
//  }

?>