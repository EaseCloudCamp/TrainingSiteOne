<?php
/**
 * Created by PhpStorm.
 * User: xiaohao
 * Date: 17-9-12
 * Time: 下午5:46
 */

include "../mvc/dao/GalleryImpl.php";


$gallery=new GalleryImpl();
if($gallery->delImages()) {
    echo "ok";
}

