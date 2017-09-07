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
echo $imgNum;
$imgs = array();

for ($i = 0; $i < $imgNum; $i++) {
    $name = "img" . $i;
    array_push($imgs, $_POST[$name]);
}



saveEssay($essayName, $nav);
saveImgs($imgs, $essayName);


function saveImgs($imgs, $essayName)
{

    $username = "root";
    $password = "root";
    $url = "localhost:3306";
    $dbname = "eten";

    $conn = new mysqli($url, $username, $password, $dbname);
    $essayIdSQL = "select essay_id from essay WHERE essay_name='" . $essayName . "'";
    echo "<br>" . $essayIdSQL;
    $rs = $conn->query($essayIdSQL);
    $essayId = $rs->fetch_row()[0];


    echo "<br>长度:".count($imgs);

    for($i=0;$i<count($imgs);$i++){

        saveOne($imgs[$i],$essayId);
    }
    $rs->close();
    $conn->close();


}

function saveEssay($essayName, $navigationType)
{


    $username = "root";
    $password = "root";
    $url = "localhost:3306";
    $dbname = "eten";

    $conn = new mysqli($url, $username, $password, $dbname);
    $saveSQL = "insert into essay(navigation_type, essay_name) VALUES ('" . $navigationType . "','" . $essayName . "')";

    echo "<br>" . $saveSQL;
    if ($conn->query($saveSQL)) {

        echo "保存成功";
    }

    $conn->close();

}

function saveOne($img, $essayId)
{

    echo "<br>".$img;
    $imgPath = "image/essay/" . $img;

    echo "<br>".$imgPath;
    $username = "root";
    $password = "root";
    $url = "localhost:3306";
    $dbname = "eten";
    $conn = new mysqli($url, $username, $password, $dbname);
    $saveSQL = "insert into picture(essay_id, essay_uri,picture_realFileName) VALUES ('" . $essayId . "','" . $img . "','" . $imgPath . "')";
    if ($conn->query($saveSQL)) {
        echo "<br>保存成功";
    }
    $conn->close();
}

