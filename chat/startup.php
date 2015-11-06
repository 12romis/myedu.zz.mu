<?php

function startup (){

    $hostname = 'localhost';
    $username = 'u544040331_igor';
    $password = 'Romisek1';
    $dbname = 'u544040331_msg';


    setlocale(LC_ALL, 'ru_RU.CP1251');
    $link = mysql_connect($hostname, $username, $password) or die ('No connect to data base');
    mysql_query('SET NAMES cp1251');
    mysql_select_db($dbname) or die ('No data base');

    session_start();

}

?>