<?php

    function login ($username, $remember){
        if ($username == ''){
            return false;
        }
        $_SESSION ['username'] = $username;

        if ($remember){
            setcookie('username', $username, time()+3600*24*7);
        }
        return true;
    }

    function logout (){
        setcookie('username', '', time()-1);
        unset ($_SESSION['username']);
    }

    session_start();
    $enter_site = false;
    logout();
    if (count($_POST)>0){
        $enter_site = login($_POST['username'], $_POST['remember']=='on');
    }
    if ($enter_site){
        header('Location: index.php');
        exit();
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css"/>
</head>
<body>
<div class="wrapper" id="wrapper">
    <h1>You are not registered</h1>
    <form action="" method="post">
        <p>For registration, please, enter your name:</p>
        <input type="text" name="username"/><br>
        <input type="checkbox" name="remember"/>
        <span>Remember me</span><br><br/>
        <input type="submit" value="Registration / Enter"/>

    </form>
</div>
</body>
</html>