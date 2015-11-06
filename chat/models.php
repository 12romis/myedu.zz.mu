<?

function get_messages (){
    $sql = "SELECT * FROM messages ORDER BY dt DESC ";
    $result = mysql_query($sql);

    if (!$result){
        die (mysql_error());
    }

    $n = mysql_num_rows ($result);
    $arr = array();

    for ($i=0; $i<$n; $i++){
        $row = mysql_fetch_assoc($result);
        $arr[]= $row;
    }
    return $arr;
}

function send_message ($name, $text){
    $name = trim($name);
    $text = trim($text);

    if ($name==''|| $text==''){
        return;
    }
    date_default_timezone_set("Europe/Kiev");

        $dt = date('Y-m-d H:i:s');

    $sql = "INSERT INTO messages (dt, name, text) VALUES ('$dt', '$name', '$text')";

    $result = mysql_query($sql);

    if (!$result){
        die (mysql_error());
    }
}


?>