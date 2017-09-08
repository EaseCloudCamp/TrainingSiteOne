<%@ page language="java" import="java.util.*" pageEncoding="utf-8" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@ taglib prefix="fn" uri="http://java.sun.com/jsp/jstl/functions" %>
<%
    String path = request.getContextPath();
    String basePath = request.getScheme() + "://" + request.getServerName() + ":" + request.getServerPort() + path + "/";
%>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <base href="<%=basePath%>">

    <title>Eternal sound</title>

    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="keywords" content="Eternal sound">
    <meta http-equiv="description" content="Eternal sound">
    <link rel="stylesheet" type="text/css" href="css/jquery.pagepiling.css"/>
    <link rel="stylesheet" type="text/css" href="css/examples.css"/>

    <!--
    <link rel="stylesheet" type="text/css" href="styles.css">
    -->
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
            <a href=""><img src="images/logo.png"/></a>
        </div>
        <div class="nav">
            <ul id="nav">
                 <li class="mainlevel">
                     <a>Speaker</a>
                     <ul>
                         <c:forEach items="${essays}" var="essay">
                             <c:if test="${essay.navigationType==1}">
                                 <li>
                                     <a href="${pageContext.request.contextPath}/essay/${essay.essayId}.html">${essay.essayName}</a>
                                 </li>
                             </c:if>
                         </c:forEach>
                     </ul>
                 </li>
                 <li class="mainlevel">
                     <a>Amplifier</a>
                     <ul>
                         <c:forEach items="${essays}" var="essay">
                             <c:if test="${essay.navigationType==2}">
                                 <li>
                                     <a href="${pageContext.request.contextPath}/essay/${essay.essayId}.html">${essay.essayName}</a>
                                 </li>
                             </c:if>
                         </c:forEach>
                     </ul>
                 </li>



                       <li><a href="${pageContext.request.contextPath}/webgallery.html">Gallery</a></li>
                       <li><a href="${pageContext.request.contextPath}/about.html" target="_blank">US</a></li>
            </ul>

        </div>
    </div>
</div>
<div class="index-img" style="background:url(images/speaker.jpg) no-repeat top center">

</div>
<div class="index-img" style="background:url(images/amplifier.jpg) no-repeat top center;height: 898px;">

</div>
<div style="text-align: center;margin-top: 70px;margin-bottom: 60px;"><img src="images/d.png"/></div>
<div class="spic">
    <ul>
        <li><img src="images/09.jpg"/></li>
        <li><img src="images/11.jpg"/></li>
        <li><img src="images/13.jpg"/></li>
        <li><img src="images/23.jpg"/></li>
        <li><img src="images/25.jpg"/></li>
        <li><img src="images/27.jpg"/></li>
    </ul>
</div>

<div class="footer">
    <div style="width: 1000px;margin: 0 auto;line-height: 100px;text-align: center;font-family: inherit;font-size: 20px;">
        Copyright © 2015 Eternal sound. All rights reserved.<img src="/images/fb.png"><img src="/images/t.png"/></div>
</div>

</body>
</html>
