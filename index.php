<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/landing.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Landing Page</title>
</head>
<body>
    <?php 
    session_start();
    if (isset($_SESSION["username"])) {
        if(isset($_GET["q"])) {
            $q = intval($_GET["q"]);
            $assignmentPath = "assignments/assignment-$q/";
            if(file_exists($assignmentPath)) {
                header("Location: $assignmentPath");
                exit();
            }
        }
        else {
            header("Location: http://formaryan.com/assignments/assignment-4");
            exit;
        }
    }
    ?>
    <header>
        <div class="navbar">
            <div class="container">
                <div class="navbar-wrapper">
                    <a href="login.php" class="login-btn">Login</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="banner-section">
            <div class="container">
                <div class="banner-wrapper">
                    <div class="text-content">
                        Login to see all my 
                        <span>
                        basic PHP Assignments.
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer">
            <div class="container">
                Aryan_Innoraft_2025
            </div>
        </div>
    </footer>
</body>
</html>