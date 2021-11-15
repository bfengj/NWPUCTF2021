<?php
include 'View.class.php';
error_reporting(0);
class login extends View{
    public function __destruct()
    {

    }
}
function waf($inject) {
    preg_match("/select|outfile|php|log|htaccess|phtml|like|regexp|update|delete|drop|insert|flag|alter|prepare|set|concat|0x|where/i",$inject) && die('hacker');
}
if(isset($_POST['user'])&&isset($_POST['password'])) {
    $user = $_POST['user'];
    $password=$_POST['password'];
    waf($user);
    waf($password);
    $m = mysqli_init();

    $s = mysqli_real_connect($m, 'localhost', 'root', 'root', 'test', 3306);
    mysqli_options($m, MYSQLI_OPT_LOCAL_INFILE, true);
    $sql = 'select username from user_table where username=\'' . $_POST['user'].'\' and password=\''.$password.'\';';
    if (mysqli_multi_query($m, $sql)) {
        do {
            if ($result = mysqli_store_result($m)) {
                $row = mysqli_fetch_row($result);
                if ($row[0]) {
                    session_start();
                    $_SESSION['admin']=1;
                    echo 'success';
                }
                mysqli_free_result($result);
            }
        } while (mysqli_next_result($m));
    }

    mysqli_close($m);

}
