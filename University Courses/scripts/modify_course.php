<?php
require('conn.php');

//Checking if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    //Fetching the form data
    $course_id = $_POST["course-id"];
    $course_title = ucwords($_POST["course-title"]);
    $course_code = strtoupper($_POST["course-code"]);
    $course_level = ucwords($_POST["level-of-study"]);
    $tuition_fees = $_POST["tuition-fees"];
    $starting_date = $_POST["starting-date"];
    $course_duration = $_POST["course-duration"];
    $course_location = ucwords($_POST["course-location"]);

    //Update the course data
    $updateQuery = "UPDATE courses SET course_title='$course_title', course_code='$course_code', course_level='$course_level',tuition_fees='$tuition_fees', starting_date='$starting_date', course_duration='$course_duration', course_location='$course_location' WHERE id='$course_id'";
    $result = mysqli_query($conn, $updateQuery);

    if($result){
        //Redirect to courseReport page with a success query string
        header("Location: ../courseReport.php?update=true");
        exit;
    }
    else{
        header("Location: ../modifyCourse.php?update=false");

    }

    mysqli_close($conn);

}
else {
    // Get the course ID from the URL parameter
    $course_id = $_GET["id"];
  

    $query = "SELECT * FROM courses WHERE id='$course_id'";
    $result = mysqli_query($conn, $query);
  
    if(mysqli_num_rows($result) > 0) {
      $course = mysqli_fetch_assoc($result);
    } else {
      echo "Course not found";
    }
  
    mysqli_close($conn);
  }


?>