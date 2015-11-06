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
//================================Authorization=====================================================

//================================Browsing history==================================================
$f = fopen('admin/visitors.txt', 'a+');
fwrite($f, date('Y-m-d H:i:s')."\r\n");
fwrite($f, $_SERVER['REMOTE_ADDR']. "\r\n");
fwrite($f, $_SERVER['HTTP_REFERER'] ."\r\n");
fclose($f);
//================================Browsing history==================================================



?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> My group </title>

    <link rel="icon" href="images/ico.ico" type="image/x-icon">
    <link rel="shortcut icon" href="images/ico.ico" type="image/x-icon">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/styleOld.css" type="text/css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">


</head>
<body>
<div id="wrapper">
    <img src="images/st3.jpg">
    <div class="btn-group">
        <button class="btn btn-info">
            My simple projects
        </button>
        <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="calculator/">Calculator by PHP</a></li>
        </ul>
    </div>
    <img src="images/logo.png" id="logo">
    <span id="header"> NAU - VIVERE! VINCERE! CREARE!</span>
    <div id="menu">
        <p><a href="old.php">Главная</a></p>
        <p><a href="news.html">Новости</a></p>
        <p><a href="members.html">Склад группы</a></p>
        <p><a href="teachers.html">Преподаватели</a></p>
        <p><a href="timetable.html">Расписание</a></p>
        <p><a href="page_author.html">Страница автора</a></p>

    </div>
    <div id="content">
        <p id="text">Національний авіаційний університет ? потужний науково-навчальний комплекс, до складу якого входять 11 інститутів: Інститут інформаційно-діагностичних систем, Аерокосмічний Інститут, Інститут аерокосмічних систем управління, Інститут екологічної безпеки, Інститут економіки та менеджменту, Юридичний інститут, Інститут доуніверситетської підготовки, Гуманітарний інститут, Інститут ICAO, Інститут заочного і дистанційного навчання, Інститут новітніх технологій, Інститут післядипломного навчання, Інститут міжнародних відносин, Інститут аеропортів, Інститут аеронавігації та Житомирський військовий інститут ім. С. П. Корольова; Кіровоградська льотна академія; 4 факультети: факультет комп'ютерних наук, факультет комп'ютерних систем, факультет по роботі з іноземними студентами та факультет підготовки офіцерів запасу; 7 коледжів, 3 ліцеї та гімназія. <br> Навчальний процес забезпечує висококваліфікований науково-педагогічний колектив, у складі якого 15 академіків та членів-кореспондентів НАН України, 270 докторів наук, професорів і понад 900 кандидатів наук, доцентів. До навчального процесу залучаються провідні спеціалісти авіакомпаній і промислових підприємств. Серед викладачів – 80 заслужених діячів науки і техніки та лауреатів Державних премій.</p>

    </div>



</div>
<div id="admin">
    <a href="#spoiler-1" data-toggle="collapse" class="btn btn-primary spoiler collapsed">You is the administrator?</a>
    <div class="collapse" id="spoiler-1">
        <div class="well">
            <form action="admin/" method="post">
                <span>Enter the administrator's password</span>
                <input type="password" name="admin" class="form-control" placeholder="password"/>
                <button type="submit" class="btn btn-success">enter</button>
            </form>
        </div>
    </div>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>