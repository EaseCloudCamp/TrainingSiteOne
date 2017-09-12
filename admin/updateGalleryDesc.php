<?php
/**
 * Created by PhpStorm.
 * User: xiaohao
 * Date: 17-9-12
 * Time: 下午6:09
 */

include "../mvc/dao/GalleryImpl.php";
$galleryId=$_GET['galleryId'];
$desc=$_GET['desc'];
$gallery=new GalleryImpl();
if($gallery->addImageDesc($galleryId,$desc)) {
    echo "ok";
}

