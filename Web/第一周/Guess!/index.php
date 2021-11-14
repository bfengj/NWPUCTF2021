<?php
echo "小明是2001年出生的，那么他到底是哪个月那天出生的呢？猜对了就给flag!"."<br><br>";
echo "just like this:<br>?month=1&day=1<br>?month=12&day=31"."<br><br>";
$flag="flag{bpOrPython_is_3asy}";
if (isset($_GET['month'])&&isset($_GET['day'])){
    if ($_GET['month'] === '6' && $_GET['day'] === '6') {
        echo $flag;
    }else{
        echo "wrong!";
    }
}
