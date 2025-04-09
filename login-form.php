<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/login.css">
    <title>Login page</title>
</head>
<body>
    <main>
        <section class="login-form-page">
            <div class="container">
                <div class="login-form">
                    <form action="#" class="form" method = "POST"  id="login-form">
                        <h2>Login</h2>
                        <label for="userName">User-name:</label>
                        <input type="text" placeholder="Username" id="userName" name="userName">
                        <p id="errorMessageUsername"></p>
                        <label for="password">Password:</label>
                        <input type="password" placeholder="Password" id="password" name="password">
                        <p id="errorMessagePassword"></p>
                        <button id="login-btn">Login</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
   
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="./JS/login.js"></script>
</html>