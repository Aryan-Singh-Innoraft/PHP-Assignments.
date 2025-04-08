<?php include "../../auth.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/design.css">
    <title>Assignment-1-PHP</title>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="container">
                <div class="navbar-wrapper">
                    <a href="../../logout.php" class="logout-btn">Logout</a>
                </div>
            </div>
        </div>
    </header>
    <main>
    <section class="form-section">
        <div class="container">
            <div class="form-wrapper">
                <div class="form-container">
                    <form action="welcome.php" class="form" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstname" placeholder="First Name"
                            oninput="updateFullName();validateName('firstName');">
                        <p id="firstNameError"></p>
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastname" placeholder="Last Name"
                            oninput="updateFullName();validateName('lastName');">
                        <p id="lastNameError"></p>
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" placeholder="Full Name" name="fullname" disabled>
                        <input type="file" name="imageToUpload" id="imageToUpload">
                        <p id="imageErrorMessage"></p>
                        <input type="submit" class="submit-button" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </section>  
</main>
</body>
<script src="./JS/index.js"></script>
</html>
