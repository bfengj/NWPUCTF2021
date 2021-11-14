<?php
if($_SERVER['REMOTE_ADDR']!=='127.0.0.1'&&$_SERVER['REMOTE_ADDR']!=='localhost'){
    echo "只有本地允许访问";
    exit();
}

$file = $_GET['file'];
include $file;