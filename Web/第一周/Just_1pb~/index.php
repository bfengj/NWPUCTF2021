<?php
$flag = "flag{rRrrRrang3_Just_so_so~}";
if ($_GET[0]==='0') {

    $size = 1145141919810893;

    $begin = 0;
    $end = $size - 1;

    if (isset ($_SERVER ['HTTP_RANGE'])) {
        if (preg_match('/bytes=\h*(\d+)-(\d*)[\D.*]?/i', $_SERVER ['HTTP_RANGE'], $matches)) {
            // 读取文件，起始节点
            $begin = intval($matches [1]);

            // 读取文件，结束节点
            if (!empty ($matches [2])) {
                $end = intval($matches [2]);
            }
        }
    }

    if (isset ($_SERVER ['HTTP_RANGE'])) {
        header('HTTP/1.1 206 Partial Content');
    } else {
        header('HTTP/1.1 200 OK');
    }

    header("Content-Type: text/html");
    header('Accept-Ranges: bytes');
    header('Content-Length:' . (($end - $begin) + 1));

    if (isset ($_SERVER ['HTTP_RANGE'])) {
        header("Content-Range: bytes $begin-$end/$size");
    }

    header("Content-Disposition: attachement; filename=flag.txt");

    $result="fakeflag~~~hhh";
    //1118302656065
    $i=0;
    for ($i = $begin;$i<=($end<1145141919810893-28?$end:1145141919810893-28);$i++){
        $j = $i%14;
        echo $result[$j];
    }
    if ($end>=1145141919810893-28){
        if ($begin>=1145141919810893-28){
            echo substr($flag,$begin-(1145141919810893-28),$end-$begin+1);
        }else{
            echo substr($flag,0,$end-(1145141919810893-28)+1);
        }
    }
}else{
    echo "<p>没想到吧，这次我直接把flag给你，flag就在文件的最末尾</p>";
    echo "<p>可是，这个文件似乎有1PB哦~</p>";
    echo "<a href='?0=0'>flag.txt</a>";
}
