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
//================================Browsing history: end==================================================
//================================Adding news: begin==================================================
if (isset ($_POST['add_news'])){
    $fnews = fopen('admin/news.txt', 'a+');
    fwrite($fnews, date('Y-m-d H:i:s')."\r\n");
    fwrite($fnews, $_POST['add_news'] ."\r\n");
    fclose($fnews);
}
$lines = file('admin/news.txt');
//================================Adding news: end==================================================


?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> My education </title>

    <link rel="icon" href="images/ico.ico" type="image/x-icon">
    <link rel="shortcut icon" href="images/ico.ico" type="image/x-icon">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">


</head>
<body>
<div id="wrapper">
<!--==================================Carousel: begin======================================-->
    <div class="carousel slide" id="carousel">
        <ol class="carousel-indicators">
            <li class="active" data-target="#carousel" data-slide-to="0"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
            <li data-target="#carousel" data-slide-to="3"></li>
            <li data-target="#carousel" data-slide-to="4"></li>
            <li data-target="#carousel" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="images/st3.jpg">
                <div class="carousel-caption">
                    <p>about NAU</p>
                </div>
            </div>
            <div class="item">
                <img src="images/stu.jpg">
                <div class="carousel-caption">
                    <p>about members of group SP-7</p>
                </div>
            </div>
            <div class="item">
                <img src="images/life3.jpg">
                <div class="carousel-caption">
                    <p>group's news</p>
                </div>
            </div>
            <div class="item">
                <img src="images/nau2.jpg">
                <div class="carousel-caption">
                    <p>NAU</p>
                </div>
            </div>
            <div class="item">
                <img src="images/nau3.jpg">
                <div class="carousel-caption">
                    <p>NAU</p>
                </div>
            </div>
            <div class="item">
                <img src="images/Nau.JPG">
                <div class="carousel-caption">
                    <p>NAU</p>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#carousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
<!--==================================Carousel: end======================================-->
<p id="header">

    <img src="images/logo.png" id="logo">
    National Aviation University<br/>
</p>
    <!--=================================Button My simple projects: begin====================-->
    <div class="btn-group">
        <button class="btn btn-info">
            My simple projects
        </button>
        <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="calculator/">Calculator by PHP</a></li>
            <li><a href="old.php">Old version of this site</a></li>
            <li><a href="page_author.html">First (very simple) site</a></li>
            <li><a href="http://secedu.ho.ua/emblema">Our dream team</a></li>
            <li><a href="gallery/">Arbitrary photo gallery</a></li>
            <li><a href="blog/">Own mini blog</a></li>
            <li><a href="snake/">my game Snake</a></li>
			<li><a href="tetris/">my game Tetris</a></li>
			<li><a href="interview/">Interview for nau</a></li>
        </ul>
    </div>
<!--=================================Button My simple projects: end====================-->
    <br/>
<!--==================================Tabs: begin======================================-->

    <div class="tabs">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">About University</a></li>
            <li><a data-toggle="tab" href="#tab2">Group's news</a></li>
            <li><a data-toggle="tab" href="#tab3">Members / Chat</a></li>
            <li><a data-toggle="tab" href="#tab4">Teachers</a></li>
            <li><a data-toggle="tab" href="#tab5">Timetable</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active in fade all-tab" id="tab1">
                <p id="tab1">Національний авіаційний університет ? потужний науково-навчальний комплекс, до складу якого входять 11 інститутів: Інститут інформаційно-діагностичних систем, Аерокосмічний Інститут, Інститут аерокосмічних систем управління, Інститут екологічної безпеки, Інститут економіки та менеджменту, Юридичний інститут, Інститут доуніверситетської підготовки, Гуманітарний інститут, Інститут ICAO, Інститут заочного і дистанційного навчання, Інститут новітніх технологій, Інститут післядипломного навчання, Інститут міжнародних відносин, Інститут аеропортів, Інститут аеронавігації та Житомирський військовий інститут ім. С. П. Корольова; Кіровоградська льотна академія; 4 факультети: факультет комп'ютерних наук, факультет комп'ютерних систем, факультет по роботі з іноземними студентами та факультет підготовки офіцерів запасу; 7 коледжів, 3 ліцеї та гімназія. <br> Навчальний процес забезпечує висококваліфікований науково-педагогічний колектив, у складі якого 15 академіків та членів-кореспондентів НАН України, 270 докторів наук, професорів і понад 900 кандидатів наук, доцентів. До навчального процесу залучаються провідні спеціалісти авіакомпаній і промислових підприємств. Серед викладачів – 80 заслужених діячів науки і техніки та лауреатів Державних премій.</p>
            </div>
            <div class="tab-pane fade all-tab" id="tab2">
                <ol>
                    <li>
                        <p>Собираемся на шашлык:</p>
                        <img src="images/sh1.jpg">
                    </li>
                    <?php
                        $n = count($lines);
                        for ($i=0; $i<$n; $i+=2){
                            echo '<li>';
                                echo $lines[$i+0] . " => <br/>";
                                echo $lines[$i+1] . "<br/>";
                            echo "</li>";
                        }

                    ?>
                </ol>
                <br/><br/>
                <p>Вы можете добавить новость в данный раздел: </p>
                <form action="index.php" method="post">
                    <textarea name="add_news" id='add_news' placeholder="enter here your news"></textarea>
                    <button class="btn btn-info" type="submit"> Добавить </button>
                    <br/>

                </form>
            </div>
            <div class="tab-pane fade all-tab" id="tab3">
                <p>Состав группы:</p>
                <ul>
                    <li>Александр Савкив</li>
                    <li>Игорь Романенко</li>
                    <li>Саша Корниенко</li>
                    <li>Надя Товстуха</li>
                    <li>Катя Кравченко</li>
                    <li>Елена Камелина</li>
                    <li>И др...</li>
                </ul>
                <hr/>
                <iframe src="chat/" frameborder="0" width="780px" height="800px" align="center" scrolling="auto">
                    Your browser can't show iframe with our little chat
                </iframe>
                
            </div>
            <div class="tab-pane fade all-tab" id="tab4">
                <p>Артамонов Е. Б.</p>
                <p>Беляков О. О.</p>
                <p>Панфьоров О. В.</p>
                <p>Станко С. М.</p>
                <br/><br/>
                <p>Хм.. к размышлению:</p>
                <p>подумайте, может, по асоциации наши преподаватели чем-то напоминают преподавателей того самого Хогвардса</p>
                <p>Интересно узнать Ваше мнение, если да, то кому вы б отдали ту или иную роль Хогвардса</p>
                <table>
                    <tr>
                        <td><img src="images/t6.jpg" id="img"></td>
                        <td><img src="images/t5.jpg" id="img"></td>
                        <td><img src="images/t8.jpg" id="img"></td>
                    </tr>
                    <tr>
                        <td><img src="images/t9.jpg" id="img"></td>
                        <td><img src="images/t2.jpg" id="img"></td>
                        <td><img src="images/t3.jpeg" id="img"></td>
                    </tr>
                </table>
                <br/>
            </div>
            <div class="tab-pane fade all-tab" id="tab5">
                <p>Вторник 18.00-21.00</p>
                <p>Среда 18.00-21.00</p>
                <p>Четверг 18.00-21.00</p>
                <p>Суббота 9.00-15.00</p><br>
                <br/>
                <a href="content/june.xls"><img src="images/down.png"></a>
                <p>Скачать расписание на июнь</p>
            </div>

        </div>
    </div>
<!--======================================Button - Administrator: begin ===========================-->
</div>
<div id="admin">
    <a href="#spoiler-1" data-toggle="collapse" class="btn btn-primary spoiler collapsed">Are you the administrator?</a>
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
<!--======================================Button - Administrator: end ===========================-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<?php include 'clock/index.php';?>
</body>
</html>