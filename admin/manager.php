<?php
/**
 * Created by PhpStorm.
 * User: xiaohao-pc
 * Date: 17-8-31
 * Time: 下午5:41
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
if($column==null){

    $column="Speaker";
}

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <base href="<%=basePath%>">

    <title>speaker</title>

    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
    <meta http-equiv="description" content="This is my page">
    <link rel="stylesheet" type="text/css" href="../css/common.css"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <script type="text/javascript" src="../js/libs/modernizr.min.js"></script>
    <style type="text/css">
        li{
            list-style: none;
        }

        ul{
            padding: 0;
        }

        a
        {
            text-decoration: none;
        }
    </style>
</head>

<body>
<h2></h2>
<div class="sidebar-content">
    <ul class="sidebar-list">
        <li>
            &nbsp;&nbsp;<?php
            echo $column;
            ?>
            <ul class="sub-menu">
                <!--   <li><a href="${pageContext.request.contextPath}/about/about_findByAboutId.do" target="rigth">about</a></li>
 -->
                <?php
                if ($column == 'Speaker') {
                    echo "<li><a href='addEssay.php?typeName=1' target='rigth'>Add Article</a></li>";
                    echo "<li><a href='' target='rigth'>Article Manager</a></li>";
                }

                if ($column == 'US') {
                    echo "<li><a href='' target='rigth'>US</a></li>";
                }
                if ($column == 'Gallery') {

                    echo "<li><a href='' target='rigth'>Add Article</a></li>";
                    echo "<li><a href='' target='rigth'>Article Manager</a></li>";

                }
                if ($column == 'Amplifier') {
                    echo "<li><a href='' target='rigth'>US</a></li>";
                }
                ?>
            </ul>
        </li>
    </ul>
</div>

</body>
</html>
