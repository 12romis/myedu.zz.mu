<?php
/**
 * Created by PhpStorm.
 * User: Романенко Ігор
 * Date: 05.11.2015
 * Time: 8:29
*/

function connectDB () {
    $hostname = 'localhost';
    $username = 'u544040331_igor';
    $password = 'Romisek1';
    $dbname = 'u544040331_msg';

    setlocale(LC_ALL, 'ru_RU.CP1251');

    mysql_connect($hostname, $username, $password) or die('No connect with data base');
    mysql_query('SET NAMES cp1251');
    mysql_select_db($dbname) or die('No data base');
}

function insertDB () {
    $name = trim($_POST['name']);
    $answer = $_POST['answer'];

    if ($name==''){
        return;
    }

    $dt = date('Y-m-d, H:i:s');

    $sql = "INSERT INTO answers (date, name, answer) VALUES ('$dt', '$name', '$answer')";

    $result = mysql_query($sql);

    if (!$result){
        die (mysql_error());
    }
}

function getResult () {

    $answers = array();
    $sum = 0;
    //$sql = "SELECT * FROM answers WHERE answer = '$number'";
    $sql = "SELECT answer, COUNT(answer) FROM answers GROUP BY answer";
    $result = mysql_query($sql);

    if (!$result){
        die (mysql_error());
    }

    for ($i=0; $i<5; $i++){
        $row = mysql_fetch_assoc($result);
        $sum += $row['COUNT(answer)'];
        switch ($row['answer']){
            case '1': $answers[0]= $row['COUNT(answer)'];break;
            case '2': $answers[1]= $row['COUNT(answer)'];break;
            case '3': $answers[2]= $row['COUNT(answer)'];break;
            case '4': $answers[3]= $row['COUNT(answer)'];break;
            case '5': $answers[4]= $row['COUNT(answer)'];break;
        }
    }
    $answers[5]=$sum;
    return $answers;
}
connectDB();
if (!empty ($_POST)){
    setcookie('isAnswer', time()+60*60*24*30);
    insertDB();
}
$answers = getResult();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>result</title>
</head>
<body>
<script src="https://www.google.com/jsapi"></script>
<script>
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Газ', 'Объём'],
            ['Вариант 1', <?=$answers[0]/$answers[5]*100?>],
            ['Вариант 2', <?=$answers[1]/$answers[5]*100?>],
            ['Вариант 3', <?=$answers[2]/$answers[5]*100?>],
            ['Вариант 4', <?=$answers[3]/$answers[5]*100?>],
            ['Вариант 5', <?=$answers[4]/$answers[5]*100?>]
        ]);
        var options = {
            title: 'Ответы',
            is3D: true,
            pieResidueSliceLabel: 'Остальное'
        };
        var chart = new google.visualization.PieChart(document.getElementById('chart'));
        chart.draw(data, options);
    }
</script>
<style>
    #wrapper{
        margin-top: -80px;
        padding: 30px;
        background: aquamarine none repeat scroll 0% 0%;
        position: relative;
    }
</style>
<div id="wrapper">

    <h1>Результаты</h1><br/>

    <div id="chart"></div>

    За вариант 1 (ещё 4 занятия по сетям) - <?= $answers[0] ?><br/>
    За вариант 2 (джава с Беляковым) - <?= $answers[1] ?><br/>
    За вариант 3 (проектирование и планирование, формирование ТЗ (классика и реальность),
    подход к работе с клиентами и командой <b> у Артамонова</b>) - <?= $answers[2] ?><br/>
    За вариант 4 (css через 2-3 недели (вероятно у Артамонова)) - <?= $answers[3] ?><br/>
    За вариант 5 (Интернет технологии (вместе с ООП в JS)) - <?= $answers[4] ?><br/>

</div>
</body>
</html>