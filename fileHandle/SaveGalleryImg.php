<?php
/**
 * Created by PhpStorm.
 * User: xiaohao
 * Date: 17-9-12
 * Time: 下午4:51
 */



$timestr = date("YmdHis") . floor(microtime() * 1000);
$filename = $_FILES['file']['name'];
$allowFile = array("jpg", "jpeg", "png");
$temp = explode(".", $filename);
$fileType = end($temp);

$filepath = realpath(dirname(__FILE__).'/../')."/image/gallery/";

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
         addImages($timestr.$filename);
        echo "ok";
    }
} else {
    echo "非法的文件格式";
}

function addImages($imgName)
{
    // TODO: Implement addImages() method.
    $username = "west3453";
    $password = "West263453";
    $url = "sql.m32.vhostgo.com";
    $conn = new mysqli($url, $username, $password, "west3453");
    if ($conn->connect_error) {
        echo "<script>alert('数据库链接失败')</script>";
    }
     $imgPath = "image/gallery/" . $imgName;
     $saveSQL = "insert into gallery(gallery_name, gallery_uri) VALUES ('" . $imgName . "','" . $imgPath . "')";
    if ($conn->query($saveSQL)) {
        echo "<br>保存成功";
    }
    $conn->close();
}