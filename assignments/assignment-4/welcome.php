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
          <table class="marks-table">
            <tr>
              <th>Subject</th>
              <th>Marks</th>
            </tr>
            <?php foreach($formSubmission->marksArray as $subject => $marks){ ?>
            <tr>
              <td><?= $subject; ?></td>
              <td><?= $marks; ?></td>
            </tr>
            <?php } ?>
          </table>
          <h2 class="phone-display">Phone number: (+91)<?= $formSubmission->phoneNumber ?></h2>
      </div>
    </div>
  </section>
</body>
<script src="./JS/index.js"></script>
</html>
