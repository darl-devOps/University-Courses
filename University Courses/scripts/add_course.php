<?php
//Denying access to script files
http_response_code(403);

//Connection script containing the connection parameters "required" in the file
require("conn.php");



//Retreiving the data the user entered from the add course form
$course_title = ucwords($_POST["course-title"]);//Capitalizes the first letter of each word of the entry
$course_code = strtoupper($_POST["course-code"]);//Converts the input to  uppercase
$level_of_study = ucwords($_POST["level-of-study"]);
$tuition_fees = $_POST["tuition-fees"];
$int_students = $_POST["no-of-int"];
$loc_students = $_POST["no-of-loc"];
$enrolled_students = $_POST["enrolled-students"];
$starting_date = $_POST['starting-date'];
$course_duration = $_POST['course-duration'];
$course_location = ucwords($_POST['course-location']);

//SQL statement to check the database if there is an existing course title and code before the user adds the course
$course_duplicate_check = "SELECT * FROM courses WHERE course_title = '$course_title' or course_code = '$course_code'";

//Executing the above course_check statement and storing the result in a variable
$course_check = mysqli_query($conn, $course_duplicate_check);


//Checking if the statement returned any rows. If so, then an error would be returned and the execution of the script is terminated
if(mysqli_num_rows($course_check) > 0){

    header("Location: ../addCourse.php?status=duplicate");
}

else{

    //SQL statement to insert retreived data into courses table in the database
    $sql = "INSERT INTO courses
            (course_title, course_code, course_level, tuition_fees, international_students, local_students, students_enrolled, starting_date, course_duration, course_location)
            VALUES('$course_title', '$course_code', '$level_of_study', '$tuition_fees', '$int_students', '$loc_students', '$enrolled_students', '$starting_date', '$course_duration', '$course_location')";


    //Executing the sql statement 
    if(mysqli_query($conn, $sql)){

        header("Location: ../addCourse.php?status=success");
    }
    else{

        header("Location: ../addCourse.php?status=error");

    }

}


//Closing the database connection
mysqli_close($conn);


?>