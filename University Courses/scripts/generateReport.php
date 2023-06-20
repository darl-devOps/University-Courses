<?php

require('conn.php');

if(isset($_POST['generate-report'])){
    $selectedCourseIds = $_POST['course_id'];

    //Encoding the course IDs in JSON
    $selectedCourseIdsJson = json_encode($selectedCourseIds);

    //Storing the selected course IDs as a JSON encoded string in a hidden input field
    echo
    '<script>
    document.querySelector(\'input[name="selected-courses"]\').value=\".$selectedCourseIdsJson."\';
    </script>';

}

?>