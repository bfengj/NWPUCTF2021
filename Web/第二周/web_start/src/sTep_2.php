<html>
<title>Open the way to web</title>
<body>
<h1></h1>
<div>
    <h1>要知道</h1>
    <h2>有些东西可能会藏到注释里</h2>
    <p>如果你不会，请不要着急，耐心等待会有提示的</p>
    <!--    <p><a href="./stEp_3.php"></a></p>-->
    <p id="hide" style="display: none">什么是html：<a href="https://www.runoob.com/html/html-tutorial.html">https://www.runoob.com/html/html-tutorial.html</a></p>
</div>
<script>setTimeout(function(){alert("也许你应该按一下ctrl+u或者F12或者右键查看网页源代码");p=document.getElementById('hide');p.style.display='inline'},10000)</script>

</body>
</html>
<?php
