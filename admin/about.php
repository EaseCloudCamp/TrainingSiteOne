<?php

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <base href="<%=basePath%>">
    
    <title>ETEN about page</title>
    
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="ETEN">
	<meta http-equiv="description" content="This is about page">
	<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	-->
<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="../ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="../ueditor/lang/en/en.js"></script></head>
	<link rel="stylesheet" type="text/css" href="../css/common.css"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
  <body>
    <script id="editor" type="text/plain" style="width:100%;height:70%;"></script>
    <form action="" onsubmit="init()" method="post">
         <input type="hidden" name="about.aboutId" value="about id"/>
         <input type="hidden" name="about.aboutDesc" id="aboutDesc"/>
         <input   id='save' type="button"  value="save" style='cursor: pointer;' class="btn btn-primary btn2">
    </form>
    
    <script type="text/javascript">
   
        var ue = UE.getEditor('editor');
        ue.ready(function(){
        	ue.setContent('${about.aboutDesc}');  //这里是来自服务器的内容
        });
        function init()
        {
        	var content = UE.getEditor('editor').getContent();
        	//alert(content);
        	$("#aboutDesc").val(content);
        }
        $(function (){
        	var message = "";
            message = '${message}';
            if(message=="save success")
            {
            	alert("save success");
            }
            else if(message=="save failure")
            {
            	alert("save failure");
            }
        })
      
        
$(function (){
    	   $("#save").click(function (){
    		   var content = UE.getEditor('editor').getContent();
    		   alert(content);
    		/*   $.ajax({
    			   type: "POST",
    			   dataType: "text",
    			   url: "${pageContext.request.contextPath}/about/about_saveAbout.do",
    			   data: "about.aboutId=${about.aboutId}&about.aboutDesc="+content,
    			   success: function(data){
    				     if(data=="success")
    				     {
    				        alert("保存成功!");	 
    				     }
    			   }
    			});*/
    	   })
    	   
       });
    </script>
  </body>
</html>
