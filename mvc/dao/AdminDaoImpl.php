<?php
/**
 * Created by PhpStorm.
 * User: xiaohao-pc
 * Date: 17-8-30
 * Time: 上午9:33
 **/
session_start();

include "DataBaseConnection.php";
include "AdminDao.php";



class AdminDaoImpl implements AdminDao {
    private $conn=null;

    /**
     * AdminDaoImpl constructor.
     */
    public function __construct()
    {
        $data=new DataBaseConnection();
        $this->conn=  $data->dataBaseConnection();
    }
    public function login($username, $password)
    {
        // TODO: Implement login() method.
        $userpwd = strtoupper(md5($password));
        $admin = $username;
        $sql = "select * from admin where admin_name='" . $admin . "' and admin_password='" . $userpwd . "'";
        $rs = $this->conn->query($sql);
        if ($rs->num_rows > 0) {
            $row = $rs->fetch_row();
            $_SESSION['admin'] = $row[1];
            return true;
        } else {
            return false;
        }

    }
}
