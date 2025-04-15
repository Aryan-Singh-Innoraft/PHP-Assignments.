<?php
include '../../navbar.php';
include "../../FormSubmission.php";
 
// Object creation.
$formSubmission = new FormSubmission();
$formSubmission->handleFormSubmission();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/design.css">
  <title>Welcome Page</title>
</head>

<body>
  <section class="welcome-page">
    <div class="container">
      <div class="welcome-wrapper">
          <h1 class="heading">Hello <?= $formSubmission->firstName . " " . $formSubmission->lastName; ?></h1>
      </div>
    </div>
  </section>
</body>
<script src="./JS/index.js"></script>
</html>
