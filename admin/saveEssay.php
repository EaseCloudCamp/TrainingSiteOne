<?php
/**
 * Created by PhpStorm.
 * User: xiaohao
 * Date: 17-9-7
 * Time: 下午4:17
 */


$nav = $_POST['navigationType'];
$essayName = $_POST['essayName'];


$imgNum = $_POST['num'];

$imgs = array();

for ($i = 0; $i < $imgNum; $i++) {
    $name = "img" . $i;
    array_push($imgs, $_POST[$name]);
}



saveEssay($essayName, $nav);
saveImgs($imgs, $essayName);


function saveImgs($imgs, $essayName)
{

    $username = "west3453";
    $password = "West263453";
    $url = "sql.m32.vhostgo.com";
    $conn = new mysqli($url, $username, $password, "west3453");

    $essayIdSQL = "select essay_id from essay WHERE essay_name='" . $essayName . "'";


    $rs = $conn->query($essayIdSQL);
    $row = $rs->fetch_row();
    $essayId=$row[0];



    for($i=0;$i<count($imgs);$i++){

        saveOne($imgs[$i],$essayId);
    }
    $rs->close();
    $conn->close();


}

function saveEssay($essayName, $navigationType)
{

    $username = "west3453";
    $password = "West263453";
    $url = "sql.m32.vhostgo.com";
    $conn = new mysqli($url, $username, $password, "west3453");
    $saveSQL = "insert into essay(navigation_type, essay_name) VALUES ('" . $navigationType . "','" . $essayName . "')";


    if ($conn->query($saveSQL)) {

        echo "essay upload success";
    }

    $conn->close();

}

function saveOne($img, $essayId)
{


    $imgPath = "image/essay/" . $img;


    $username = "west3453";
    $password = "West263453";
    $url = "sql.m32.vhostgo.com";
    $conn = new mysqli($url, $username, $password, "west3453");
    $saveSQL = "insert into picture(essay_id, essay_uri,picture_realFileName) VALUES ('" . $essayId . "','" . $img . "','" . $imgPath . "')";
    if ($conn->query($saveSQL)) {
        echo "<br>Images upload success";
    }
    $conn->close();
}

