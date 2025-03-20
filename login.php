<?php

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error){
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm){
    return $formName === $activeForm ? 'active' : '';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&family=Orbitron:wght@400;700&family=IBM+Plex+Sans:wght@400;700&display=swap');

        body {
            margin: 0;
            font-family: 'IBM Plex Sans', sans-serif;
            background-color: black;
            color: white;
        }

        .form {
            width: 100%;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            display: none;
        }

        .form.active {
            display: flex;
        }

        .form-content {
            background-color: #222;
            padding: 20px;
            border: 1px solid #444;
            width: 90%;
            max-width: 400px;
            border-radius: 5px;
            text-align: center;
            position: relative;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }

        .form-content h2 {
            margin-top: 0;
            color: #ff5722;
            font-family: 'Orbitron', sans-serif;
        }

        .form-content input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-content button {
            padding: 10px 20px;
            background-color: #8300fe;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Orbitron', sans-serif;
        }
        
        
        .close-btn a{
            position: absolute;
            top: 5px;
            right: 5px;
            background: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 1px;
            border-radius: 20%;
            
        }

        .error-message {
            padding: 12px;
            background: #f8d7da;
            border-radius: 6px;
            font-size: 16px;
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div>
        <div class="form <?= isActiveForm('login', $activeForm); ?>" id="login">
            <div class="form-content">
            <a style="text-decoration: none;" href="index.html" class="close-btn">&times;</a>
                <h2>Login</h2>
                <?= showError($errors['login']); ?>
                <form action="login_register.php" method="post">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="login">Login</button>
                    <p>Don't have an account? <a href="#" onclick="showForm('signup')" style="color: #ff5722; text-decoration: none;">Register</a></p>
                </form>
            </div>
        </div>

        <div class="form <?= isActiveForm('register', $activeForm); ?>" id="signup">
            <div class="form-content">
            <a style="text-decoration: none;" href="index.html" class="close-btn">&times;</a>
                <h2>Signup</h2>
                <?= showError($errors['register']); ?>
                <form action="login_register.php" method="post">
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="register">Register</button>
                    <p>Already have an account? <a href="#" onclick="showForm('login')" style="color: #ff5722; text-decoration: none;">Login</a></p>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showForm(formId) {
            document.getElementById('login').classList.remove('active');
            document.getElementById('signup').classList.remove('active');
            document.getElementById(formId).classList.add('active');
        }
    </script>
</body>

</html>
