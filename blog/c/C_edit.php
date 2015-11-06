<?php
include_once "startup.php";
include_once "model.php";

startup ();

header('Content-type: text/html; charset=windows-1251');
if (!empty($_POST['delete'])){
    $id_article = $_POST['delete'];
    if (articles_delete ($id_article)){
        header("Location: editor.php");
        exit();
    }
}
elseif (!empty($_POST['save'])){
    $id_article = $_POST['save'];
    if (articles_edit ($id_article, $_POST['title'], $_POST['content'])){
        header("Location: editor.php");
        exit();
    }
    $title = $_POST['title'];
    $content = $_POST['content'];
}
else {
    $id_article = $_GET['id'];
    $article = get_article($id_article);
    $title = $article['title'];
    $content = $article['content'];
}
$contentPage = view_include ("theme/v_edit.php", array('id_article' => $id_article, 'title' => $title, 'content' => $content));
$page = view_include ("theme/v_base_pattern.php", array('content' => $contentPage));

echo $page;
?>