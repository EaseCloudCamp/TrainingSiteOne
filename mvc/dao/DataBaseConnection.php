<?php
/**
 * Created by PhpStorm.
 * User: xiaohao-pc
 * Date: 17-8-30
 * Time: 上午9:48
 */

/*  $username = "west3453";
    $password = "West263453";
    $url = "sql.m32.vhostgo.com";
    $conn = new mysqli($url, $username, $password, "west3453");
   */

class DataBaseConnection
{
    private $conn = null;

    public function dataBaseConnection()
    {
        $username = "west3453";
        $password = "West263453";
        $url = "sql.m32.vhostgo.com";
        $this->conn = new mysqli($url, $username, $password, "west3453");
        if ($this->conn->connect_error) {
            echo "连接失败";
            return null;
        } else {

        }
        return $this->conn;
    }

    public function close()
    {
        $this->conn->close();
    }
}
