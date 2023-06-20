<?php
 include('scripts/session_auth.php');

 //If statements for error handling and validating the course adding process. Success, duplicate and error query strings are used to check for successful inserting of data, duplicate data and error in general

 require('scripts/conn.php');

//InnerHTML Variables

$transCode = $_GET['code'];



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
    <title>Add Module(s) | University Courses</title>
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

    <div class="main-container">


        <!-- Side Navigation -->
        <div class="side-navigation">
            <a href="courseReport.php">View Course(s)</a>
            <a href="#">Add New Course</a>
        </div>

                <!-- Course Input Form -->
                <div class="course-form-container">
                    <h2 class="course-hero-text">Adding Module(s) to "<?php echo $_GET['course']; ?>"</h2>
                    <form method="POST" action="scripts/add_module.php">

                    <label for="course-code">Course Code:</label>
                        <input class="vc-uppercase cursor-restrict"type="text" name="course-code" readonly id="course-code" value="<?php echo $transCode ?>" required>

                        <label for="module-code">Module Code:</label>
                        <input class="vc-uppercase"type="text" name="module-code" id="module-course-code" required>

                        <label for="module-name">Module Name:</label>
                        <input class="input-uppercase" type="text" name="module-name" id="module-name" required>

                        <label for="module-credits">Module Credits:</label>
                        <input class="input-uppercase" type="number" name="module-credits" id="module-credits" required>
                        <input type="submit" value="Add Module to <?php echo $_GET['course']; ?>">
                    </form>
                </div>
    </div>

    <footer>
        <p>University Courses &copy; Ukaonu Darlington, 2023.</p>
    </footer>

</body>

<script src="js/main.js"></script>


</html>