<?php
///**
// * Created by PhpStorm.
// * User: xiaohao-pc
// * Date: 17-8-30
// * Time: 上午9:27
// */
//
include("mvc/dao/GalleryImpl.php");
//include("mvc/dao/EssayDaoImpl.php");
//$essayImpl=new EssayDaoImpl();
//if(($essayRows=$essayImpl->findEssay())==null){
//    echo "<script>alert('获取数据失败')</script>";
//}
//
function customError($errno, $errstr)  //错误处理器
{
    //啥都不处理
}
set_error_handler("customError");
$currentPage = 0;
$currentPage = $_GET['currentPage'];
if ($currentPage == null) {
    $currentPage = 1;
}
$gallery = new GalleryImpl();
$rows = $gallery->findImages($currentPage);
$pages = ceil(GalleryImpl::$nums / 10);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!-- saved from url=(0038)http://eternalsound.dk/webgallery.html -->

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--<base href="http://eternalsound.dk:80/">-->
    <base href=".">

    <title>Gellery - Eternal sound</title>

    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="keywords" content="Gellery - Eternal sound">
    <meta http-equiv="description" content="Gellery - Eternal sound">
    <link rel="stylesheet" href="css/screen.css" media="screen">
    <link rel="stylesheet" href="css/lightbox.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/jquery.pagepiling.css">
    <link rel="stylesheet" type="text/css" href="css/examples.css">

    <!--
    <link rel="stylesheet" type="text/css" href="styles.css">
    -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>

    <script type="text/javascript" src="js/jquery.pagepiling.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#nav li").hover(function () {
                $(this).find("ul").slideDown("slow");
            }, function () {
                $(this).find("ul").slideUp("fast");
            });
        });
    </script>

    <style>
        #section2 .intro {
            left: -150%;
            position: relative;
        }

        #section2 p {
            display: none;
        }

        #section3 .intro {
            left: 140%;
            position: relative;
        }

        .page ul li {
            font-size: 30px;
            display: inline-block;
            background-color: #3a3f41;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            text-align: center;
            line-height: 50px;
        }

        .page ul li:hover {
            background-color: #586b6d;
        }

        .page li a {

            width: 100%;
            height: 100%;
            background: none;

        }


    </style>

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/lightbox-2.6.min.js"></script>


</head>

<body style="background-color: rgb(241, 241, 241);">
<div class="headerbg"></div>
<div class="header">
    <div class="w1000">
        <div class="logo">
            <a href="index.php"><img src="image/gallery/logo.png"></a>
        </div>
        <div class="nav">
            <ul id="nav">
                <li class="mainlevel">
                    <a>Speaker</a>
                    <ul>
<!--                        --><?php
//                        foreach ($essayRows as $row) {
//                            echo "<li><a href='#'>" . $row[2] . "</a></li>";
//                        }
//                        ?>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "root";
                        $dbname = "eten";
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("连接失败: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM essay WHERE navigation_type='1'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {

                            while($row = $result->fetch_assoc()) {
                                echo "<li style='font-size: 20px'>".$row["essay_name"]."</li>";
                            }
                        } else {
                            echo "0 个结果";
                        }
                        $conn->close();
                        ?>
                        <li><a href="gellery1/Gellery%20-%20Eternal%20sound.html">Speaker</a></li>
                    </ul>
                </li>
                <li class="mainlevel">
                    <a>Amplifier</a>
                    <ul>
                        <?php
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

                        $sql = "SELECT * FROM essay WHERE navigation_type='2'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {

                            while($row = $result->fetch_assoc()) {
                                echo "<li style='font-size: 20px'>".$row["essay_name"]."</li>";
                            }
                        } else {
                            echo "0 个结果";
                        }
                        $conn->close();
                        ?>
                    </ul>
                </li>
                <li><a href="gallery.php">Gallery</a>
                </li>
                <li><a href="US.php" target="_blank">US</a></li>
            </ul>

        </div>
    </div>
</div>


<section id="examples" class="section examples-section">
    <div class="image-row">
        <div class="image-set" style="min-height: 450px;">
            <?php
            foreach ($rows as $row) {
                echo "<a class='example-image-link' href=" . '"' . $row[2] . '"' . "data-lightbox='example-set' title=''>
                <img class='example-image' src=" . '"' . $row[2] . '"' . " width='180' height='150'
                     style='float: left;'>
                      </a>";
            }
            ?>
            <div class="page" style="margin-top: 20px;clear: left;">
                <ul>
                    <?php
                    for ($i = 1; $i <= $pages; $i++) {

                        echo "<li><a href='gallery.php?currentPage=" . $i . "'>";
                        echo $i;
                        echo "</a></li>";
                    }
                    ?>
                </ul>


            </div>
        </div>
    </div>
</section>
<div class="footer">
    <div
        style="width: 1000px;margin: 0 auto;line-height: 100px;text-align: center;font-family: inherit;font-size: 20px;">
        Copyright © 2015 Eternal sound. All rights reserved.<img src="images/fb.png"><img src="images/t.png">
    </div>
</div>

</body>
</html>