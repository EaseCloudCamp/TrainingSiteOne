<?php


?>

<html>

<head>
    <script src="jquery.js"></script>

    <style>
        .showImgs{

            width: 400px;
            height: auto;

        }
        .imgpre{

            margin-top: 10px;
            width: 100px;
            height: 100px;

            margin-left: 10px;
        }

    </style>
</head>


<body>
<div>
    <input id="file" type="file" name="file">
    <!--<form id="postForm" action="upload_file.php">
        <input type="file" name="file">
        <button type="button">保存</button>
        <input type="submit" value="提交">
    </form>-->
    <button type="button">保存</button>
</div>
<div class="showImgs">

</div>
<script>

    $('button').click(function () {

        var fData = new FormData();
        fData.append("file", $("#file")[0].files[0]);
        $.ajax({
            url: 'upload_file.php',
            type: 'POST',
            cache: false,
            data: fData /*new FormData($('#file'))*/,
            processData: false,
            contentType: false,
            success: function (data) {
                var str="<img class='imgpre' src=upload/"+data+">";
                $(".showImgs").append(str);
            },
            error: function (data) {
                console.log(data);

            }
        });

    });
</script>
</body>
</html>
