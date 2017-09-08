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
    }
}