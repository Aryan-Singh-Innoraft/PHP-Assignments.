<?php
require_once 'vendor/autoload.php';
 use PhpOffice\PhpWord\PhpWord;
 use PhpOffice\PhpWord\IOFactory;
/**
 * Handles form submission, file uploads, create marks table creates and store docs.
 */
class FormSubmission {
  /**
   * First name of user
   * 
   * @var string 
   */
  public $firstName;

  /**
   *Last name of user.
   *
   * @var string 
   */
  public $lastName;

  /**
   * Folder path for image storage.
   * 
   * @var string
   */
  private $targetDir = "upload/";

  /**
   * Path of uploaded image.
   * 
   * @var string
   */
  private $targetFile;

  /**
   * Storing subject and marks.
   * 
   * @var array
   */
  public $marksArray=[];

  /**
   * Storing phone number.
   * @var int
   */
  public $phoneNumber;

  /**
   * Storing email.
   * @var string
   */
  public $email;

  /**
   * This stores path of the document saved.
   * 
   * @var string
   */
  public $filePath;

  /**
   * Stores the api key.
   * 
   * @var string
   */
  private $apiKey = '6818d5ec85fe74dcff43a19fa1db6393';

  /**
   * Convert special characters in inputs to html entities
   * 
   * @param string|int $input
   *   User input
   * 
   * @return string|int $input
   *   HTML entities with no special characters   
   */
  public function sanitizeInput(string|int $input) {
    return htmlspecialchars(trim($input));
  }

   /**
   * Upload and display image
   * 
   * @param string $target_file
   *   Path where image is being uploaded.
   */
  public function handleImageUpload(string $target_file) {
    $upload_ok = 1;
    // Checking whether it is an actual image or fake. 
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
      if($check !== FALSE) {
        $upload_ok = 1;
      }
      else {
        echo "File is not an image.";
        $upload_ok = 0;
      }
    }
    if ($upload_ok == 0) {
      echo "Sorry try again.";
    }
    // Uploading image and displaying. 
    else {
      if(move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
        echo "<img src='$target_file' alt='Uploaded Image' class='uploaded-image'>";
      }
      else {
        echo "Image has not been uploaded";
      }       
    }
  }

  /**
   * Creates a result array with subject name and marks.
   * 
   * @param string $marks_Input
   *   Takes the user input of marks.
   * 
   * @return array
   *   Array having marks and equivalent marks. 
   */
  public function marksTable(string $marks_Input) {
    $marks_data = [];
    $lines_of_marks = explode("\n", $marks_Input);
    foreach ($lines_of_marks as $line) {
      $line = trim($line);
      $parts = explode("|", $line);
      if (count($parts) == 2) {
        $subject_name = htmlspecialchars(trim($parts[0]));
        $subject_mark = htmlspecialchars(trim($parts[1])); 
        $marks_data[$subject_name] = $subject_mark;
      }
    }
    return $marks_data;
  }

  /**
   * Creates and stores document after form submission.
   * 
   * @return string 
   *   Returns path of the saved document.
   */
  public function createDoc() {
    // Define file name
    $file_name = 'User_Submission_' . time() . '.docx';
    $file_path = __DIR__ . '/assignments/assignment-6/saved_docs/'. $file_name;

    // Create a new Word document
    $php_word = new PhpWord();
    $section = $php_word->addSection();

    // Add content to the document
    $section->addText('User Submission', ['bold' => true, 'size' => 24]);
    $section->addTextBreak();
    $section->addTextBreak(1);
    $section->addText("Name:" . $this->firstName . " " . $this->lastName, ['size' => 18]);
    $section->addText("Email:" . $this->email, ['size' => 18]);
    $section->addText("Phone:" . $this->phoneNumber, ['size' => 18]);
    $section->addTextBreak(1);

    if (!empty($this->marksArray)) {
      $section->addText("Marks details:", ['bold' => true, 'size' => 24]);
      $section->addTextBreak();
      $table = $section->addTable();
      $table->addRow();
      $table->addCell(4000, ['bgColor' => '#007bff', 'borderSize' => 1, 'borderColor' => '#007bff'])->addText("Subject", ['bold' => true, 'size' => 18]);
      $table->addCell(2000, ['bgColor' => '#007bff', 'borderSize' => 1, 'borderColor' => '#007bff'])->addText("Marks", ['bold' => true, 'size' => 18]);
      foreach ($this->marksArray as $subject => $marks) {
        $table->addRow();
        $table->addCell(4000, ['borderSize' => 1, 'borderColor' => '000000'])->addText($subject, ['size' => 18]);
        $table->addCell(2000, ['borderSize' => 1, 'borderColor' => '000000'])->addText($marks, ['size' => 18]);
      }
      $section->addTextBreak();
    }
    // Add image to the doc 
    if (!empty($this->targetFile) && file_exists($this->targetFile)) {
      $section->addText("Uploaded Image:", ['bold' => true, 'size' => 24]);
      $section->addTextBreak();
      $section->addImage($this->targetFile, ['width' => 200, 'height' => 200, 'alignment' => 'center']);
      $section->addTextBreak();
    }
    // Save a copy on the server
    $word_writer = IOFactory::createWriter($php_word, 'Word2007');
    $word_writer->save($file_path);
    return $file_path;
  }

  function emailValidate($email){
    header('Content-Type: application/json'); 
    // Construct API URL
    $url = "http://apilayer.net/api/check?access_key=$this->apiKey&email=$email";
     
    try {
        // Initialize cURL session.
        $ch = curl_init($url);
        if ($ch === false) {
            echo "failed setup";
            throw new Exception("Failed to initialize cURL.");
        }                
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        $responseApi =json_decode($json , true);
        $response = [
         "success"=> false,
         "message"=> ""
        ];
        // Check for cURL errors
        if (isset($responseApi['success'])) {
             echo "failed to call api";
             throw new Exception("Failed API request: " . curl_error($ch));
        }
        curl_close($ch);
        // Print validation result.
        if ($responseApi['format_valid'] === true && $responseApi['smtp_check'] === true) {
         $response["success"] = true;
         $response["message"] = "Valid email-id";
        } 
        else {
         $response["success"] = false;
         $response["message"] = "Invalid email-id";
            
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    return $response;
  } 
  
  /**
   * Handles form submission.
   */
  public function handleFormSubmission() {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $this->firstName = $this->sanitizeInput($_POST["firstname"]?? "");
      $this->lastName = $this->sanitizeInput($_POST["lastname"]?? "");
      $this->targetFile = $this->targetDir . basename($_FILES["imageToUpload"]["name"]);
      $this->handleImageUpload($this->targetFile);
      $this->marksArray = $this->marksTable($_POST["marksField"]?? "");
      $this->phoneNumber = $this->sanitizeInput($_POST["phoneField"]?? "");
      $this->email = $this->sanitizeInput($_POST["email"]?? "");
      $this->filePath = $this->createDoc();
    }
  }
}
?>
