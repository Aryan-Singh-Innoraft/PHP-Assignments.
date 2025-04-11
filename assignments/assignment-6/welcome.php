<?php
class FormSubmission {
  /**
   * @var string 
   * Firstname of user
   */
  private $firstName;

  /**
   * Last name of user.
   * @var string 
   */
  private $lastName;

  /**
   * Folder path for image storage.
   * @var string
   */
  private $target_dir = "upload/";

    /**
   * Path for image being stored.
   * @var string
   */

  // private $target_file = $target_dir . basename($_FILES["imageToUpload"]["name"]);

  /**
   * Convert special characters in inputs to html entities
   * @param string $input
   * @return string $input
   */
  public function sanitizeInput(string $input) {
    return htmlspecialchars(trim($input));
  }
   /**
   * Upload and display image
   * @param string $input
   * @return string $input
   */
  public function handleImageUpload($target_file) {
    
    $uploadOk = 1;
    // Checking whether it is an actual image or fake. 
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
      if ($check !== FALSE) {
        $uploadOk = 1;
      }
      else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    if ($uploadOk == 0) {
      echo "Sorry try again.";
    }
    // uploading image 
    else {
      if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
        echo "<img src='$target_file' alt='Uploaded Image' class='uploaded-image'>"; 
        echo "File has not been uploaded";
      }       
    }
  }
  public function handleFormSubmission() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $this->firstName = $this->sanitizeInput($_POST["firstname"]);
      $this->lastName = $this->sanitizeInput($_POST["lastname"]);
      $target_dir = "upload/";
      $target_file = $target_dir . basename($_FILES["imageToUpload"]["name"]);
      $marksInput = trim($_POST["marksField"]);
      $linesOfMarks = explode("\n", $marksInput);
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/design.css">
  <title>Welcome Page</title>
</head>

<body>
  <?php include '../../navbar.php' ?>
  <section class="welcome-page">
    <div class="container">
      <div class="welcome-wrapper">
        <?php
        require __DIR__ . '/vendor/autoload.php';

        use PhpOffice\PhpWord\PhpWord;
        use PhpOffice\PhpWord\IOFactory;

        ?>
        <?php
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["imageToUpload"]["name"]);
        $uploadOk = 1;
        // checking whether it is an actual image or fake 
        if (isset($_POST["submit"])) {
          $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
          if ($check !== FALSE) {
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
            $uploadOk = 0;
          }
        }
        ?>
        <?php
        if ($uploadOk == 0) {
          echo "Sorry try again.";
        }
        // uploading image 
        else {
          if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
            echo "<img src='$target_file' alt='Uploaded Image' class='uploaded-image'>"; 
          } else {
            echo "File has not been uploaded";
          }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $firstName = htmlspecialchars($_POST["firstname"]);
          $lastName = htmlspecialchars($_POST["lastname"]);
          $marksInput = trim($_POST["marksField"]);
          $linesOfMarks = explode("\n", $marksInput);
        ?>
          <h1 class="heading">Hello <?php echo $firstName . " " . $lastName; ?></h1>
          <table class="marks-table">
            <tr>
              <th>Subject</th>
              <th>Marks</th>
            </tr>
            <?php
            //Process each line of marks
            foreach ($linesOfMarks as $line) {
              $line = trim($line);
              $parts = explode("|", $line);
              if (count($parts) == 2) {
                $subjectName = htmlspecialchars(trim($parts[0]));
                $subjectMark = htmlspecialchars(trim($parts[1])); ?>
                <tr>
                  <td><?= $subjectName ?></td>
                  <td><?= $subjectMark ?></td>
                </tr>
            <?php
              }
            }
            ?>
          </table>
          <?php $phoneNumber = htmlspecialchars($_POST["phoneField"]); ?>
          <h2 class="phone-display">Phone number: (+91)<?= $phoneNumber ?></h2>
          <?php $email = htmlspecialchars($_POST["email"]); ?>
          <h1 class="email-display">Email: <?= $email ?></h1>
          <!-- Code for generating doc  -->
          <?php
          $email = htmlspecialchars($_POST["email"]);
          // Define file name
          $filename = 'User_Submission_' . time() . '.docx';
          $filePath = __DIR__ . '/saved_docs/' . $filename;

          // Create a new Word document
          $phpWord = new PhpWord();
          $section = $phpWord->addSection();

          // Add content to the document
          $section->addText('User Submission', ['bold' => true, 'size' => 24]);
          $section->addTextBreak();
          $section->addTextBreak(1);
          $section->addText("Name:" . $firstName . " " . $lastName, ['size' => 18]);
          $section->addText("Email:" . $email, ['size' => 18]);
          $section->addText("Phone:" . $phoneNumber, ['size' => 18]);
          $section->addTextBreak(1);

          if (!empty($linesOfMarks)) {
            $section->addText("Marks details:", ['bold' => true, 'size' => 24]);
            $section->addTextBreak();
            $table = $section->addTable();
            $table->addRow();
            $table->addCell(4000, ['bgColor' => '#007bff', 'borderSize' => 1, 'borderColor' => '#007bff'])->addText("Subject", ['bold' => true, 'size' => 18]);
            $table->addCell(2000, ['bgColor' => '#007bff', 'borderSize' => 1, 'borderColor' => '#007bff'])->addText("Marks", ['bold' => true, 'size' => 18]);
            foreach ($linesOfMarks as $marks) {
              $mark = explode("|", $marks);
              $table->addRow();
              $table->addCell(4000, ['borderSize' => 1, 'borderColor' => '000000'])->addText($mark[0], ['size' => 18]);
              $table->addCell(2000, ['borderSize' => 1, 'borderColor' => '000000'])->addText($mark[1], ['size' => 18]);
            }
            $section->addTextBreak();
          }
          // Add image to the doc 
          if (!empty($target_file) && file_exists($target_file)) {
            $section->addText("Uploaded Image:", ['bold' => true, 'size' => 24]);
            $section->addTextBreak();
            $section->addImage($target_file, ['width' => 200, 'height' => 200, 'alignment' => 'center']);
            $section->addTextBreak();
          }
          // Save a copy on the server
          $wordWriter = IOFactory::createWriter($phpWord, 'Word2007');
          $wordWriter->save($filePath);

          ?>
          <!-- <a href = "<?= $filePath ?>" download>Download your doc. file.</a> -->
          <form method="POST" action="download.php">
            <input type="hidden" name="filename" value="<?= $filename ?>">
            <button type="submit" class="download-btn">Download Document</button>
          </form>

        <?php } ?>
      </div>
    </div>
  </section>
</body>
<script src="./JS/index.js"></script>

</html>