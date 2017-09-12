<?php
/**
 * Created by PhpStorm.
 * User: xiaohao
 * Date: 17-9-12
 * Time: 下午5:11
 */
include "../mvc/dao/GalleryImpl.php";
$galleryId=$_GET['galleryId'];

$gallery=new GalleryImpl();
if($gallery->delOneImg($galleryId)) {
    echo "ok";
}

