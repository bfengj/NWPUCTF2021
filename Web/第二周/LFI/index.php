<?php
if(!$_GET['file']&&!$_GET['phpinfo']){
    highlight_file(__FILE__);
}
if($_GET['file']){
    include $_GET['file'];
}
if($_GET['phpinfo']){
    phpinfo();
}