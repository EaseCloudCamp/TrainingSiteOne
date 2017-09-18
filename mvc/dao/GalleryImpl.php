<?php

/**
 * Created by PhpStorm.
 * User: xiaohao-pc
 * Date: 17-8-30
 * Time: 下午3:13
 */

include("GalleryDao.php");
include ("DataBaseConnection.php");

class GalleryImpl implements GalleryDao
{


    public static $nums = 0;
    private $conn=null;

    /**
     * GalleryImpl constructor.
     * @param null $conn
     */
    public function __construct()
    {
        $data= new DataBaseConnection();
        $this->conn=$data->dataBaseConnection();
    }


    function findImages($page)
    {
        // TODO: Implement findImages() method.

        $page = $page - 1;
        $start = $page * 10;


        $sCount = "select count(gallery_id) from gallery";
        $sql = "select * from gallery LIMIT " . $start . ",10";//查找数据库

        $rsCount =  $this->conn->query($sCount);
        if ($rsCount->num_rows > 0) {
            $row = $rsCount->fetch_row();

            GalleryImpl::$nums = $row[0];
        }
        $rs =  $this->conn->query($sql);
        if ($rs->num_rows > 0) {
            $rows = $rs->fetch_all();
           return $rows;
        }

        return null;
    }


    function delImages()
    {
        // TODO: Implement delImages() method.

        $saveSQL = "delete from gallery";

        echo $saveSQL;
        if ( $this->conn->query($saveSQL)) {

            return true;
        }

        return false;


    }

    function addImages($imgName)
    {
        // TODO: Implement addImages() method.

        $imgPath = "image/gallery/" . $imgName;
        $saveSQL = "insert into gallery(gallery_name, gallery_uri) VALUES ('" . $imgName . "','" . $imgPath . "')";
        if ( $this->conn->query($saveSQL)) {
            echo "<br>保存成功";
        }

    }

    function addImageDesc($galleryId, $desc)
    {
        // TODO: Implement addImageDesc() method.
        if ( $this->conn->connect_error) {
            echo "<script>alert('数据库链接失败')</script>";
        }


        $saveSQL = "update gallery set gallert_desc='" . $desc . "' where gallery_id='" . $galleryId . "'";
        echo $saveSQL;
        if ( $this->conn->query($saveSQL)) {
            echo "<br>保存成功";
        }

    }

    function delOneImg($galleryId)
    {
        // TODO: Implement delOneImg() method.
        $saveSQL = "delete from gallery WHERE gallery_id=" . $galleryId;
        if ( $this->conn->query($saveSQL)) {

            return true;
        }
        return false;
    }
    function close(){
        $this->conn->close();
    }
}
