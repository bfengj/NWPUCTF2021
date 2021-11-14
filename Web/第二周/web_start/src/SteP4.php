<?php  if(!isset($_POST['poem'])){?>
<html>
<title>Open the way to web</title>
<body>
<h1></h1>
<div>
    <h1>车马劳顿</h1>
    <h2>Post是“邮寄”发送大量数据的方法。</h2>
    <p>这一关要求你post poem <code>国风·郑风·风雨的名句</code>给我。 </p>
    <p>如果你不会，请不要着急，耐心等待会有提示的。</p>
    <form action="" method="post" id="hide" style="display: none">
        <h3>请看这里</h3>
        <p>post方法需要通过表单来发送，当没有表单的时候你可以学习使用postman、burpsuite、hackbar。</p><p>你也可以自己创建一个html页面发送。</p>
        <input type="text" name="poem" value="既见君子，云胡不喜">
        <input type="submit" value="开门">
    </form>







</div>
<script>setTimeout(function(){alert("等久了吧");p=document.getElementById('hide');p.style.display='inline'},100000)</script>


</body>
</html>

    <?php die();} else {?>
    <html>
    <title>Open the way to web</title>
    <body>
    <h1></h1>
    <div>
        <h2>这是下一扇门</h2>
            <a href="./Cookie.php">门在这！！！</a>



    </div>


    </body>
    </html>

<?php }?>
