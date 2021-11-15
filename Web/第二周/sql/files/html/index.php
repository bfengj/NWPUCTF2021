<html>

<head>
    <meta charset="UTF-8">
    <title>easy_sql</title>
</head>

<body>
<h1>easy_sql</h1>
<form method="get">
    姿势: <input type="text" name="inject" value="1">
    <input type="submit">
</form>

<pre>
<?php
error_reporting(0);
if(isset($_GET['inject'])) {
    $id = $_GET['inject'];
    $mysqli = new mysqli("127.0.0.1","root","root","supersqli");;
    //多条sql语句
    $sql = "select * from `test` where id = '$id';";
    $res=$mysqli->query($sql);

    if ($res){//使用multi_query()执行一条或多条sql语句
        if($res->fetch_row())   
            echo 'data exist';
        else{
            echo 'no data';
        }
    } else {
      echo "error";
    }
    $mysqli->close();  //关闭数据库连接
}


?>
</pre>

</body>

</html>
