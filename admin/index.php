
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrator</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="icon" href="../images/ico.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../images/ico.ico" type="image/x-icon">

</head>
<body>
<?php
    $lines = file('visitors.txt');
    if ($_POST['admin']!='igor'){
        echo "<div class = 'wrapper'><h1>You enter a wrong password</h1><br><h3>This mean what you don't can see this page,
                  please return on previous page</h3> <br><br/><a href='../'>return</a></div>";
        exit();
    }
?>
<div class="wrapper">
    <h1>What do you want?</h1>

    <h3>You can see browsing history:</h3>

    <table border="3">
        <tr>
            <td>№ п/п </td>
            <td>Time </td>
            <td>IP-address</td>
            <td>From where</td>
        </tr>
        <?php
        $n = count($lines);
        for ($i=0; $i<$n; $i+=3){
            echo '<tr>';
                echo "<td>" . ($i/3+1) . "</td>";
                echo "<td>" . $lines[$i+0] . "</td>";
                echo "<td>" . $lines[$i+1] . "</td>";
                echo "<td>" . $lines[$i+2] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>


</body>
</html>


