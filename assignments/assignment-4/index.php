<?php include "../../auth.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/design.css">
    <title>Assignment-1-PHP</title>
</head>

<body>
    <?php include '../../navbar.php';?>
    <main>
    <section class="form-section">
        <div class="container">
            <div class="form-wrapper">
                <div class="form-container">
                    <form action="welcome.php" method="post" class="form"  onsubmit="return validateForm()" enctype="multipart/form-data">
                    <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstname" placeholder="First Name"
                            oninput="updateFullName(); validateName('firstName');">
                        <p id="firstNameError"></p>
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastname" placeholder="Last Name"
                            oninput="updateFullName(); validateName('lastName');">
                        <p id="lastNameError"></p>
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" placeholder="Full Name" name="fullname" disabled>
                        <input type="file" name="imageToUpload" id="imageToUpload">
                        <p id="imageErrorMessage"></p>
                        <textarea id="marksField" name="marksField" rows="4" cols="50"
                        placeholder="Enter marks in separate lines separated by | (eg:English|85)"></textarea>
                        <p id="marksErrorMessage"></p>
                        <div class = "phoneNumber">
                            <input type="text" value="+91" readonly class="phonePrefix" name="phonePrefix">
                            <input type="text" placeholder="Mobile no." name="phoneField" id="phoneField" >
                        </div>
                        <p id = "phoneNumberError"></p>
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
