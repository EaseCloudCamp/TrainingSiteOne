<?php
/**
 * Created by PhpStorm.
 * User: xiaohao-pc
 * Date: 17-8-30
 * Time: 上午9:33
 **/

session_start();
require_once ("AdminDao.php");
 class AdminDaoImpl implements AdminDao {
   public function login($username,$password){
       $password=strtoupper(md5($password));
       $dbuser="root";
       $dbpass="root";
       $dburl="localhost:3306";
       $dbname="eten";
       $conn=new mysqli($dburl,$dbuser,$dbpass,$dbname);
       if($conn->connect_error){
           echo"链接出错";
           return;
       }
      $sql="select * from admin where admin_name='".$username."' and admin_password='".$password."'";

       $rs=  $conn->query($sql);
       if($rs->num_rows>0){
          $_SESSION['admin']=$rs->fetch_row()[1];
           return true;
       }else{
           return false;
       }
   }
}
