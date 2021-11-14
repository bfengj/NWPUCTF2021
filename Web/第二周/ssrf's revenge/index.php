<?php

function curl($url){
    $ch=curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result=curl_exec($ch);
    curl_close($ch);
    if(stripos($result,"flag")!==false){
        die("no flag");
    }else{
        echo $result;
    }
}
highlight_file(__FILE__);
//blackdoor.php
//flag in flag.php
$url = $_POST['url'];
if(preg_match("/127|localhost|base64|rot/i",$url)){
    die("hacker!");
}
curl($url);






