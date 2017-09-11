<?php
include("../mvc/dao/EssayDaoImpl.php");
include ("../mvc/entity/Essay.php");
$navigationName = $_GET['navigationName'];
$navigationType = $_GET['navigationType'];
$essayId=$_GET['essayId'];

$essayIds=$_GET['essayIds'];

$essay = new EssayDaoImpl();

if($essayIds!=null){
    $essayIds=explode(",",$essayIds);
    $essay->delEssayAll($essayIds,$navigationType);
}


if($essayId!=""){
    $essayEntity=new Essay();
    $essayEntity->setEssayId($essayId);
    $essayEntity->setNavigationType($navigationType);
    $essay->delEssay($essayEntity);
}



$rows = $essay->findEssayByNavigationType($navigationType);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns:cursor="http://www.w3.org/1999/xhtml" xmlns:pointer xmlns:pointer>
<head>
    <base href="<%=basePath%>">

    <title>My JSP 'list.jsp' starting page</title>

    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
    <meta http-equiv="description" content="This is my page">
    <link rel="stylesheet" type="text/css" href="../css/common.css"/>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <script type="text/javascript" src="../js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
    <!--
    <link rel="stylesheet" type="text/css" href="styles.css">
    -->
  <script type="text/javascript">

        function AllSelect(t) {
            var flag = t.checked;
            $(".essayId").each(function () {
                this.checked = flag;
            })
        }

        function AllDelete(navigationType) {


            if (window.confirm("Sure to delete it?")) {
                var str = "";
                $(".essayId").each(function () {
                    if (this.checked) {
                        str += this.value + ",";
                    }
                });
                if (str == "") {
                    alert("Delete cannot be empty!");
                }else {



                      console.log("链接：：：：：：：list.php?essayIds=" + str + "&navigationType="+navigationType);
                     window.location.href = "list.php?essayIds=" + str + "&navigationType="+navigationType;
                }
            }
            else {
                return false;
            }
        }
    </script>
</head>

<body>


<?php
if ($rows == null){
    echo "  <font color=\"red\">" . $navigationName . "</font> is empty!";
}else {


    ?>
    <table class="result-tab" width="100%" border="1">
        <tr style="text-align: center;">
            <th><input type="checkbox" id="flag" onclick="AllSelect(this)"/>
            </td>
            <th>Serial number
            </td>
            <th>class
            </td>
            <th>Article name
            </td>
            <th>Operation
            </td>
        </tr>
        <?php
        for($i=1;$i<=count($rows);$i++){

            $row=$rows[$i-1];
            ?>

            <tr align="center">
                <td><input type="checkbox" id="<?php echo $row['0']?>" value="<?php echo $row['0']?>" class="essayId"/></td>
                <td><?php echo $i?></td>
                <td><?php echo $navigationName?></td>
                <td><?php echo $row[2]?></td>
                <td>
                    <a href="list.php?essayId=<?php echo $row['0']?>&navigationType=<?php echo $row[1]?>"
                       onclick="return confirm('Are you sure you want to delete!')">delete</a>
                    <a href="modifiEssay.php?essayName=<?php echo $row[2]?>&essayId=<?php echo $row[0]?>">modity</a>
                </td>
            </tr>
        <?php }?>
    </table>
    <a onclick="AllDelete('<?php echo $row[1] ?>')" style="cursor: pointer;margin-left: 1%;margin-top: 1%" class="btn btn-primary btn2">Bulk delete</a>  <?php
}
?>
</body>
</html>
