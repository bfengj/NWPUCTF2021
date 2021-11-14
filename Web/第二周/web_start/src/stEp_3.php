<?php  if(!isset($_GET['open_the_door'])){?>

<html>
<title>Open the way to web</title>
<body>
<h1></h1>
<div>
    <h1>Get</h1>
    <h2>是获取信息最直接的方式，你需要携带<code>open_the_door</code>参数打开通往下一题的门</h2>
    <p>如果你不会，请不要着急，耐心等待会有提示的</p>


</div>
<script>setTimeout(function(){alert("尝试在浏览器地址框的最后面添加?open_the_door=true并回车")},10000)</script>

</body>
</html>


<?php die();} else {?>

<html>
<title>Open the way to web</title>
<body>
<h1></h1>
<div>
    <h1>Get it！！！</h1>
    <h2>你成功了！下面请利用你学过的知识找到下一扇门</h2>
<!--    <a href="./SteP4.php">门在这！！！</a>-->



</div>


</body>
</html>

<?php }?>