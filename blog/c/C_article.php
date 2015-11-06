<?php
include_once "startup.php";
include_once "model.php";



if(!empty($_GET)){
    startup();
    $id_atricle = $_GET['id'];
    $article = get_article ($id_atricle);
    $content = view_include ("theme/v_article.php", $article);
    $page = view_include ("theme/v_base_pattern.php", array('content' => $content));

    echo $page;
}
else {
    header("Location: index.php");
}

?>