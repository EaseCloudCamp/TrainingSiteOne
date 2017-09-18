<?php
/**
 * Created by PhpStorm.
 * User: xiaohao-pc
 * Date: 17-8-30
 * Time: 上午9:46
 */

include "DataBaseConnection.php";
include("EssayDao.php");


class EssayDaoImpl implements EssayDao
{

    private $conn = null;

    /**
     * EssayDaoImpl constructor.
     */
    public function __construct()
    {
        $data = new DataBaseConnection();
        $this->conn = $data->dataBaseConnection();
        $this->setConn($this->conn);

    }

    public function closeConn()
    {

        $this->conn->close();

    }


    public function findEssay()
    {
// TODO: Implement findEssay() method.
        $sql = "select * from essay";
        $rs = $this->conn->query($sql);
        $rows = null;
        if ($rs->num_rows > 0) {
            $rows = $rs->fetch_all();
            return $rows;

        } else {

        }

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

        $sql = "delete from essay WHERE navigation_type='" . $navigationType . "'and essay_id='" . $essayId . "'";
        $rs = $this->conn->query($sql);


        return null;

    }

    public function findEssayByNavigationType($navigationType)
    {
        // TODO: Implement findEssayByNavigationType() method.


        $sql = "select * from essay WHERE navigation_type='" . $navigationType . "'";
        $rs = $this->conn->query($sql);

        $rows = null;

        if ($rs->num_rows > 0) {
            echo "<script>console.log('执行查找')</script>";
            $rows = $rs->fetch_all();
            return $rows;
        } else {

        }

        return null;
    }

    public function fingEssayImgsByNavigationName($navigationName)
    {
        // TODO: Implement fingEssayImgsByNavigationType() method.


        $sql = "select essay_id from essay WHERE essay_name='" . $navigationName . "'";
        echo "<br>" . $sql;
        $rs = $this->conn->query($sql);

        $rows = null;

        if ($rs->num_rows > 0) {
            $row = $rs->fetch_row();
            $essayId = $row[0];
            // $essayId = ($rs->fetch_row())[0];
            $imgSql = "select picture_realFileName from picture WHERE essay_id='" . $essayId . "'";
            $rs1 = $this->conn->query($imgSql);
            if ($rs1->num_rows > 0) {
                $imgPaths = $rs1->fetch_all();
            }

            return $imgPaths;

        } else {

        }

        return null;
    }

    public function delEssayAll($essayIds, $navigationType)
    {
        // TODO: Implement delEssayAll() method.

        for ($i = 0; $i < count($essayIds); $i++) {

            if ($essayIds[$i] != "") {

                $sql = "delete from essay WHERE navigation_type='" . $navigationType . "'and essay_id='" . $essayIds[$i] . "'";
                $this->conn->query($sql);
            }
        }


        $this->conn->close();

    }

    public function findEssayImgsByEssayId($essayId)
    {
        // TODO: Implement findEssayImgsByEssayId() method.

        $rows = null;

        $imgSql = "select * from picture WHERE essay_id='" . $essayId . "'";
        $rs = $this->conn->query($imgSql);
        if ($rs->num_rows > 0) {
            $imgPaths = $rs->fetch_all();
        }


        return $imgPaths;
    }

    public function modifyEssayName($essayId, $newName)
    {
        // TODO: Implement modifyEssayName() method.


        $sql = "update essay set essay_name='" . $newName . "' where essay_id=" . $essayId;

        if (!$this->conn->query($sql)) {

            return false;
        }


        return true;
    }

    public function deleteEssayImg($imgId)
    {
        // TODO: Implement deleteEssayImg() method.

        $sql = "delete from picture where picture_id=" . $imgId;

        if (!$this->conn->query($sql)) {

            return false;
        }

        return true;
    }

    /**
     * @return DataBaseConnection|null
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @param DataBaseConnection|null $conn
     */
    public function setConn($conn)
    {
        $this->conn = $conn;
    }

}