<?php
/**
 * Created by PhpStorm.
 * User: xiaohao
 * Date: 17-9-14
 * Time: 下午2:43
 */

$aboutId=$_POST['aboutId'];
$aboutDesc=$_POST['aboutDesc'];
$username = "west3453";
$password = "West263453";
$url = "sql.m32.vhostgo.com";
$conn = new mysqli($url, $username, $password, "west3453");

if ($conn->connect_error) {
    echo "<script>alert('数据库链接失败')</script>";
}
$sql ="update  about set  about_desc='".$aboutDesc."' where about_id='".$aboutId."'";
$rs=$conn->query($sql);
echo "save success";
$conn->close();