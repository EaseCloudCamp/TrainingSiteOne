<?php

/**
 * Created by PhpStorm.
 * User: xiaohao-pc
 * Date: 17-8-30
 * Time: 下午3:13
 */

include("GalleryDao.php");

class GalleryImpl implements GalleryDao
{


    public static $nums=0;


    function findImages($page)
    {
        // TODO: Implement findImages() method.
        $username = "root";
        $password = "root";
        $url = "localhost:3306";
        $page = $page - 1;
        $start = $page * 10;

        $conn = new mysqli($url, $username, $password, "eten");

        if ($conn->connect_error) {
            echo "<script>alert('数据库链接失败')</script>";
        }
        $sCount = "select count(gallery_id) from gallery";
        $sql = "select * from gallery LIMIT " . $start . ",10";//查找数据库

        $rsCount = $conn->query($sCount);
        if ($rsCount->num_rows > 0) {
           GalleryImpl::$nums=$rsCount->fetch_row()[0];
        }
        $rs = $conn->query($sql);
        if ($rs->num_rows > 0) {
            $rows = $rs->fetch_all();

            $rs->close();
            $conn->close();

            return $rows;
        }
        $rs->close();
        return null;
    }


    function delImages()
    {
        // TODO: Implement delImages() method.
        $username = "root";
        $password = "root";
        $url = "localhost:3306";
        $conn = new mysqli($url, $username, $password, "eten");
        if ($conn->connect_error) {
            echo "<script>alert('数据库链接失败')</script>";
        }

        $conn = new mysqli($url, $username, $password, "eten");
        $saveSQL = "delete from gallery";

        echo $saveSQL;
        if ($conn->query($saveSQL)) {
            $conn->close();
            return true;
        }
        $conn->close();
        return false;



    }

    function addImages($imgName)
    {
        // TODO: Implement addImages() method.
        $username = "root";
        $password = "root";
        $url = "localhost:3306";
        $conn = new mysqli($url, $username, $password, "eten");
        if ($conn->connect_error) {
            echo "<script>alert('数据库链接失败')</script>";
        }
        $imgPath = "image/gallery/" . $imgName;
        $conn = new mysqli($url, $username, $password, "eten");
        $saveSQL = "insert into gallery(gallery_name, gallery_uri) VALUES ('" . $imgName . "','" . $imgPath . "')";
        if ($conn->query($saveSQL)) {
            echo "<br>保存成功";
        }
        $conn->close();
 }

    function addImageDesc($galleryId, $desc)
    {
        // TODO: Implement addImageDesc() method.
        $username = "root";
        $password = "root";
        $url = "localhost:3306";
        $conn = new mysqli($url, $username, $password, "eten");
        if ($conn->connect_error) {
            echo "<script>alert('数据库链接失败')</script>";
        }


        $saveSQL = "update gallery set gallert_desc='".$desc."' where gallery_id='".$galleryId."'";

       echo $saveSQL;
        if ($conn->query($saveSQL)) {
            echo "<br>保存成功";
        }
        $conn->close();


    }

    function delOneImg($galleryId)
    {
        // TODO: Implement delOneImg() method.
        $username = "root";
        $password = "root";
        $url = "localhost:3306";
        $conn = new mysqli($url, $username, $password, "eten");
        if ($conn->connect_error) {
            echo "<script>alert('数据库链接失败')</script>";
        }

        $conn = new mysqli($url, $username, $password, "eten");
        $saveSQL = "delete from gallery WHERE gallery_id=".$galleryId;

        echo $saveSQL;
        if ($conn->query($saveSQL)) {
            $conn->close();
            return true;
        }
        $conn->close();
        return false;

    }
}
