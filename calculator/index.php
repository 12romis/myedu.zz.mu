<?php
    if (isset ($_POST ['username'])){
    setcookie("username", $_POST ['username']);
    }

    if ($_POST ['clear_history']=='on'){
        setcookie("history", '');
        $_POST ['a']='';
        $_POST ['b']='';

    }
    else {

        $rez = my_result($_POST ['a'], $_POST ['b'], $_POST ['znak']);
        if (isset ($_POST ['b']) && isset ($_POST ['a'])) {
            if (empty ($_POST ['a'])&& empty ($_GET ['a'])) $_POST ['a'] = 0;
            if (empty ($_POST ['b'])&& empty ($_GET ['b'])) $_POST ['b'] = 0;
            $history = $_COOKIE ['history'] . $_POST ['a'] . ' ' . $_POST ['znak'] . ' ' . $_POST ['b'] . ' = ' . $rez . '&#10;';
            setcookie("history", $history);
        }
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="icon" href="../images/ico.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../images/ico.ico" type="image/x-icon">

</head>
<body>

<?php
    function my_result ($a, $b, $znak){
        if ($a=='') $a=0;
        switch ($znak) {
            case '+':
                $rez = $a + $b;
                break;
            case '-':
                $rez = $a - $b;
                break;
            case '*':
                $rez = $a * $b;
                break;
            case '/':
                if ($b==0)
                    $rez = "error!!!";
                else
                    $rez = $a / $b;
                break;
        }

        return $rez;
    };

?>

<div class="wrapper">

    <form action="index.php" method="post">
        <?php
            if (isset ($_COOKIE ['username'])) {
                $username = $_COOKIE ['username'];
                echo "<p>Hello " . $username . "! :)</p>";
            }
            elseif (isset ($_POST ['username'])) {
                $username = $_POST ['username'];
                echo "<p>Hello " . $username . "! :)</p>";
            }
            else
                echo "Enter your name: <input type='text' name='username' class='inp'>";
        ?>


        <input type="text" name="a" class="inp" value="<?php echo $_POST ['a'];?>"/>

        <select name="znak">
            <option value="+" <?php if ($_POST ['znak']=='+') echo "selected"?>>+</option>
            <option value="-" <?php if ($_POST ['znak']=='-') echo "selected"?>>-</option>
            <option value="*" <?php if ($_POST ['znak']=='*') echo "selected"?>>*</option>
            <option value="/" <?php if ($_POST ['znak']=='/') echo "selected"?>>/</option>
        </select>

        <input type="text" name="b" class="inp" value="<?php echo $_POST ['b'];?>"/>
        <input type="submit" value="=" class="submit"/>
        <input type="text" value="<?php echo "$rez";?>"
               disabled class="inp"/>
        <br/>
        <br/>
        <pre> <!--  Clear history <input type="checkbox" name="clear_history"/> <br><br>-->   history: </pre>



        <textarea  class="last" disabled style=" overflow: inherit"><?php
            if ( isset ($_POST ['b']))echo $history ;
            ?></textarea>
        <button name="clear_history" value="on" class="clear">Clear history</button>
    </form>
</div>

</body>
</html>


