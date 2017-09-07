<?php
/**
 * Created by PhpStorm.
 * User: xiaohao
 * Date: 17-9-4
 * Time: 下午2:47
 */

$timestr = date("YmdHis") . floor(microtime() * 1000);
$filename = $_FILES['file']['name'];
$allowFile = array("jpg", "jpeg", "png");
$temp = explode(".", $filename);
$fileType = end($temp);

$filepath = realpath(dirname(__FILE__).'/../')."/image/essay/";

$nav=$_POST["navigationType"];


if (($_FILES['file']['type'] == 'image/gif'
        || $_FILES['file']['type'] == 'image/png'
        || $_FILES['file']['type'] == 'image/jpg'
        || $_FILES['file']['type'] == 'image/jpeg'
    ) && $_FILES['file']['size'] < 204800 && in_array($fileType, $allowFile)) {
    if ($_FILES['file']['error'] > 0) {
        echo "错误";
        return;
    }

    $filefullname = $filepath . $timestr . $filename;
    if (file_exists($filefullname)) {

        echo $timestr . $filename;
    } else {
        move_uploaded_file($_FILES['file']['tmp_name'], $filefullname);
        echo $timestr . $filename;
    }
} else {
    echo "非法的文件格式";
}


