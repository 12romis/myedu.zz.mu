<?php
//================================Authorization=====================================================
session_start();
if (!isset ($_SESSION ['username']) && isset ($_COOKIE ['username'])){
    $_SESSION ['username'] = $_COOKIE ['username'];
}
$username = $_SESSION ['username'];
if ($username==null){
    header('Location: login.php');
    exit();
}
//================================Authorization====================================================
include_once ('startup.php');
include_once ('models.php');

startup();

if (!empty ($_POST)){
    send_message ($username, $_POST['text']);
    header('Location: index.php');
    exit();
}

$messages = get_messages ();

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="wrapper">
    <form method="post">
        Message: <br/>
        <textarea name="text" placeholder="Please, enter here your message"></textarea><br/>
        <input type="submit" value="Send"/><br/>
    </form>

    <hr/>

    <?php
    foreach ($messages as $m){
        echo '<p>';
        echo "<i>" . $m['dt'] . " - " . $m['name'] . "</i><br>";
        echo $m['text'];
        echo "</p>";

    }
    ?>
</div>
</body>
</html>