<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fink D.A.</title>
    <link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container nav_bar">
        <div class="row">
            <div class="row">
                <div class="col-3 nav_logo"></div>
                <div class="col-9">
                    <div class="nav_text">Регистрация</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form class="form_bloc" method="POST" action="/reg.php">
                        <div class="row form_reg"><input class="form" type="email" name="email" placeholder="Email"></div>
                        <div class="row form_reg"><input class="form" type="text" name="login" placeholder="Login"></div>
                        <div class="row form_reg"><input class="form" type="password" name="password" placeholder="Password"></div>
                        <button type="submit" class="btn_reg" id="button1" name="submit">Продолжить</button>
                    </form>
                 </div>
            </div>
        </div>    
    </div>        
</body>
</html>

<?php

require_once('db.php');

// if (isset($_COOKIE['User'])) {
//     header("Location: profile.php");
// }

$link = mysqli_connect('db', 'root', 'root', 'finweb');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['login'];
    $password = $_POST['password'];

    if (!$email || !$username || !$password) die ('Пожалуйста введите все значения!');

    $sql = "INSERT INTO users (email, username, pass) VALUES ('$email', '$username', '$password')";

    if(!mysqli_query($link, $sql)) {
        echo "Не удалось добавить пользователя";
    }
}

?> 