<?php  
// Set API Key and Email
              function emailValidate($email){
                $apiKey = '6818d5ec85fe74dcff43a19fa1db6393';
                header('Content-Type: application/json'); 
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
                 //    Decode JSON response
                    
                    // Print validation result
                    if ($responseApi['format_valid'] === true && $responseApi['smtp_check'] === true) {
                     $response["success"] = true;
                     $response["message"] = "Valid email-id";
                        ?>
                        
                        <?php
                    } else {
                     $response["success"] = false;
                     $response["message"] = "Invalid email-id";
                        
                    }
                } catch (Exception $e) {
                    echo "Error: " . $e->getMessage();
                }
               
                return $response;
              } ?>
<?php include "../../auth.php"; 
 if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    header('Content-Type: application/json');
    echo json_encode(emailValidate($_POST['email']));
    exit;
  }
?>