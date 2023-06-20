<?php

session_start();

require("scripts/conn.php");

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | University Courses</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
</head>

<body>
    <!-- Header -->
    <header>
        <p class="header-text">University Courses </p>
    </header>

    <!-- Login Section -->
    <div class="login-container">
        <div class="login-form">
            <h2>University Courses Login Portal</h2>
            <!-- Checking for the login_error session variable to see if there is an error with the login credentials-->
            <?php if (isset($_SESSION['login_error'])) { ?>
                        <h4 id="login-error" class="login-error"><?php echo $_SESSION['login_error']; ?></h4>
                        <!-- Setting the timeout of the error message -->
                        <script>
                            setTimeout(() => {
                                const loginError = document.querySelector('#login-error');
                                loginError.style.display = 'none';
                            }, 3000);
                        </script>
            <?php }
            //Unsetting the login_error session variable so the variable would not be set when the user refreshes the page
            unset($_SESSION['login_error']); ?>
                <form method="POST" action="scripts/login.php">
                    <input type="text" id="username" name="username" placeholder="Enter username" required>
                    <input type="password" id="password" name="password" placeholder="Enter password" required>
                    <input type="submit" name="login" value="Login">
                </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>University Courses &copy; Ukaonu Darlington, 2023.</p>
    </footer>

</body>


</html>