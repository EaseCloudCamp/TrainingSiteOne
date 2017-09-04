<?php
/**
 * Created by PhpStorm.
 * User: XIAOHAO
 * Date: 2017-08-28
 * Time: 13:41
 */


session_start();
//require_once (__DIR__."/mvc/dao/AdminDaoImpl.php");
require_once ("../mvc/dao/AdminDaoImpl.php");
$username = $_POST['username'];
$password = $_POST['password'];

if ($username != null) {
    $admin = new AdminDaoImpl();
    $flag = $admin->login($username, $password);
    if ($flag) {
        header('Location:../admin/index.php');
        exit;
    }
}
?>