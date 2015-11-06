
    <h3><b>Main page | </b><a href="editor.php">Console editor</a></h3>
    <hr/>
    <? foreach ($articles as $article):?>
        <h3><a href="article.php?id=<?=$article['id_article']?>"><?=$article['title']?></a></h3>
        <?=$article['content']?>
        <br/>
    <?endforeach?>
