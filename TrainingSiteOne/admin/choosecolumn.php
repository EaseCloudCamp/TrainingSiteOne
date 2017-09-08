<?php
/**
 * Created by PhpStorm.
 * User: XIAOHAO
 * Date: 2017-08-28
 * Time: 15:17
 */
session_start();
function customError($errno, $errstr)  //错误处理器
{
    //啥都不处理
    $column="gallery";
}
set_error_handler("customError");
if ($_SESSION['admin'] == null) {
    header("Location:../login.php");
    exit;
}
$column = $_GET['typeName'];