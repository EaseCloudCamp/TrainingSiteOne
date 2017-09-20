<?php
/**
 * Created by PhpStorm.
 * User: mosiqi
 * Date: 17-9-14
 * Time: 下午2:17
 */
$navigationType = $_GET['typeName'];
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "eten";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$sql = "SELECT * FROM essay WHERE navigation_type=" . $navigationType;
echo $sql;

$rs = $conn->query($sql);

$rows = $rs->fetch_all();


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

    <title>Add article</title>

    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
    <meta http-equiv="description" content="This is my page">
    <link rel="stylesheet" type="text/css" href="../css/common.css"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <script type="text/javascript" src="../js/libs/modernizr.min.js"></script>
    <!--
    <link rel="stylesheet" type="text/css" href="styles.css">
    -->

    <script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
    <script type="text/javascript" src="../uploadify/jquery.uploadify.js"></script>
    <link rel="stylesheet" type="text/css" href="../uploadify/uploadify.css">
    <script type="text/javascript"></script>
    <script type="text/javascript" src="../js/essayManager.js"></script>

</head>
<body>
<table class="result-tab" width="100%" border="1">
    <tbody>


    <tr style="text-align:center;">
        <th>
            <input type="checkbox" id="id_all" onclick="allSelect(this)">
        </th>
        <th>Serial number</th>
        <th>Class</th>
        <th>Article name</th>
        <th>Operation</th>

    </tr>

    <?php

    $num = 1;
    foreach ($rows as $row) {

        ?>

        <tr style="text-align: center">
            <td><input type="checkbox" id="<?php echo $row[0] ?>"></td>
            <td><?= $num++ ?></td>
            <td><?php if ($navigationType == '1') {
                    echo "speaker";
                } ?></td>
            <td><?php echo $row[2] ?></td>
            <td><a href="">delete</a>&nbsp;<a href="">modity</a></td>
        </tr>

        <?php
    }
    ?>

    </tbody>
</table>
<input type="submit" style="cursor: pointer" value="批量删除" >
</body>
</html>