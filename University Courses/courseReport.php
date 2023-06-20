<?php
include('scripts/session_auth.php');

require('scripts/conn.php');

//If statements for error handling and validating the course modification and deletion process. Success and error query strings are used to check for successful inserting of data, duplicate data and error in general

if (isset($_GET['operationDel']) && $_GET['operationDel'] === 'success') {
    echo
        "<script>
    alert('Course Record Deleted Succesfully!');
    </script>";
}
else if(isset($_GET['status']) && $_GET['status'] === 'addedMod'){

    echo
    "<script>
    alert('Module Added Successfully!');
    </script>";

}
else if (isset($_GET['operationDel']) && $_GET['operationDel'] === 'error') {
    echo
        "<script>
    alert('Oops! There was a problem on our end, please try again.');
    </script>";
} 
 else if (isset($_GET['update']) && $_GET['update'] === 'true') {
    echo
        "<script>
    alert('Course Updated Successfully!');
    </script>";
} elseif (isset($_GET['update']) && $_GET['update'] === 'false') {
    echo
        "<script>
    alert('Oops! There was a problem on our end, please try again.');
    </script>";

}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Report | University Courses</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Header -->
    <header>
        <p class="header-text"> University Courses - Course Report</p>
        <p class="username-text">Hello,  <span><?php echo $_SESSION['username'] ?></span>&nbsp;&nbsp;&nbsp;<a class="logout-text" href="scripts/logout.php">Logout</a></p>
    </header>

    <div class="container">
        <!-- Side Navigation -->
        <div class="side-navigation">
            <a href="#">View Course(s)</a>
            <a href="addCourse.php">Add New Course</a>
        </div>

        <!-- Course Display Container in Tabular Format -->
        <div class="course-report-container">
        <h2 class="course-hero-text">All Available University Courses</h2>
        <form method="POST" action="scripts/generateReport.php">
            <table id="courses" cellspacing="1" cellpadding="20px">
                <tr class="header-table-head">
                    <th></th>
                    <th>
                        <h4>Course Title</h4>
                    </th>
                    <th>
                        <h4>Course Code</h4>
                    </th>
                    <th>
                        <h4>Level of Study</h4>
                    </th>
                    <!-- <th>
                        <h4>School / Faculty</h4>
                    </th> -->
                    <th>
                        <h4>Tuition Fees (GBP)</h4>
                    </th>
                    <th>
                        <h4>Starting Date</h4>
                    </th>
                    <th>
                        <h4>Duration (Year(s))</h4>
                    </th>
                    <th>
                        <h4>Location</h4>
                    </th>
                    <th>
                        <h4>Operations</h4>
                    </th>
                </tr>

                    <?php

                    // SQL statement to fetch all the entries in the table in ascending order of the course title
                    $fetch_courses_query = "SELECT * FROM courses ORDER BY course_title ASC";

                    //Executing the query
                    $query_result = mysqli_query($conn, $fetch_courses_query);


                    if (mysqli_num_rows($query_result) > 0) {

                        while ($course = mysqli_fetch_assoc($query_result)) {

                            ?>
                                        <tr>
                                            <td><input type="checkbox" name="course_id[]" value="<?php echo $course['id']; ?>"></td>
                                            <td><?php echo $course['course_title']; ?></td>
                                            <td><?php echo $course['course_code']; ?></td>
                                            <td><?php echo $course['course_level']; ?></td>
                                            <!-- <td><?php echo $course['school_faculty']; ?></td> -->
                                            <td><?php echo $course['tuition_fees']; ?></td>
                                            <td><?php echo $course['starting_date']; ?></td>
                                            <td><?php echo $course['course_duration']; ?></td>
                                            <td><?php echo $course['course_location']; ?></td>
                                            <td>
                                            <a class="operation-button edit" href="modifyCourse.php?id=<?php echo $course['id']; ?>&title=<?php echo $course['course_title']; ?>">Edit</a>
                                            <a class="operation-button add" href="addModule.php?id=<?php echo $course['id']; ?>&code=<?php echo $course['course_code']; ?>&course=<?php echo $course['course_title']; ?>">Add Module(s)</a>
                                            <a class="operation-button delete" onclick="return confirmDelete('<?php echo $course['id']; ?>', '<?php echo urlencode($course['course_code']); ?>')">Delete</a>
                                            </td>
                                        </tr>

                                        <?php
                        }
                    }

                    mysqli_close($conn);


                    ?>
                   
            </table>
            <!-- Generate Report Button -->
           <button type="submit" name="generate-report" class="report-button">Generate Course Report(s)</button>
           <input type="hidden" name="selected-courses" value="">
           </form>
        </div>

               
    </div>


    <footer>
        <p>University Courses &copy; Ukaonu Darlington, 2023.</p>
    </footer>

</body>
<script src="js/main.js"></script>


</html>