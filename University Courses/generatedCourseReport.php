<?php
include('scripts/session_auth.php');

require('scripts/conn.php');


// Check if session variables are set
if (!empty($_SESSION['course_ids']) && !empty($_SESSION['course_codes']) && !empty($_SESSION['module_data']) && !empty($_SESSION['courseData'])) {
    $course_ids_str = $_SESSION['course_ids'];
    $course_codes_str = $_SESSION['course_codes'];
    $module_data = $_SESSION['module_data'];
    $courseData = $_SESSION['courseData'];


    $course_ids = explode(',', $course_ids_str);
    $course_codes = explode(',', $course_codes_str);

    //If statements for error handling and validating the course modification and deletion process. Success and error query strings are used to check for successful inserting of data, duplicate data and error in general
    ?>

                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Generated Course Report | University Courses</title>
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
                    <link rel="stylesheet" href="css/style.css">
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                </head>

                <body>
                    <!-- Header -->
                    <header>
                        <p class="header-text"> University Courses - Generated Course Report</p>
                        <p class="username-text">Hello,  <span><?php echo $_SESSION['username'] ?></span>&nbsp;&nbsp;&nbsp;<a class="logout-text" href="scripts/logout.php">Logout</a></p>
                    </header>

                    <div class="container">
                        <!-- Side Navigation -->
                        <div class="side-navigation">
                            <a href="courseReport.php">View Course(s)</a>
                            <a href="addCourse.php">Add New Course</a>
                        </div>


                        <!-- Course Display Container in Tabular Format -->
                        <div id="printSection" class="course-report-container">

                        <?php
                        // Loop through each course and its corresponding module data
                        // Iterate through each course and display its modules
                        for ($i = 0; $i < count($course_ids); $i++) {
                            ?>
                            <h2 class="course-hero-text">Generated Course Report for <?php echo $courseData[$i][0]['course_title'] . "<br> Course Code - " . $course_codes[$i] ?></h2>
                            <table id="courses" cellspacing="1" cellpadding="20px">
                                <tr class="header-table-head">
                                    <th>
                                        <h4>Module Name</h4>
                                    </th>
                                    <th>
                                        <h4>Course Code</h4>
                                    </th>
                                    <th>
                                        <h4>Module Code</h4>
                                    </th>
                                    <th>
                                        <h4>Module Credits</h4>
                                    </th>
                                </tr>

                                <?php
                                //Fetching sum of credits
                                $sumCredits = "SELECT SUM(module_credits) AS sum_column FROM modules WHERE course_code = '$course_codes[$i]'";
                                $result = mysqli_query($conn, $sumCredits);
                                $sum_of_credits = mysqli_fetch_assoc($result)["sum_column"];

                                $moduleData = array();
                                // Iterate through each module for the current course and display it in a list
                                foreach ($module_data[$i] as $module) {

                                    //Creating a new object for the current module and add it to the moduleData array
                                    $moduleObject = array(
                                        'name' => $module['module_name'],
                                        'credits' => $module['module_credits']
                                    );

                                    array_push($moduleData, $moduleObject);
                                    echo "<tr>";
                                    echo "<td>" . $module['module_name'] . "</td>"; // display module name
                                    echo "<td>" . $course_codes[$i] . "</td>"; // display course code
                                    echo "<td>" . $module['module_code'] . "</td>"; // display module code
                                    echo "<td>" . $module['module_credits'] . "</td>"; // display module credits
                                    echo "</tr>";
                                }


                                // Add the row for summing up the credits earned
                                // Adding the total credits cell
                                echo "<tr><td colspan='3' align='right'><b class='total'>Total Credits:</b></td><td><b b class='total'>" . $sum_of_credits . "</b></td></tr>";
                                ?>

                            </table>
                            <?php
                        }
                        ?>
                           <div class="genChart">
                            <button id="genButton" class="showChart" onclick="generateChart();" value="">Double Click to Generate Chart Data for Analysis >>></button>
                            <button id="printButton" class="printPage" onclick="window.print();" value="Print Report">Print Course Report</button>
                            <br>
                           </div>
                           <div id="chartArea" class="chartCanvas">
                           <canvas id="myChart"></canvas>
                           </div>
    </div>
    <script>
        var moduleData = <?php echo json_encode($moduleData); ?>;

        var ctx = document.getElementById("myChart").getContext("2d");

        var myPieChart = new Chart(ctx, {
            type: "polarArea",
            data: {
                datasets: [
                    {
                        data: moduleData.map(module => module.credits),
                        backgroundColor: [
                            "#116D6E",
                            "#2B2A4C",
                            "#54e69d",
                            "#525FE1",
                            "#4E3636",
                            "#22A699",
                            "#B31312"
                        ],
                        label: "Credits"
                    }
                ],
                labels: moduleData.map(module => module.name)
            },
            options: {
                responsive: true
            }
        });
    </script>
                </div>
            </div>
 
            <?php
} else { ?>
                <h2>No data has been generated yet. Please go back to generate courses.</h2>
            <?php
} ?>
      
          
            <!-- Generate Report Button -->
           <!-- <button type="submit" name="generate-report" class="report-button">Generate Course Report(s)</button>
           <input type="hidden" name="selected-courses" value=""> -->

           <!-- Representing Data with Chart.js -->


        </div>

               
    </div>



    <footer>
    <p>University Courses &copy; Ukaonu Darlington, 2023.</p>
    </footer>

    

</body>
<script src="js/main.js"></script>


</html>