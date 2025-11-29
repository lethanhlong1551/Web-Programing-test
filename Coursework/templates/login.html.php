<?php
session_start();
if (isset($_SESSION['login_error'])) {
    echo "<script>window.onload = function() { alert('{$_SESSION['login_error']}'); }</script>";
    unset($_SESSION['login_error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../question.css">
    <style>
        body {
            background: #5af1ffff;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .login-container {
            background: #fff;
            max-width: 500px;
            margin: 80px auto 0 auto;
            padding: 32px 32px 24px 32px;
            border-radius: 10px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.12);
        }
        h2 {
            text-align: center;
            color: #000000ff;
            margin-bottom: 24px;
            font-size: 2em;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-size: 1.1em;
            color: #333;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 16px;        
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1.2em;     
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #2ecc71;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background 0.2s;
        }
        button:hover {
            background: #27ae60;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="../admin/login/check.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>