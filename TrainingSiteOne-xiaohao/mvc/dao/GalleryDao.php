<?php
/**
 * Created by PhpStorm.
 * User: xiaohao-pc
 * Date: 17-8-30
 * Time: 上午9:32
 */

interface GalleryDao{

   function findImages($page);
   function delImages();
   function addImages();
}
