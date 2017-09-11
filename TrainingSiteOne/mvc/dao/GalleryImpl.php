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
        $sql = "select * from gallery ORDER BY gallery_id DESC LIMIT " . $start . ",10";//查找数据库

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
    }

    function addImages()
    {
        // TODO: Implement addImages() method.
    }
}