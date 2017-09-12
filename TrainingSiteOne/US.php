<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<!--    <base href="http://eternalsound.dk:80/">-->

    <title>US - Eternal sound</title>

    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="keywords" content="US - Eternal sound">
    <meta http-equiv="description" content="US - Eternal sound">
    <!--
    <link rel="stylesheet" type="text/css" href="styles.css">
    -->
    <link rel="stylesheet" type="text/css" href="css/examples.css" />
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#nav li").hover(function(){
                $(this).find("ul").slideDown("slow");
            },function(){
                $(this).find("ul").slideUp("fast");
            });
        });
    </script>
</head>
<body>
<div class="headerbg"></div>
<div class="header">
    <div class="w1000">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" /></a>
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
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="US.php" target="_blank">US</a></li>
            </ul>

        </div>
    </div>
</div>
<div class="content" style="text-align: center;margin-top: 100px;">
    <p><img src="image/gallery/1425107720538089776.jpg"/></p>
</div>
<div class="footer">
    <div style="width: 1000px;margin: 0 auto;line-height: 100px;text-align: center;font-family: inherit;font-size: 20px;">Copyright © 2015 Eternal sound. All rights reserved.<img src="images/fb.png"><img src="images/t.png" /></div>
</div>
</body>
</html>