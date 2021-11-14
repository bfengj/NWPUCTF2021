# website's revenge 设计说明

### [题目信息]：

| 出题人 | 出题时间 | 题目名字          | 题目类型 | 难度 |
| :----- | :------- | :---------------- | :------- | :--- |
| feng   | 20210426 | website's revenge | web      | 困难 |

### [题目描述]：

```
在你的帮助下，小明修复了之前的那个漏洞，现在似乎没人可以偷走他的flag了。
大黑客mjb气急败坏，说道：“我就不信我挖不出新的洞来读你的flag。咦？。。。这里的代码。。。。嘿嘿嘿，嘿嘿嘿，嘿嘿嘿，嘿嘿嘿~”
```

### [题目考点]：

```
1. 代码审计
2. 文件包含
3. install lock的绕过
4. MySQL 服务端恶意读取客户端任意文件漏洞
```

### [是否原创]：

是

### [Flag]:

flag{Y0u_f1nD_byp@4s_1n5t@1l_l0ck_@nD_mySq1_r3@d_F1l3!~}

### [题目环境]：

php5.6或者其他合适的php版本都可，只要文件包含不会存在00截断等之类的问题把.php后缀去掉。

mysql需要可以被恶意读取任意文件漏洞

### [特别注意]：

```
SQL注入中load_file不能读到/flag，outfile等也不能写马
```

### [题目制作过程]：

把安装前的源码文件里面的源码放到/var/www/html下面，然后install。

flag放在/flag即可。

到时候需要放出install之后的源码以供审计。

### [题目writeup]：

这个CMS安装后会存在InstallLock.txt，再访问./install/index.php会无法安装：

```php
if(file_exists('InstallLock.txt'))
 {
echo "你已经成功安装熊海内容管理系统，如果需要重新安装请删除install目录下的InstallLock.txt";
exit;
 }
```

但是这里用的是相对路径。这个CMS存在2处文件包含，在/admin/index.php那里的：

```php
<?php
//单一入口模式
error_reporting(0); //关闭错误显示
$file=addslashes($_GET['r']); //接收文件名
$action=$file==''?'index':$file; //判断为空或者等于index
include('files/'.$action.'.php'); //载入相应文件
?>
```

如果包含/install/index.php的话，会因为路径的问题，找不到InstallLock.txt，从而可以再次安装。我尝试利用这里getshell，但是确实不行。

但是这里配置是自己传的：

![JZQHJV_V8G@IMPZH_D9_MA9.png](https://i.loli.net/2021/05/06/mPwdh1kfqSDRgLl.png)



```php
$db = new DBManage ( $dbhost, $dbuser, $dbpwd, $dbname, 'utf8' );
```

```php
    function __construct($host = 'localhost', $username = 'root', $password = '', $database = 'test', $charset = 'utf8') {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->charset = $charset;
        set_time_limit(0);//无时间限制
@ob_end_flush();
        // 连接数据库
        $this->db = @mysql_connect ( $this->host, $this->username, $this->password ) or die( '<p class="dbDebug"><span class="err">Mysql Connect Error : </span>'.mysql_error().'</p>');
        //选择使用哪个数据库
```

存在一个数据库任意连接的问题。联想到MySQL 服务端恶意读取客户端任意文件漏洞，可以构造恶意的mysql服务端，来读取目标服务器上的任何文件，不再受限于.php的后缀。

![_TU_BC_3`47TJV8U__D_@II.png](https://i.loli.net/2021/05/06/yRblCAUsx1TBVOf.png)

![_J0_13_C0_J_@841CK_5__3.png](https://i.loli.net/2021/05/06/Ol5mRyLesMN4fUY.png)



![O_I_6NO049JE2_K~L13_6G0.png](https://i.loli.net/2021/05/06/xqu6XZiWIhHyCNk.png)



我本地确实打通了，但是docker里没打通，感觉可能是mysql的版本或者配置的一些问题。。反正docker不是我弄，到时候学长来弄叭，嘿嘿嘿。