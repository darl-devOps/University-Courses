<?php
 include('scripts/session_auth.php');

//Fetching course data by establishing a database connection
 require('scripts/conn.php');

 //Fetching course ID from the URL parameter
 $course_id = $_GET['id'];
 $fetchQuery = "SELECT * FROM courses WHERE id = $course_id";

$queryResult = mysqli_query($conn, $fetchQuery);
$course = mysqli_fetch_assoc($queryResult);

mysqli_close($conn);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifying Course | <?php echo $_GET['title']; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
    <!-- Header -->
    <header>
        <p class="header-text"> University Courses - <?php echo $_GET['title']; ?></p>
        <p class="username-text">Hello,  <span><?php echo $_SESSION['username'] ?></span>&nbsp;&nbsp;&nbsp;<a class="logout-text" href="scripts/logout.php">Logout</a></p>
    </header>

    <div class="main-container">


        <!-- Side Navigation -->
        <div class="side-navigation">
            <a href="#">Add New Course</a>
            <a href="courseReport.php">View Course Reports</a>
        </div>

                <!-- Course Input Form -->
                <div class="course-form-container">
                    <h2 class="course-hero-text">Modifying "<?php echo $_GET['title']; ?>" </h2>
                    
                    <form method="POST" action="scripts/modify_course.php">

                        <input type="hidden" name="course-id" value="<?php echo $course['id']; ?>">

                        <label for="course-title">Course Title:</label>
                        <input class="input-uppercase" type="text" name="course-title" id="course-title" value="<?php echo $course['course_title']; ?>">

                        <label for="course-code">Course Code:</label>
                        <input class="vc-uppercase"type="text" name="course-code" id="course-code" value="<?php echo $course['course_code']; ?>">

                        <label for="level-of-study">Level of Study:</label>
                        <input class="input-uppercase" type="text" name="level-of-study" id="level-of-study" value="<?php echo $course['course_level']; ?>">

                        <label for="tuition-fees">Tuition Fees (GBP):</label>
                        <input type="text" name="tuition-fees" id="tuition-fees" value="<?php echo $course['tuition_fees']; ?>">

                        <label for="no-of-int">Number of International Students:</label>
                        <input type="number" name="no-of-int" id="no-of-int" value="<?php echo $course['international_students']; ?>">

                        <label for="no-of-loc">Number of Local Students:</label>
                        <input type="number" name="no-of-loc" id="no-of-loc" value="<?php echo $course['local_students']; ?>">

                        <label for="enrolled-students">Number of Students Enrolled:</label>
                        <input class="cursor-restrict" type="text" name="enrolled-students" id="enrolled-students">

                        <label for="starting-date">Starting Date:</label>
                        <input type="month" name="starting-date" id="starting-date" value="<?php echo $course['starting_date']; ?>">

                        <label for="course-duration">Course Duration (Years):</label>
                        <input type="number" name="course-duration" id="course-duration" value="<?php echo $course['course_duration']; ?>">

                        <label for="course-location">Course Location:</label>
                        <input class="input-uppercase" type="text" name="course-location" id="course-location" value="<?php echo $course['course_location']; ?>">

                        <input type="submit" value="Save Changes to <?php echo $course['course_title'] ?>">
                    </form>
                </div>
    </div>

    <footer>
        <p>University Courses &copy; Ukaonu Darlington, 2023.</p>
    </footer>

</body>

<script src="js/main.js"></script>


</html>