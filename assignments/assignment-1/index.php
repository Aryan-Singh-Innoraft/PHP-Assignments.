<?php include "../../auth.php";
include '../../navbar.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/design.css">
    <title>Assignment-1-PHP</title>
</head>

<body>
    <main>
        <section class="form-section">
            <div class="container">
                <div class="form-wrapper">
                    <form action="welcome.php" class="form" method="post" onsubmit = "return validateForm()">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstname" placeholder="First Name" oninput="updateFullName(); validateName('firstName');" >
                        <p id="firstNameError"></p>
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastname" placeholder="Last Name" oninput="updateFullName(); validateName('lastName');">
                        <p id="lastNameError"></p>
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" placeholder="Full Name" name="fullname" disabled>
                        <input type="submit" class="submit-button">
                    </form>
                </div>
            </div>
        </section>  
    </main>

</body>
<script src="index.js"></script>

</html>
