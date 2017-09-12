<?php
include("../mvc/dao/EssayDaoImpl.php");
include("../mvc/entity/Essay.php");
$essayName = $_GET['essayName'];
$essayId = $_GET['essayId'];
$essay = new EssayDaoImpl();

$rows = $essay->findEssayImgsByEssayId($essayId);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <base href="<%=basePath%>">

    <title>My JSP 'modifiEssay.jsp' starting page</title>

    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
    <meta http-equiv="description" content="This is my page">
    <!--
    <link rel="stylesheet" type="text/css" href="styles.css">
    -->
    <link rel="stylesheet" type="text/css" href="../css/common.css"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <script type="text/javascript" src="../js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="../js/jquery-1.7.2.js"></script>

    <script type="text/javascript" src="../uploadify/jquery.uploadify.js"></script>
    <link rel="stylesheet" type="text/css" href="../uploadify/uploadify.css">
    <style type="text/css">
        ul li {
            list-style-type: none;
            display: inline;
        }

        .uploadify-queue {
            display: none;
        }

        .a-upload {
            padding: 4px 10px;
            height: 20px;
            line-height: 20px;
            position: relative;
            cursor: pointer;
            color: #888;
            background: #fafafa;
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
            display: inline-block;
            *display: inline;
            *zoom: 1

        }

        .a-upload input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
            filter: alpha(opacity=0);
            cursor: pointer
        }

        .a-upload:hover {
            color: #444;
            background: #eee;
            border-color: #ccc;
            text-decoration: none
        }

        #addImg {
            opacity: 0;

            width: 100%;

        }

    </style>

</head>
<script type="text/javascript">
    $(function () {//修改用户名称
        $("#essayName").change(function () {
            var essayId = $("#essayId").val();
            var essayName = this.value;
            $.ajax({
                type: "GET",
                url: "modifyEssayNameByAjax.php",
                data: "newName=" + essayName + "&essayId=" + essayId,
                success: function (msg) {
                    if (msg == "ok") {
                        $("#message").text("modify success");
                    } else if (msg == "fail") {
                        $("#message").text("modify fail");
                    }

                    window.setTimeout("messageHide()", 2000);
                }
            });
        });
    });

    function showDelete(id) {
        $("." + id).css({'display': "block"});

    }

    function messageHide() {
        $("#message").empty();
    }

    function deletePicture(pictureId) {
        var flag = window.confirm("Sure to delete pictures!");
        if (flag) {
            $.ajax({
                type: "GET",
                url: "deleteImgsByAjax.php",
                dataType: "text",
                data: "imgId=" + pictureId,
                success: function (data) {
                    if ("ok" == data) {
                        $("#" + pictureId).remove();
                    }
                }
            });
        }
    }

    function modifyPictureSortNumber(t) {
        $.ajax({
            type: "POST",
            url: "sys/method_modifyPictureSortNumber.do",
            data: "sortNumber=" + t.value + "&pictureId=" + t.name,
            success: function (msg) {

            }
        });
    }

    //以下是鼠標监听事件
    var flag = true;
    var hideId;

    function showDelete(id) {
        flag = false;
        $("." + id).css("display", "block");
    }

    function hideDelete(id) {
        flag = true;
        hideId = id;
        //hideTimer();
        window.setTimeout("hideTimer()", 0);
    }

    function hideTimer() {
        if (flag) {
            $("." + hideId).hide();
        }
    }

    function picture() {
        flag = false;
    }



    function addFile() {
        var formData = new FormData();
        formData.append("file", $("#addImg")[0].files[0]);
        formData.append("essayId",$("#essayId").prop("value"));
        $.ajax({
            url: "../fileHandle/EssayImgHandler.php",
            data: formData,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                           //上传完成之后刷新页面
                console.log("刷新")
               location.reload(true);

            }, error: function (data) {

            }
        });
    }


</script>
<body>


<div style="margin: 20px;">
    Article name：<input type="text" value="<?php echo $essayName ?>" id="essayName"/> <span style="color: green;"
                                                                                            id="message"></span>
    <input type="hidden" value="<?php echo $essayId ?>" id="essayId"><br>

    <a class="a-upload">
        <input id="addImg" onchange="addFile()" name="file" type="file">添加图片
    </a>
</div>


<p style="background-color: #7F7F7F;margin: 0px;padding: 0px;margin-bottom: 10px;font-weight: bold;color: white;text-align: left;10px">
    picture</p>
<ul id="imageList">


    <?php

    foreach ($rows as $row) {
        ?>
        <!--onmouseout="hideDelete('<?php /*echo $row[0] */ ?>')"-->
        <li>
            <div id='<?php echo $row[0] ?>'
                 style='margin-top:15px;border:1px solid #7F7F7F;  width: 150px;height: 150px;display: inline-block;margin-left: 15px'>
                <img id="<?php echo $row[0] ?>"
                     src=<?php echo "../" . $row[3] ?> onmouseover="showDelete('<?php echo $row[0] ?>')"
                     style='margin: 0px;padding: 0px; width:150px;height:150px'
                />
                <div onclick="deletePicture(<?php echo $row[0] ?>)" class="<?php echo $row[0] ?>" style='width:150px;height: 30px;margin: 0px;opacity:0.8;padding: 0px;cursor: pointer;text-align: center;line-height: 30px;background-color:
                #7F7F7F;position: absolute;color: red; margin-top: -30px;display: none;z-index: 1000;'>delete</p>
                </div>
        </li> <?php } ?> </ul>
</body>

</html>
