<?php
    ini_set("open_basedir","./");
    if(!isset($_GET['action'])){
        highlight_file(__FILE__);
        die();
    }
    if($_GET['action'] == 'w'){
        @mkdir("./files/");
        $content = $_GET['c'];
        $file = bin2hex(random_bytes(5));
        file_put_contents("./files/".$file,base64_encode($content));
        echo "./files/".$file;
    }elseif($_GET['action'] == 'r'){
        $r = $_GET['r'];
        $file = "./files/".$r;
        include("php://filter/resource=$file");
//最近一次比赛的原题，但是很有意思。
    }