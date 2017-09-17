<?php
/**
 * Created by PhpStorm.
 * User: xiaohao-pc
 * Date: 17-8-30
 * Time: 上午9:48
 */

class DataBaseConnection
{

   private $username="root";
   private $password="root";
   private $url="localhost:3306";




    public function getConnection()
    {
        $conn = new mysqli($this->url, $this->username, $this->password, "eten");
        if($conn->connect_error){
            echo "连接失败";
            return null;
        }
        return $conn;
    }

    public function close($conn){
             $conn->close();
    }

}