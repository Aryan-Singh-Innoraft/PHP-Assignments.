<?php
    session_start();
  
    header('Content-Type: application/json');
    $validUserName = "Aryan";
    $validPassword = "100";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userName = $_POST["userName"];
        $password = $_POST["password"];
        $errorMessageUsername = "";
        $errorMessagePassword = ""; 
        
        // Response that would be sent in frontend 
        $response = [
            "success" => false,
            "errors" => [
                "username" => "",
                "password" => ""
            ]
        ];

        if($userName === "") {
            $errorMessageUsername = "Username required";
        }
        if($password === "") {
            $errorMessagePassword = "Password required";
        }

        if($errorMessageUsername === "" && $errorMessagePassword === ""){
            if($userName === $validUserName && $password === $validPassword) {
                $_SESSION["username"] = $userName;
                $response["success"] = true;
                echo json_encode($response);
                exit();
            }
            else {
                if($userName !== $validUserName){
                    $errorMessageUsername = "Wrong username";
                }
                if($password !== $validPassword ){
                    $errorMessagePassword = "Wrong password";
                }
            }
        }
        
        // Return error message as response 
        $response["errors"]["username"] = $errorMessageUsername;
        $response["errors"]["password"] = $errorMessagePassword;
        echo json_encode($response);
        exit;
    }
    ?>
   