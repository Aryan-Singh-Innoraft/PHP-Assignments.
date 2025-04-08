<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/login.css">
    <title>Login page</title>
</head>
<body>
<?php 
    session_start();
  
    $validUserName = "Aryan";
    $validPassword = "100";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userName = $_POST["userName"];
        $password = $_POST["password"];
        $errorMessageUsername = "";
        $errorMessagePassword = "";
        

        if($userName === $validUserName && $password === $validPassword) {
            $_SESSION["username"] = $userName;
            header("Location: http://formaryan.com/assignments/assignment-4/");
            exit();
        }
        if ($userName !== $validUserName ){
            $errorMessageUsername = "Wrong username";
        }
        if ($password !== $validPassword ){
            $errorMessagePassword = "Wrong password";
        }
        else {
            $errorMessageUsername = "Wrong username";
            $errorMessagePassword = "Wrong password";
        }
    }
    ?>
    <main>
        <section class="login-form-page">
            <div class="container">
                <div class="login-form">
                    <form action="" class="form" method = "POST" enctype = "multipart/formdata">
                        <h2>Login</h2>
                        <label for="userName">User-name:</label>
                        <input type="text" placeholder="Username" id="userName" name="userName">
                        <p><?= $errorMessageUsername ?></p>
                        <label for="password">Password:</label>
                        <input type="password" placeholder="Password" id="password" name="password">
                        <p><?= $errorMessagePassword ?></p>
                        <button class="login-btn">Login</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    
</body>
</html>