<?php
/**
 * Created by PhpStorm.
 * User: xiaohao
 * Date: 17-9-5
 * Time: 上午8:57
 */
include("mvc/dao/EssayDaoImpl.php");
include "mvc/entity/Essay.php";
echo __FILE__."<BR>";
echo dirname(__FILE__)."<br>";
echo dirname(__FILE__)."/../"."<br>";
echo realpath(dirname(__FILE__)."/../")."<br>";



$essay=new EssayDaoImpl();
$item=new Essay();
$item->setEssayId("3");
$item->setNavigationType("1");
$essay->delEssay($item);
$rows=$essay->fingEssayImgsByNavigationName("方法");
foreach ($rows as $row) {

    echo $row[0];
}


if(($rows=$essayImpl->findEssayByNavigationType('1'))==null){
    echo "<script>alert('获取数据失败')</script>";
}


foreach ($rows as $row) {
    echo "<li><a href='#'>" . $row[2] . "</a></li>";
}


?>
