<?php
 include('scripts/session_auth.php');

 //If statements for error handling and validating the course adding process. Success, duplicate and error query strings are used to check for successful inserting of data, duplicate data and error in general

 if(isset($_GET['status']) && $_GET['status'] === 'success'){
    echo 
    "<script>
    alert('New University Course Added Successfully!');
    </script>";
 }

 elseif(isset($_GET['status']) && $_GET['status'] === 'error'){
    echo 
    "<script>
    alert('Oops! There was a problem on our end, please try again.');
    </script>";
 }

 elseif(isset($_GET['status']) && $_GET['status'] === 'duplicate'){
    echo 
    "<script>
    alert('Oops! A course with either the same course title or course code already exists. Please check your entry amd try again.');
    </script>";

     // Debug message to see if the block is executed
    // echo "Duplicate course found! Redirecting to addCourse page.";

 }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Course | University Courses</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <!-- Header -->
    <header>
        <p class="header-text"> University Courses - Add Course</p>
        <p class="username-text">Hello,  <span><?php echo $_SESSION['username'] ?></span>&nbsp;&nbsp;&nbsp;<a class="logout-text" href="scripts/logout.php">Logout</a></p>
    </header>

    <div class="main-container">


        <!-- Side Navigation -->
        <div class="side-navigation">
            <a href="courseReport.php">View Course(s)</a>
            <a href="#">Add New Course</a>
        </div>

                <!-- Course Input Form -->
                <div class="course-form-container">
                    <h2 class="course-hero-text">Add a New University Course</h2>
                    <form method="POST" action="scripts/add_course.php">
                        <label for="course-title">Course Title:</label>
                        <input placeholder="Computer Science" class="input-uppercase" type="text" name="course-title" id="course-title" required>

                        <label for="course-code">Course Code:</label>
                        <input placeholder="CS101" class="vc-uppercase"type="text" name="course-code" id="course-code" required>

                        <label for="level-of-study">Level of Study:</label>
                        <input placeholder="Undergraduate" class="input-uppercase" type="text" name="level-of-study" id="level-of-study" required>

                        <label for="tuition-fees">Tuition Fees (GBP):</label>
                        <input placeholder="15000" type="text" name="tuition-fees" id="tuition-fees" required>

                        <label for="no-of-int">Number of International Students:</label>
                        <input placeholder="30" type="number" name="no-of-int" id="no-of-int" required>

                        <label for="no-of-loc">Number of Local Students:</label>
                        <input placeholder="30" type="number" name="no-of-loc" id="no-of-loc" required>

                        <label for="enrolled-students">Number of Students Enrolled:</label>
                        <input class="cursor-restrict" type="text" name="enrolled-students" readonly id="enrolled-students" required>

                        <label for="starting-date">Starting Date:</label>
                        <input type="month" name="starting-date" id="starting-date" required>

                        <label for="course-duration">Course Duration (Years):</label>
                        <input placeholder="3" type="number" name="course-duration" id="course-duration" required>

                        <label for="course-location">Course Location:</label>
                        <input placeholder="Waterside" class="input-uppercase" type="text" name="course-location" id="course-location" required>

                        <input type="submit" value="Add New University Course">
                    </form>
                </div>
    </div>

    <footer>
        <p>University Courses &copy; Ukaonu Darlington, 2023.</p>
    </footer>

</body>

<script src="js/main.js"></script>


</html>