<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Review photo</title>
    <link rel="icon" href="../images/ico.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../images/ico.ico" type="image/x-icon">
</head>
<body style="background-color: whitesmoke; color: whitesmoke">
    <?php
        include_once ('models.php');
             $id = $_GET ['id'];
        if (!isset ($_GET['views'])){
            include_once ('startup.php');
            startup();
            $id_pict = explode(".", $id);
            $views = views_up($id_pict[0]);
            header("Location: big.php?id=$id&views=$views");
        }
    ?>
    <div style="color: darkblue">
        <h1>Review photo:</h1><br/>
        <hr/>
        <img src="img/<?php echo $id; ?>" alt="Was mistake"/>

        <?php
            echo "<br> Views of this picture: " . $_GET ['views'];
        ?>
        <br/>
        <hr/>
        <a href="index.php">Return on previous page (to gallery)</a>
        <hr/>
        <br/><br/>
    </div>
</body>
</html>
