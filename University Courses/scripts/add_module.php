<?php
//Denying access to script files
http_response_code(403);

//Connection script containing the connection parameters "required" in the file
require('conn.php');

//Retrieving course data the user entered

$course_code = strtoupper($_POST['course-code']);
$module_code = ucwords($_POST['module-code']);
$module_name = ucwords($_POST['module-name']);
$module_credits = $_POST['module-credits'];


//SQL statement to check the database if there is an existing course title and code before the user adds the course
$module_duplicate_check = "SELECT * FROM modules WHERE module_name = '$module_name' or module_code = '$module_code'";

//Executing the above course_check statement and storing the result in a variable
$module_check = mysqli_query($conn, $module_duplicate_check);

//Checking if the statement returned any rows. If so, then an error would be returned and the execution of the script is terminated
if(mysqli_num_rows($module_check) > 0){

    header("Location: ../courseReport.php?status=exists");
}

else{

        //SQL statement to insert retreived data into courses table in the database
        $sql = "INSERT INTO modules
        (course_code, module_code, module_name, module_credits)
        VALUES('$course_code', '$module_code', '$module_name', '$module_credits')";

        //Executing the sql statement 
    if(mysqli_query($conn, $sql)){

        header("Location: ../courseReport.php?status=addedMod");
    }
    else{

        header("Location: ../courseReport.php?status=negAddMod");

    }

}



//Closing the database connection
mysqli_close($conn);


?>