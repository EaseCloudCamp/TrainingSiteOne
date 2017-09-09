<?php
/**
 * Created by PhpStorm.
 * User: mosiqi
 * Date: 17-9-9
 * Time: 下午4:20
 */
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "eten";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$sql = "SELECT * FROM essay";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["essay_name"];
    }
} else {
    echo "0 个结果";
}
$conn->close();