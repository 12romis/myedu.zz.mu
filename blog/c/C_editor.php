<?php
include_once('startup.php');
include_once('model.php');

startup();

$articles = articles_all();

$content = view_include ("theme/v_editor.php", array('articles' => $articles));

$page = view_include ("theme/v_base_pattern.php", array('content' => $content));
//header('Content-type: text/html; charset=windows-1251');

echo $page;

?>