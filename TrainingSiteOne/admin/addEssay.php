<?php
$typeName=$_GET['typeName'];
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

          /*  $("#imageify").uploadify({     //不兼容edge
                'fileObjName': 'image', //提交时候的字段名，和struts2里面用来接收File的字段名一致
                method: 'get',            //以get方式上传
                'buttonText': 'Additional images',        //上传按钮的文字
                queueSizeLimit: 12,      //设置图片上传最大个数
                'fileTypeDesc': 'Image Files',    //可上传文件格式的描述
                'fileTypeExts': '*.gif; *.jpg; *.png',    //可上传的文件格式
                'auto': true,    //选择一个文件是否自动上传
                'multi': true,    //是否允许多选(这里多选是指在弹出对话框中是否允许一次选择多个，但是可以通过每次只上传一个的方法上传多个文件)
                swf: 'uploadify/uploadify.swf',    //指定swf文件的，默认是uploadify.swf
                uploader: '${pageContext.request.contextPath}/multiple/multipleFileUp_savePicture.do;jsessionid=<%=session.getId()%>',                //服务器响应地址
                'formData': {'fileath': str, 'JSESSIONID': "${pageContext.session.id}"},        //这里是上传时候指定的参数,如果需要动态指定参数需要在onUploadStart方法里面指定
                'onUploadStart': function (file) {    //上传前触发的事件

                    //在这里添加  $('#imageify').uploadify('cancel'); 可以取消上传
                    //$("#imageify").uploadify("settings","formData",{'name':'lmy1'}); //动态指定参数
                },

                'onUploadSuccess': function (file, data, response) {    //上传成功后触发的事件
                    data2 = data + "_" + divId;
                    $("#queue").append("<div id='" + divId + "' style='margin-top:15px;border:1px solid #7F7F7F;  width: 150px;" +
                        "height: 150px;display: inline-block;margin-left: 15px'><img src='" + data + "' style='margin: 0px;padding: 0px;'" +
                        "width=150px height=150px onmouseover='showDelete(" + divId + ")' onmouseout='hideDelete(" + divId + ")'/><a onclick='del(&quot ' + data2 + '&quot)' style='width: 150px;height: 30px;margin: 0px;" +
                        "padding: 0px;cursor: pointer;text-align: center;line-height: 30px;background-color: #7F7F7F;color:red;opacity:0.4;position: absolute;margin-top: -30px;" +
                        "display: none;' onmouseover='picture()' onmouseout='hideDelete(" + divId + ")' class='" + divId + "' >delete</a></div>");
                    divId = divId + 1;
                }
            });*/
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
    </style>
</head>

<body>
<div class="crumb-wrap">
    <div class="crumb-list">

        <!-- ${param.typeName}-->
        <span class="crumb-step">></span>
        <span class="crumb-name">Add article</span>
    </div>
</div>
<div style="margin-left: 10px;">
    <form action="sys/method_addEssay.do" method="post" onsubmit="return checkForm()" style="margin: 0px;padding: 0px"
          enctype="multipart/form-data">
        <input type="hidden" name="navigationType" value="<?php echo $typeName;?>"><br/>
        <input type="hidden" name="essayTime" id="essayTime"/><br/>
        Article name：<input class="common-text" name="essayName" id="essayName"/>

        <br/><br/>

        <input type="file" style="margin-left: 80%" id="imageify" name="file">


        <div id="queue" style="width: 98%;height:350px;border: 1px solid #646464;margin:1px;"></div>
        <br/>

        <input type="submit" id="submitID" value="submit" style='cursor: pointer;' class="btn btn-primary btn2"/>

    </form>
</div>
<span style="color: red;margin-left: 10px;" id="message"> ${message}</span>

</body>

</html>