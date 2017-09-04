<?php
/**
 * Created by PhpStorm.
 * User: xiaohao-pc
 * Date: 17-8-31
 * Time: 下午5:25
 */

session_start();
if ($_SESSION['admin'] == null) {
    header("Location:../login.php");
    exit;

}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <base href="<%=basePath%>">

    <title>ETEN system</title>

    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="keywords" content="ETEN">
    <meta http-equiv="description" content="This is ETEN page">
    <!--
    <link rel="stylesheet" type="text/css" href="styles.css">
    -->
    <link rel="stylesheet" type="text/css" href="../css/common.css"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <script type="text/javascript" src="../js/libs/modernizr.min.js"></script>
</head>

<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">

                <li><a href="manager.php?typeName=Speaker" target="left">speaker</a></li>
                <li><a href="manager.php?typeName=Amplifier" target="left">amplifier</a></li>
                <li><a href="manager.php?typeName=Gallery" target="left">gallery</a></li>
                <li><a href="manager.php?typeName=US" target="left">US</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li> Administrator</li>
                <li><font color="red"><a href="sys/admin_findById.do"
                                         target="_blank"><?php echo $_SESSION['admin']; ?></a></font></li>
                <li><a href="<!--${pageContext.request.contextPath}/loginCheck/login_exit.do-->">exit</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <iframe name="left" src="manager.php" width="189px" frameborder="0" height="100%" scrolling="no"></iframe>
    </div>

    <div class="main-wrap">
        <iframe name="rigth" width="100%" frameborder="0" height="700px"></iframe>
    </div>
    <!--/main-->
</div>
</body>
</html>
