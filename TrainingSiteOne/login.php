<?php
/**
 * Created by PhpStorm.
 * User: xiaohao-pc
 * Date: 17-8-31
 * Time: 下午4:31
 */

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <base href="<%=basePath%>">

    <title>ETEN Login</title>
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
    <meta http-equiv="description" content="This is my page">
    <!--
    <link rel="stylesheet" type="text/css" href="styles.css">
    -->
    <link href="css/admin_login.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-1.7.2.js"></script>
</head>

<body>
<div class="admin_login_wrap">
    <h1>ETEN System login</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="form/tologin.php" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">userName</label>
                        <input type="text" name="username" id="user" size="40" class="admin_input_style"/>
                    </li>
                    <li>
                        <label for="pwd">Password</label>
                        <input type="password" name="password" id="pwd" size="40" class="admin_input_style"/>
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="submit" class="btn btn-primary"/>
                    </li>
                    <li><font color="red" id="message"></font></li>
                </ul>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        if (top.location != self.location) {
            top.location = self.location;
        }

    });
    $(function () {
        window.setTimeout("MyTimer()", 3000);
    })

    function MyTimer() {
        $("#message").remove();
    }
</script>
</body>
</html>