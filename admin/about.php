
<?php
$username = "west3453";
$password = "West263453";
$url = "sql.m32.vhostgo.com";
$conn = new mysqli($url, $username, $password, "west3453");
if ($conn->connect_error) {
    echo "<script>alert('数据库链接失败')</script>";
}
$sql ="select *from about";
$rs=$conn->query($sql);
$rows=null;
if($rs->num_rows>0){
    $rows=$rs->fetch_all();
}
$desc=$rows[0][1];


$conn->close();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <base href="<%=basePath%>">
    
    <title>ETEN about page</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="ETEN">
	<meta http-equiv="description" content="This is about page">


      <script type="text/javascript">
          window.UEDITOR_HOME_URL='../ueditor/';
      </script>
<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="../ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="../ueditor/lang/zh-cn/zh-cn.js"></script></head>
	<link rel="stylesheet" type="text/css" href="../css/common.css"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
  <body>
    <script id="editor" type="text/plain" style="width:100%;height:70%;"></script>
    <form action="saveAbout.php" onsubmit="init()" method="post">
         <input type="hidden" name="aboutId" value="<?php if($rows!=null){echo $rows[0][0];}?>"/>
         <input type="hidden" name="aboutDesc" id="aboutDesc"/>
         <input type="submit"  value="save" style='cursor: pointer;' class="btn btn-primary btn2">
    </form>
    
    <script type="text/javascript">
        var ue = UE.getEditor('editor');
    ue.ready(function () {
            ue.setContent('<?=$desc?>');
    })
        function init()
        {
        	var content = UE.getEditor('editor').getContent();

        	$("#aboutDesc").val(content);
        }


    </script>
  </body>
</html>
