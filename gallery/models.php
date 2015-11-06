<?php
function debug ($str) {
    $file = fopen('debug.txt', 'a+');
    fwrite($file, "\r\n $str");
    fclose($file);
}

function get_pict (){
    debug('we are here: models/in function get_pict()');
    $sql = "SELECT * FROM pict ORDER BY views DESC";
    $result = mysql_query($sql);
    debug("we are here: models/after function get_pict() point 1 $result");
    if (!$result){
        die (mysql_error());
    }

    $n = mysql_num_rows ($result);
    $arr = array();
    debug("we are here: models/after function get_pict() point 2 $result");
    for ($i=0; $i<$n; $i++){
        $row = mysql_fetch_assoc($result);
        $arr[]= $row;
    }
    debug('we are here: models/after function get_pict()');
    return $arr;
}

function get_last_id (){
    debug('we are here: models/in function get_last_id ()');
//    $sql = "SELECT * FROM messages ORDER BY dt ASC ";
    $sql = "SELECT * FROM pict ORDER BY id_pict DESC LIMIT 1";
    $result = mysql_query($sql);
    $max = mysql_fetch_array($result);
    if (!$max){
 //       die (mysql_error());
        $max[0] = 0;
    }

    debug("'max[0] = ' $max[0]");
    return $max[0];
}

function upload($file){

    $types = array('image/jpg', 'image/png', 'image/gif', 'image/jpeg');
    if ($file['name']==''){
        return 0;
    }
    elseif ($file['size']>1000000){
        return 1;
    }
    elseif (!in_array($file['type'], $types)){
        return 2;
    }


    $tmp_name = explode(".", $file['name']);
    $pict_name = (get_last_id()+1) . '.' . $tmp_name[1];
    $dir = "img/". $pict_name;
    $dir2 = "img_small/" . $pict_name;
    debug('we are here: models/in function upload()' . ' $pict_name = ' . $pict_name . '$dir = ' . $dir . ' $tmp_name[1] = ' . $tmp_name[1]);
    debug('$file[tmp.name] = ' . $file['tmp.name']);

    if (copy($file['tmp_name'],  $dir)){
        $error =  3;
        img_resize ($dir, $dir2, 200, 150);
        put_pict($tmp_name[1]);
    }
    else {
        $error =  4;
    }
    return $error;
}

function img_resize($src, $dest, $width, $height, $rgb=0xFFFFFF, $quality=100)
{
    debug('we are here: models/in function img_resize()');
    if (!file_exists($src)) return false;

    $size = getimagesize($src);

    if ($size === false) return false;

    // ���������� �������� ������ �� MIME-����������, ���������������
    // �������� getimagesize, � �������� ��������������� �������
    // imagecreatefrom-�������.
    $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
    $icfunc = "imagecreatefrom" . $format;
    if (!function_exists($icfunc)) return false;

    $x_ratio = $width / $size[0];
    $y_ratio = $height / $size[1];

    $ratio       = min($x_ratio, $y_ratio);
    $use_x_ratio = ($x_ratio == $ratio);

    $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);
    $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
    $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
    $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);

    $isrc = $icfunc($src);
    $idest = imagecreatetruecolor($width, $height);

    imagefill($idest, 0, 0, $rgb);
    imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0,
        $new_width, $new_height, $size[0], $size[1]);

    imagejpeg($idest, $dest, $quality);

    imagedestroy($isrc);
    imagedestroy($idest);

    return true;

}

function views_up ($id){
    debug('we are here: models/in function views ()');
    $sql_get = "SELECT views FROM pict WHERE id_pict = $id";
    $count = mysql_fetch_array(mysql_query($sql_get));
    debug("count[0] $id = $count[0]");
    $count = $count[0] + 1;
    debug("count $id= $count");

    $sql_put = "UPDATE pict SET views=$count WHERE id_pict = $id";

    $result = mysql_query($sql_put);

    if (!$result) {
        die (mysql_error());
    }
        return $count;
}

function put_pict ($type){
    debug('we are here: models/in function put_pict() $type = ' . $type);
    $sql_put = "INSERT INTO pict (type, views) VALUES ('$type', '0')";

    $result = mysql_query($sql_put);

    if (!$result) {
        die (mysql_error());
    }

}



?>