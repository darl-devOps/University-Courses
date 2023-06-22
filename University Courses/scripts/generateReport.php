<?php
session_start();
require('conn.php');

if (isset($_POST['generate-report'])) {
    // Get all selected course IDs
    // if(isset($_POST['$selected_courses']))
    // {
        $selected_course_ids = $_POST['selected-courses'];
        // Initialize empty arrays to hold course codes and module data
        $course_codes = [];
        $module_data = [];
        $courseData = [];

        // Loop through the selected course IDs
        foreach ($selected_course_ids as $selected_course_id) {
            // Query the courses table to get the course code
            $query = "SELECT course_code FROM courses WHERE id = '$selected_course_id'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $course_code = $row['course_code'];
            // Add the course code to the array of course codes
            $course_codes[] = $course_code;

            // Query the modules table for the corresponding modules
            $query = "SELECT * FROM modules WHERE course_code = '$course_code'";
            $query2 = "SELECT * FROM courses WHERE course_code = '$course_code'";
            $result = mysqli_query($conn, $query);
            $result2 = mysqli_query($conn, $query2);

            // Store the module data in an array
            $modules = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $modules[] = $row;
            }

            // Store the course title data in an array
        // Store the course title data in an array
        
            $courseTitles = [];
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $courseTitles[] = $row2;
            }
                    // Add the array of modules to the module data array
                    $module_data[] = $modules;

                    // Add the array of course tutles to the courseData data array
                    $courseData[] = $courseTitles;
                }

        

            // Redirect the user to the page that displays the modules with the course IDs and course codes as arrays
            if (!empty($course_codes)) {
                $course_ids_str = implode(',', $selected_course_ids);
                $course_codes_str = implode(',', $course_codes);
                $_SESSION['course_ids'] = $course_ids_str;
                $_SESSION['course_codes'] = $course_codes_str;
                $_SESSION['module_data'] = $module_data;
                $_SESSION['courseData'] = $courseData;
                header("Location: ../generatedCourseReport.php");
                exit();
            } else {
                // Display an error message if no modules were found for any of the selected courses
                echo "No modules found for the selected courses.";
            }
        }else{
            //     echo "<h4 class = 'error-report-gen'>No courses selected to generate a report. Kindly go back and select a course or a few courses.</h4>";
            // }
//     echo "<h4 class = 'error-report-gen'>No courses selected to generate a report. Kindly go back and select a course or a few courses.</h4>";
// }
}
?>