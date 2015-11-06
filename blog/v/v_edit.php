
    <a href="index.php">Main page</a> |
    <a href="editor.php">Console editor</a>
    <hr/>
    <h1>Editing the article</h1>
    <form method="post" target="edit.php">
        Title:
        <br/>
        <input type="text" name="title" value="<?=$title?>"/>
        <br/>
        <br/>
        Content:
        <br/>
        <textarea name="content"><?=$content?></textarea>
        <br/>
        <button name="save" value="<?=$id_article?>">Save</button>
        <button name="delete" value="<?=$id_article?>">Delete</button>
    </form>
