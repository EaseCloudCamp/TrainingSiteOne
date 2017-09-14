<?php
/**
 * Created by PhpStorm.
 * User: xiaohao
 * Date: 17-9-14
 * Time: 下午2:43
 */

$aboutId=$_POST['aboutId'];
$aboutDesc=$_POST['aboutDesc'];


$username = "root";
$password = "root";
$url = "localhost:3306";
$conn = new mysqli($url, $username, $password, "eten");
if ($conn->connect_error) {
    echo "<script>alert('数据库链接失败')</script>";
}
$sql ="update  about set  about_desc='".$aboutDesc."' where about_id='".$aboutId."'";
$rs=$conn->query($sql);
echo "保存成功";
$conn->close();