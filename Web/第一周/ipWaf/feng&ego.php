<?php

function addBlack($ip){
    $content = "\$blackIps[] = '$ip';"."\n";
    file_put_contents("black.php",$content,FILE_APPEND);
}

function waf($ip){
    include "black.php";
    if (array_search($ip,$blackIps)!==false){
        die("You are in the black!");
    }else{
        echo "You visit the secret,you will in the black.";
        addBlack($ip);
    }
}
function getIp(){
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
highlight_file(__FILE__);
$ip = getIp();
waf($ip);