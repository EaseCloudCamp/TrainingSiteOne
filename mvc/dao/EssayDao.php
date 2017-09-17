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
       public function delEssayAll($essayIds,$navigationType);
       public function findEssayByNavigationType($navigationType);
       public function fingEssayImgsByNavigationName($navigationName);
       public function findEssayImgsByEssayId($essayId);
       public function modifyEssayName($essayId,$newName);
       public function deleteEssayImg($imgId);
}
