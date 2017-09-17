<?php
include("mvc/dao/EssayDaoImpl.php");
$essayImpl = new EssayDaoImpl();
$username = "root";
$password = "root";
$url = "localhost:3306";
$conn = new mysqli($url, $username, $password, "eten");
if ($conn->connect_error) {
    echo "<script>alert('数据库链接失败')</script>";
}
$sql = "select *from about";
$rs = $conn->query($sql);
$about = null;
if ($rs->num_rows > 0) {
    $about = $rs->fetch_all();
}
$desc = $about[0][1];


$conn->close();


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
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

                        if (($rows = $essayImpl->findEssayByNavigationType('1')) == null) {
                            //没有数据
                        }


                        foreach ($rows as $row) {
                            echo "<li><a href='viewModel.php?navigationName=" . $row[2] . "'>" . $row[2] . "</a></li>";
                        }
                        ?>
                        <!--       <li><a href="gellery1/Gellery%20-%20Eternal%20sound.html">Speaker</a></li>
                          --> </ul>
                </li>
                <li class="mainlevel">
                    <a>Amplifier</a>
                    <ul>
                        <?php
                        if (($rows = $essayImpl->findEssayByNavigationType('2')) == null) {
                            /*  echo "<script>alert('获取数据失败')</script>";*/
                        }

                        foreach ($rows as $row) {
                            echo "<li><a href='viewModel.php?navigationName=" . $row[2] . "'>" . $row[2] . "</a></li>";
                        }
                        ?>
                    </ul>
                </li>
                <li><a href="gallery.php">Gallery</a>
                    <ul>
                    </ul>
                </li>
                <li><a href="about.php">US</a></li>
            </ul>
        </div>
    </div>
    <div class="content" style="text-align: center;margin-top: 100px;">
        <?= $desc ?>
    </div>

    <div class="footer">
        <div style="width: 1000px;margin: 0 auto;line-height: 100px;text-align: center;font-family: inherit;font-size: 20px;">
            Copyright © 2015 Eternal sound. All rights reserved.<img src="image/gallery/fb.png"><img src="image/gallery/t.png"></div>
    </div>
</div>
</body>
</html>
