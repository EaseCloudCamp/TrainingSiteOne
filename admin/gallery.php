<?php
include "../mvc/dao/GalleryImpl.php";
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <base href="<%=basePath%>">

    <title>ETEN gallery</title>

    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
    <meta http-equiv="description" content="This is my page">

    <script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
    <script type="text/javascript" src="../uploadify/jquery.uploadify.js"></script>
    <link rel="stylesheet" type="text/css" href="../uploadify/uploadify.css">
    <link rel="stylesheet" type="text/css" href="../css/common.css"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
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
    function modifyPictureSortNumber(t)//更新图片排序号
    {
        $.ajax({
            type: "POST",
            url: "gallery/gallery_updataGallerySortNumber.do",
            data: "gallerySortNumber=" + t.value + "&galleryId=" + t.name,
            success: function (msg) {
            }
        });
    }

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
    }

    function deletePicture(galleryId) {

        var flag = window.confirm("Sure to delete pictures!");
        if (flag) {
            //  	 alert(galleryId)
            $.ajax({
                type: "GET",
                url: "deleteGalleryOneImg.php",
                dataType: "text",
                data: "galleryId=" + galleryId,
                success: function (data) {
                    if (data.indexOf("ok")>=1) {
                        $("#" + galleryId).remove();
                    }
                }
            });
        }
    }



    var galleryId;



    function messageShowTimer() {
        window.setTimeout("executeTask()", 500);
    }

    function executeTask() {
        $("#message" + galleryId).empty();
        $("#message" + galleryId).append("<span>Picture description</span>");
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
        window.setTimeout("hideTimer()", 1);
    }

    function hideTimer() {
        if (flag) {
            $("." + hideId).hide();
        }
    }

    function picture() {
        flag = false;
    }

    //删除本页所有图片
    function removeAll() {
        var flag = window.confirm("Sure to delete all of pictures!");
        if (flag) {
            //  	 alert(galleryId)
            $.ajax({
                type: "GET",
                url: "deleteGalleryAll.php",
                dataType: "text",
                success: function (data) {
                    if (data.indexOf("ok")>=1) {
                        location.reload(true);
                    }
                }
            });
        }
    }

    //跳转到指定页面
    function gotoCurrent(t) {
        var pageSize = parseInt(t.value);
        var totalSize = parseInt(<?php echo $pages?>);
        if (pageSize > totalSize) {
            alert("Page not found!");
        }
        else
            window.location = "gallery.php?currentPage=" + t.value;
    }

    function addFile() {
        var formData = new FormData();
        formData.append("file", $("#addImg")[0].files[0]);
        formData.append("essayId",$("#essayId").prop("value"));
        $.ajax({
            url: "../fileHandle/SaveGalleryImg.php",
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
    function updateGalleryDesc(value,id) {
        $.ajax({
            url: "updateGalleryDesc.php",
            data: "desc="+value+"&galleryId="+id,
            type: "GET",
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
<div id="queue">
    <?php

    foreach ($rows as $row) {
        ?>
        <div id='<?php echo $row[0] ?>' class="gallery"
             style='border:1px solid #CCCCCC;width: 500px;height: 180px;display: inline-block;margin-left: 15px;margin-top: 5px;'>
            <ul style='background-color:#CCCCCC;list-style-type: none;margin: 0px;padding: 0px;width: 500px;height: 30px;line-height: 30px'>
                <!--  <li style='width: 30%'></li>
                <li style='width: 20%'><input value='<?php /*echo $row[4]*/ ?>' name='<?php /*echo $row[1]*/ ?>' onchange='modifyPictureSortNumber(this)' style='width: 80px;height: 20px;'/>
                </li>-->
                <li style='width: 50%;margin-left:30%;color: white;' id="message<?php echo $row[0] ?>">Picture
                    description
                </li>
            </ul>
            <textarea   onchange="updateGalleryDesc(this.value,<?php echo $row[0]?>)" rows="7" cols="44" name="<?php echo $row[0]?>"
                      style="float: right;max-height: 148px;max-width: 348px;min-height: 148px;min-width: 348px"><?php echo $row[3] ?></textarea>
            <!--    -->

            <img src='<?php echo "../" . $row[2] ?>' onmouseover="showDelete(<?php echo $row[0] ?>)"
                 onmouseout="hideDelete(<?php echo $row[0] ?>)" style='margin: 0px;padding: 0px' width=148px
                 height=150px;'/>
            <a onmouseover="picture()" class="<?php echo $row[0] ?>" style='width: 148px;height: 30px;margin: 0px;padding: 0px;cursor: pointer;text-align: center;line-height: 30px;
	                   background-color: #CCCCCC;color: #FFF;position: absolute;display: none;margin-top: -30px;opacity:0.5;'
               onclick="deletePicture(<?php echo $row[0]?>)" onmouseout="hideDelete(<?php echo $row[0] ?>)"><span style="color: red;">delete</span></a>
        </div>


        <?php
    }
    ?>

</div>

<br> <br>


<?php

if ($pages > 1) {
    if ($currentPage == 1) {

        ?>

        <a style="display: inline-block;width: 60px;height: 20px;border:1px solid #CCCCCC;margin: auto;text-align:
	                             center;margin-left: 5px;text-decoration: none;color: #CCCCCC;">back</a>

        <?php
    }
    if ($currentPage != 1) {
        ?>

        <a style="display: inline-block;width: 60px;height: 20px;border:1px solid #CCCCCC;margin: auto;text-align: center;margin-left: 5px;text-decoration: none;color: black;"
           href="gallery.php?currentPage=<?php echo $currentPage-1?>"
           target="rigth">back</a>
        <?php
    }
    if ($currentPage == $pages) {
        ?>


        <a style="display: inline-block;width: 60px;height: 20px;border:1px solid #CCCCCC;margin: auto;text-align:
                                center;margin-left: 5px;text-decoration: none;color: #CCCCCC;">next</a>

        <?php
    }
    if ($currentPage != $pages) {

        ?>
        <a style="display: inline-block;width: 60px;height: 20px;border:1px solid #CCCCCC;margin: auto;text-align: center;margin-left: 5px;text-decoration: none;color: black;"
           href="gallery.php?currentPage=<?php echo $currentPage+1?>"
           target="rigth">next</a>
        <?php
    }

    ?>
    <br> <br>
    <?php echo $pages ?> /<input type="text" value="<?php echo $currentPage ?>" onchange="gotoCurrent(this)"
                                 style="width: 30px;height: 20px;display: inline-block;"/>

    <?php
}


?>
<br> <br>

<?php if($pages!=null){?>
    <input type="text" id="submitID" value="Delete all" onclick="removeAll()" style="cursor: pointer;float: right;"
           class="btn btn-primary btn2"/>
    <?php
}?>


<a class="a-upload">
    <input id="addImg" onchange="addFile()" name="file" type="file">添加图片
</a>
</div>

</body>
</html>
