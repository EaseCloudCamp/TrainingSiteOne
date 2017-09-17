<?php
/**
 * Created by PhpStorm.
 * User: xiaohao-pc
 * Date: 17-8-30
 * Time: 上午9:46
 */
include("EssayDao.php");

/*include("../../../entity/Essay.php");*/

class EssayDaoImpl implements EssayDao
{


    /**
     * EssayDaoImpl constructor.
     */


    public function findEssay()
    {
// TODO: Implement findEssay() method.


        $username = "root";
        $password = "root";
        $url = "localhost:3306";
        $conn = new mysqli($url, $username, $password, "eten");

        if ($conn->connect_error) {
            echo "<script>alert('数据库连接失败')</script>";
            return;
        }
        $sql = "select * from essay";
        $rs = $conn->query($sql);

        $rows = null;

        if ($rs->num_rows > 0) {
            $rows = $rs->fetch_all();

            $rs->close();
            $conn->close();

            return $rows;

        } else {

        }
        $rs->close();
        $conn->close();
        return null;
    }

    public function addEssay(Essay $essay)
    {
        // TODO: Implement addEssay() method.
    }

    public function delEssay(Essay $essay)
    {
        // TODO: Implement delEssay() method.


        $navigationType = $essay->getNavigationType();
        $essayId = $essay->getEssayId();
        echo $navigationType;
        echo $essayId;
        $username = "root";
        $password = "root";
        $url = "localhost:3306";
        $conn = new mysqli($url, $username, $password, "eten");

        if ($conn->connect_error) {
            echo "<script>alert('数据库连接失败')</script>";
            return;
        }
        $sql = "delete from essay WHERE navigation_type='" . $navigationType . "'and essay_id='" . $essayId . "'";
        $rs = $conn->query($sql);


        return null;

    }

    public function findEssayByNavigationType($navigationType)
    {
        // TODO: Implement findEssayByNavigationType() method.


        $username = "root";
        $password = "root";
        $url = "localhost:3306";
        $conn = new mysqli($url, $username, $password, "eten");

        if ($conn->connect_error) {
            echo "<script>alert('数据库连接失败')</script>";
            return;
        }
        $sql = "select * from essay WHERE navigation_type='" . $navigationType . "'";
        $rs = $conn->query($sql);

        $rows = null;

        if ($rs->num_rows > 0) {
            $rows = $rs->fetch_all();

            $rs->close();
            $conn->close();
            return $rows;

        } else {

        }
        $rs->close();
        $conn->close();
        return null;
    }

    public function fingEssayImgsByNavigationName($navigationName)
    {
        // TODO: Implement fingEssayImgsByNavigationType() method.


        $username = "root";
        $password = "root";
        $url = "localhost:3306";
        $conn = new mysqli($url, $username, $password, "eten");

        if ($conn->connect_error) {
            echo "<script>alert('数据库连接失败')</script>";
            return;
        }
        $sql = "select essay_id from essay WHERE essay_name='" . $navigationName . "'";

        echo "<br>" . $sql;
        $rs = $conn->query($sql);

        $rows = null;

        if ($rs->num_rows > 0) {
            echo "<br>查到数据";

            $essayId = $rs->fetch_row()[0];
            echo $essayId . "  ";
            $imgSql = "select picture_realFileName from picture WHERE essay_id='" . $essayId . "'";

            $rs1 = $conn->query($imgSql);
            if ($rs1->num_rows > 0) {
                $imgPaths = $rs1->fetch_all();
            }
            $rs->close();
            $conn->close();
            return $imgPaths;

        } else {

        }
        $rs->close();
        $conn->close();
        return null;
    }

    public function delEssayAll($essayIds, $navigationType)
    {
        // TODO: Implement delEssayAll() method.

        $username = "root";
        $password = "root";
        $url = "localhost:3306";
        $conn = new mysqli($url, $username, $password, "eten");

        if ($conn->connect_error) {
            echo "<script>alert('数据库连接失败')</script>";
            return;
        }

        for ($i = 0; $i < count($essayIds); $i++) {

            if ($essayIds[$i] != "") {

                $sql = "delete from essay WHERE navigation_type='" . $navigationType . "'and essay_id='" . $essayIds[$i] . "'";
                $conn->query($sql);
            }
        }


        $conn->close();

    }

    public function findEssayImgsByEssayId($essayId)
    {
        // TODO: Implement findEssayImgsByEssayId() method.


        $username = "root";
        $password = "root";
        $url = "localhost:3306";
        $conn = new mysqli($url, $username, $password, "eten");
        $rows = null;

        $imgSql = "select * from picture WHERE essay_id='" . $essayId . "'";
        $rs = $conn->query($imgSql);
        if ($rs->num_rows > 0) {
            $imgPaths = $rs->fetch_all();
        }

        $rs->close();
        $conn->close();
        return $imgPaths;
    }

    public function modifyEssayName($essayId, $newName)
    {
        // TODO: Implement modifyEssayName() method.

        $username = "root";
        $password = "root";
        $url = "localhost:3306";
        $conn = new mysqli($url, $username, $password, "eten");
        if ($conn->connect_error) {
            die("连接数据库失败");
            return;
        }
        $sql = "update essay set essay_name='".$newName."' where essay_id=" . $essayId;

        if (!$conn->query($sql)) {

            return false;
        }
        $conn->close();

        return true;
    }

    public function deleteEssayImg($imgId)
    {
        // TODO: Implement deleteEssayImg() method.
        $username = "root";
        $password = "root";
        $url = "localhost:3306";
        $conn = new mysqli($url, $username, $password, "eten");
        if ($conn->connect_error) {
            die("连接数据库失败");
            return;
        }
        $sql = "delete from picture where picture_id=" . $imgId;

        if (!$conn->query($sql)) {

            return false;
        }
        $conn->close();

        return true;



    }
}