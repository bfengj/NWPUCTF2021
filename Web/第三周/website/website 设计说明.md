# website 设计说明

### [题目信息]：

| 出题人 | 出题时间 | 题目名字 | 题目类型 | 难度 |
| :----- | :------- | :------- | :------- | :--- |
| feng   | 20210426 | website  | web      | 中等 |

### [题目描述]：

```
小明从网上找了一个CMS搭建了自己的网站，并把他珍藏多年的flag藏到了VPS根目录下。
大黑客mjb发现了这件事，并且蠢蠢欲动。他经过周密的信息收集，发现CNVD上关于这个CMS的最新漏洞似乎可以利用......
```

### [题目考点]：

```
1. 代码审计
2. sql注入
```

### [是否原创]：

是

### [Flag]:

flag{0h_Th3_@rb1trary_F1l3_D0wn1o@d_Is_ve2y_eZ!~}

### [题目环境]：

php5.6或者其他合适的php版本都可，只要文件包含不会存在00截断等之类的问题把.php后缀去掉。

### [特别注意]：

```
SQL注入中load_file不能读到/flag，outfile等也不能写马
```

### [题目制作过程]：

把安装前的源码文件里面的源码放到/var/www/html下面。

然后install，注意用户名或者密码用强密码，因为这个CMS还有很多SQL注入和admin绕过，再考一层这个绕过。

![ST~M_0TLLSVQZQTL_Q3A4EN.png](https://i.loli.net/2021/05/06/AsXdavBNtSwO3Ci.png)

flag放在/flag即可。

到时候需要放出install之后的源码以供审计。

### [题目writeup]：

根据题目的提示去CNVD上查找熊海CMS，找到了这个任意文件下载，或许可以下载到/flag：

![A_AUF416D@4_~9L~TBHAXID.png](https://i.loli.net/2021/05/06/FJmRBG98sLSvNOI.png)



全局查找一下download，发现存在这样的下载功能，在files/downloads.php。

看一下，简单的逻辑就是:

```php
$fileid=addslashes($_GET['cid']);
$query = "SELECT * FROM download WHERE ( id='$fileid')";
......
$down= mysql_fetch_array($result);
$fileadd=$down['softadd'];
```

取数据库中的softadd列，这就是要下载文件的位置。然后就会下载。

因此要想办法控制download表的softadd列。再全局查找一下`update download`：

![5OQQ_~__WR8`L`_B`H_BB_Q.png](https://i.loli.net/2021/05/06/Abpz8HDFCL4KqcO.png)

发现存在任意的update，可以任意给这个download表写东西，这样的话它的softadd就可控了：

```php
$query = "UPDATE download SET 
title='$title',
keywords='$keywords',
description='$description',
$images
daxiao='$daxiao',
language='$language',
version='$version',
author='$author',
demo='$demo',
url='$url',
softadd='$softadd',
softadd2='$softadd2',
xs='$xs',
content='$content',
date=now()
WHERE id='$id'";
```

只不过这是admin后台里的东西，因此要想办法成为admin。这个CMS要成为admin太简单了，最简单的2种方法就是admin login那里的0过滤的SQL注入直接万能密码，或者cookie伪造都可以，非常简单。

然后进入后台设置要下载的文件（softadd）：

![`81Y_IH_YWJV7Q_~1_0IFGU.png](https://i.loli.net/2021/05/06/5neXtv3mwbljYdU.png)



然后利用上面的那个下载功能，下载/flag即可。

（是比较省略的WP，很细节的wp懒得写了。。。。）