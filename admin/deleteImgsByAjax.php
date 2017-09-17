<?php
/**
 * Created by PhpStorm.
 * User: xiaohao
 * Date: 17-9-11
 * Time: 下午11:33
 */

include("../mvc/dao/EssayDaoImpl.php");
include ("../mvc/entity/Essay.php");
$imgId=$_GET['imgId'];
$essay=new  EssayDaoImpl();
if($essay->deleteEssayImg($imgId)){
    echo "ok";
}else{
    echo "fail";
}





