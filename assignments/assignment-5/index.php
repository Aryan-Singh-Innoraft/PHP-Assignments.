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
                    <form action="welcome.php" method="post" class="form"  onsubmit="validateForm(event)" enctype="multipart/form-data">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstname" placeholder="First Name"
                            oninput="updateFullName()">
                        <p id="firstNameError"></p>
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastname" placeholder="Last Name"
                            oninput="updateFullName()">
                        <p id="lastNameError"></p>
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" placeholder="Full Name" name="fullname" disabled>
                        <input type="file" name="imageToUpload" id="imageToUpload">
                        <textarea id="marksField" name="marksField" rows="4" cols="50"
                        placeholder="Enter marks"></textarea>
                        <div class = "phoneNumber">
                            <input type="text" value="+91" readonly class="phonePrefix" name="phonePrefix">
                            <input type="text" placeholder="Mobile no." name="phoneField" id="phoneField" >
                        </div>
                        <p id = "phoneNumberError"></p>
                        <input type="text" placeholder="Enter your mail" id="email" name="email">
                        <p id = "emailError"></p>
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
