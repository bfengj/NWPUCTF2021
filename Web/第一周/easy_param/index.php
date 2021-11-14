<?php
$flag = "flag{get_andPost_just_so_easy!}";
if ($_GET['feng']!=='feng'){
    echo "必须先Get传名字为feng，值为feng的参数才可以哦";
    exit();
}
if ($_POST['hello']!=='world'){
    echo "继续POST传名字为hello，值为world的参数才可以哦";
    exit();
}
if ($_COOKIE['role']==='admin'){
    echo $flag;
}else{
    echo "Cookie中role是admin才能给你flag~";
}