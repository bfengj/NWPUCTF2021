<?php
include "view.class.php";
session_start();
if($_SESSION['admin']!==1){
    header("Location: ./index.php");
    exit();
}
if(isset($_GET['logout'])){
    $_SESSION=array();
    header("Location: ./index.php");
    exit();
}
include 'View.class.php';
class index extends View{
    public function __destruct()
    {

    }
}
$a=new index();
$a->display('./template/html/admin.html');
