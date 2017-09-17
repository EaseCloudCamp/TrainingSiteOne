<?php
/**
 * Created by PhpStorm.
 * User: xiaohao
 * Date: 17-9-11
 * Time: 下午10:46
 */

include("../mvc/dao/EssayDaoImpl.php");
include ("../mvc/entity/Essay.php");




$newName=$_GET['newName'];
$essayId=$_GET['essayId'];
$essay=new  EssayDaoImpl();
if($essay->modifyEssayName($essayId,$newName)){
    echo "ok";
}else{
    echo "fail";
}
