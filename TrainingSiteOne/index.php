<?php
///**
// * Created by PhpStorm.
// * User: xiaohao-pc
// * Date: 17-8-28
// * Time: 下午2:25
// */
//include("mvc/dao/EssayDaoImpl.php");
//$essayImpl=new EssayDaoImpl();
// if(($rows=$essayImpl->findEssay())==null){
//      echo "<script>alert('获取数据失败')</script>";
// }
//?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!-- saved from url=(0023)http://eternalsound.dk/ -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--<base href="http://eternalsound.dk:80/">-->
    <base href=".">

    <title>Eternal sound</title>

    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="keywords" content="Eternal sound">
    <meta http-equiv="description" content="Eternal sound">
    <link rel="stylesheet" type="text/css" href="css/jquery.pagepiling.css">
    <link rel="stylesheet" type="text/css" href="css/examples.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
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
    </style>

    <script type="text/javascript" src="js/jquery.pagepiling.js"></script>
</head>

<body>

<div class="headerbg"></div>
<div class="header">
    <div class="w1000">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png"></a>
        </div>
        <div class="nav">
            <ul id="nav">
                <li class="mainlevel">
                    <a>Speaker</a>
                    <ul>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "root";
                        $dbname = "eten";
                        $conn = new mysql($servername, $username, $password, $dbname);

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
                    </ul>
                </li>
                <li class="mainlevel">
                    <a>Amplifier</a>
                    <ul>
                        <?php
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
<div class="index-img" style="background:url('assets/img/speaker.jpg') no-repeat top center">
</div>
<div class="index-img" style="background:url('assets/img/amplifier.jpg') no-repeat top center;height: 898px;">
</div>
<div style="text-align: center;margin-top: 70px;margin-bottom: 60px;"><img src="images/d.png"></div>
<div class="spic">
    <ul>
        <li><img src="images/09.jpg"></li>
        <li><img src="images/11.jpg"></li>
        <li><img src="images/13.jpg"></li>
        <li><img src="images/23.jpg"></li>
        <li><img src="images/25.jpg"></li>
        <li><img src="images/27.jpg"></li>
    </ul>
</div>

<div class="footer">
    <div style="width: 1000px;margin: 0 auto;line-height: 100px;text-align: center;font-family: inherit;font-size: 20px;">
        Copyright © 2015 Eternal sound. All rights reserved.<img src="images/fb.png"><img src="images/t.png" /></div>
</div>
</body>
</html>