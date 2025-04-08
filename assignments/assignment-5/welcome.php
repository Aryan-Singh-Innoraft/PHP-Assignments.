<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="./CSS/design.css">
    <title>Welcome Page</title>
</head>
<body>
    <section class="welcome-page">
        <div class="container">
            <div class="welcome-wrapper">
            <?php
            $target_dir="upload/";
            $target_file=$target_dir . basename($_FILES["imageToUpload"] ["name"]);
            $uploadOk=1;
            $imageFileType=strtolower(pathinfo($target_file,$PATHINFO_EXTENSION));
            // checking whether it is an actual image or fake 
            if(isset($_POST["submit"])){
                $check=getimagesize($_FILES["imageToUpload"]["tmp_name"]);
                if($check!==FALSE){
                    $uploadOk=1;
                }
                else{
                    echo "File is not an image.";
                    $uploadOk=0;
                }
            }
            ?>
            
            <?php
            if($uploadOk==0){
                echo "Sorry try again.";
            }
            // uploading image 
            else{
                if(move_uploaded_file($_FILES["imageToUpload"]["tmp_name"],$target_file)){
                    echo "<img src='$target_file' alt='Uploaded Image' class='uploaded-image'>";//displaying image
                }
                else{
                    echo "File has not been uploaded";
                }
            }
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $firstName = htmlspecialchars($_POST["firstname"]);
                $lastName = htmlspecialchars($_POST["lastname"]);
                $marksInput = trim($_POST["marksField"]);
                $linesOfMarks = explode("\n",$marksInput);
                ?>
            <h1 class="heading">Hello <?php echo $firstName." ".$lastName;?></h1>
            <table class="marks-table">
                <tr>
                    <th>Subject</th>
                    <th>Marks</th>
                </tr>
            <?php
                //Process each line of marks
                foreach($linesOfMarks as $line) {
                    $line = trim($line);
                    $parts = explode("|",$line);
                    if(count($parts) == 2){
                        $subjectName = htmlspecialchars(trim($parts[0]));
                        $subjectMark = htmlspecialchars(trim($parts[1]));?>
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
            <?php
                require_once 'vendor/autoload.php';  // Load autoload if using Composer

                // Load environment variables from .env file
              
                $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
                var_dump($dotenv) ;
                $dotenv->load();
                
                // Get the API key from the environment variables
                $apiKey = getenv('API_KEY'); 
                if (is_readable('.env')) {
                    echo ".env file is readable.";
                } else {
                    echo ".env file is NOT readable.";
                }
                if (getenv('API_KEY') === false) {
                    echo "API_KEY is not loaded correctly from the .env file.";
                } else {
                    echo "API_KEY loaded successfully: " . getenv('API_KEY');
                }

                // Set API Key and Email
                // $apiKey = '03aec3cd90b5d907d8dd2516a6031a3c'; 
                $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : '';
                if (empty($email)) {
                    die("Email is required.");
                }
                // Construct API URL
                $url = "http://apilayer.net/api/check?access_key=$apiKey&email=$email";
                 
                try {
                    // Initialize cURL session
                
                    $ch = curl_init($url);
                   
                    if ($ch === false) {
                        throw new Exception("Failed to initialize cURL.");
                    }
                   
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    // Check for cURL errors
                    if ($response === false) {
                        throw new Exception("Failed API request: " . curl_error($ch));
                    }
                    curl_close($ch);
                    // Decode JSON response
                    $data = json_decode($response, true);
                    echo $data['format_valid'];
                    // Print validation result
                    if ($data['format_valid'] == true && $data['smtp_check'] === true) {
                        ?>
                        <h2 class="email-display"><?= $email ?></h2>
                        <?php
                    } else {
                        echo "The email address is invalid!";
                    }
                } catch (Exception $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
                <?php } ?>
            </div>
        </div>
    </section>
</body>
</html>
