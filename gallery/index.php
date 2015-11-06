<?php
include_once ('startup.php');
include_once ('models.php');
startup();
//============================================ start script
    $errors = array("<h1 style='color: red'>You didn't take a file!(</h1><br>",
        "<h1 style='color: red'>Size of file is more then max!(</h1><br>",
        "<h1 style='color: red'>You try download not an image file!(</h1><br>",
        "<h1 style='color: greenyellow'>File is downloaded successful</h1><br>",
        "<h1 style='color: red'>The file wasn't downloaded </h1><br>");
    if (isset($_FILES ['file'])){
        $error = upload($_FILES ['file']);
        header("Location: index.php?error=$error");
        exit();
    }
    elseif (isset($_GET['error'])){
        $str = $_GET ['error'];
        echo $errors[$str];
    }
debug('we are here: index/before $picts = get_pict();');
$picts = get_pict();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Little gallery</title>
    <link rel="icon" href="../images/ico.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../images/ico.ico" type="image/x-icon">
</head>
<body style="background-image: url('3.jpg'); color: white; font-size: 1px">
<div style="color: darkblue; font-size: 20px">
<h1>Pictures:</h1>
<?php
debug('we are here: index/before foreach ($pict as $m)');
foreach ($picts as $m){
    echo "<div style='display: inline-block'>";
    echo "<a href='big.php?id=" . $m['id_pict'] . '.' . $m['type'] . "'> <img src='" . 'img_small/' . $m['id_pict'] . '.' . $m['type'] . "'/></a><br>";
    echo "Views: " . $m['views'];
    echo "</div>";
    debug("we are here: index/ foreach ($picts as $m)" . ' $m[id_pict] = ' . $m['id_pict'] . ' $m[type] = ' . $m['type'] . ' $m[views] = ' . $m['views']);
}
debug('we are here: index/after foreach ($pict as $m)');
?>

<br/><br/><br/>
<hr/>
    <h2>Please add to gallery your favorite photo!</h2>

    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file"/>
        <input type="submit" value="Add"/>
    </form>
<hr/>
<a href="../">Return on MAIN page (myedu.zz.mu)</a>
<br/><br/>
</div>
</body>
</html>