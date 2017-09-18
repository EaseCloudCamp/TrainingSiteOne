<?php
$typeName = $_GET['typeName'];
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
    <script type="text/javascript">


        function del(val) {
            var str = val.split("_");
            $("#" + str[1]).remove();
            //   alert(str[0]);
            $.ajax({
                type: "POST",
                url: "multiple/multipleFileUp_deletePicture.do",
                data: "imageFileName=" + str[0],
                success: function (msg) {

                }
            });
        }//E868E57CDC5C23CC85501E04DD8707A8
        var divId = 1;
        $(document).ready(function () {
            var myDate = new Date();
            var str = "";
            str += myDate.getFullYear();   //获取完整的年份(4位,1970-????)
            str += myDate.getMonth() + 1;      //获取当前月份(0-11,0代表1月)
            str += myDate.getDate();       //获取当前日(1-31)
            str += myDate.getHours() + 1;      //获取当前小时数(0-23)
            str += myDate.getMinutes() + 1;    //获取当前分钟数(0-59)
            str += myDate.getSeconds() + 1;    //获取当前秒数(0-59)
            $("#essayTime").val(str);

        });

        function checkForm() {
            if ($("#essayName").val() == "") {
                alert("Article name cannot be empty!");
                return false;
            }
            else {
                return true;
            }
        }

        $(function () {
            window.setTimeout("hideMessage()", 5000);
        });

        function hideMessage() {
            $("#message").hide();
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
    </script>
    <style type="text/css">
        .uploadify-queue {
            display: none;
        }

        .imgpre {

            width: 100%;
            height: 100%;

        }

        .imgpre: {

        }

        .imgContainer {
            padding: 0;
            position: relative;
            margin-top: 10px;
            width: 150px;
            height: 150px;
            margin-left: 10px;
            background-color: #00bfa8;
            float: left;
        }

        .imgDel {
            position: absolute;
            top: 0;
            right: 0;
            width: 30px;
            height: 30px;
            font-size: 30px;
            display: none;
            cursor: pointer;

        }

        .imgContainer:hover .imgDel {
            display: block;
        }


    </style>
</head>

<body>
<div class="crumb-wrap">
    <div class="crumb-list">

       <?php
       echo $_GET['essayTypeName'];
       ?>
        <span class="crumb-step">></span>
        <span class="crumb-name">Add article</span>
    </div>
</div>
<div style="margin-left: 10px;">



    <form action="saveEssay.php" id="form" method="post" onsubmit="return checkForm()" style="margin: 0px;padding: 0px"
          enctype="multipart/form-data">
        <input type="hidden" id="navigationType" name="navigationType" value="<?php echo $typeName; ?>"><br/>
        <input type="hidden" name="essayTime" id="essayTime"/><br/>
        Article name:<input class="common-text" name="essayName" id="essayName"/>

        <br/><br/>


        <div id="queue" style="width: 98%;height:350px;border: 1px solid #646464;margin:1px;">

        </div>
        <br/>

        <input type="hidden" id="num" name="num">
        <input type="submit" id="submitID" value="submit" style='cursor: pointer;' class="btn btn-primary btn2"/>

    </form>

    <input type="file" style="margin-left: 80%" id="imageify" name="file"
           onchange="addFile()"/>
</div>

<script>
    var num=0;
    var names=new Array();

    function addFile() {
        var formData = new FormData();
        formData.append("file", $("#imageify")[0].files[0]);
        formData.append("navigationType",$("#navigationType").prop("value"));
        $.ajax({
            url: "../fileHandle/FileHandler.php",
            data: formData,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                var del = "delImg('" + data + "')";
                var str = "<img class='imgpre' src=../image/essay/" + data + ">";
                var show = "<div class='imgContainer' id=" + data + ">" +
                    " <span class='imgDel' onclick=" + del + ">x</span>" + str + " </div>";
                $("#queue").append(show);
                 saveImgName(data);
                var name="img"+(num++);

                var input="<input type='hidden'id='"+name+"' name='"+name+"' value='"+data+"' class='"+data+"'>"
                $("#form").append(input);
                 $("#num").val(num);
                console.log($("#num").prop("value"));
                console.log($("#navigationType").prop("value"));

            }, error: function (data) {

            }
        });
    }

    function delImg(id) {
        var target = document.getElementById(id);
        target.parentNode.removeChild(target);
        names.splice(id,1);
        var input=document.getElementsByClassName(id)[0];
        input.parentNode.removeChild(input);
        num--;
        $("#num").val(num);
        console.log($("#num").prop("value"));
    }
    function saveImgName(name) {
        names.push(name);
    }
</script>
</body>

</html>
