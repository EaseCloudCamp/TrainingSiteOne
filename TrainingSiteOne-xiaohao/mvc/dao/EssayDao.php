<?php
/**
 * Created by PhpStorm.
 * User: xiaohao-pc
 * Date: 17-8-30
 * Time: 上午9:32
 */
interface  EssayDao{
       public function findEssay();
       public function  addEssay(Essay $essay);
       public function  delEssay(Essay $essay);
}
