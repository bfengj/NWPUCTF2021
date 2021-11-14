<?php if(!isset($_COOKIE['is_admin'])) {?>

<html>
<title> Open the way to web </title >
<body>
<h1></h1>
<div>
    <h1> 拉开帷幕</h1 >
    <h2> 既然你已经可以独立解决问题了，那加下来我们我们正式开始</h2 >
    <p> 这个页面使用cookie来认证你是否是管理员<del > is_admin</del > ，尝试欺骗系统进入后台吧。</p >
    <p> 如果你不会，请不要着急，耐心等待会有提示的。</p >
    <div style = "display: none;" id = "hide" >
        <h4 > 下面这个链接将会通过执行一段javascript脚本来设置cookie：</h4 >
    点它 >>>  <a onclick = "document.cookie='is_admin=1';alert('设置成功')" style = "color: black;text-decoration: none" > document . cookie = 'is_admin=1' </a >
        <h4 > 你也可以点击下面的按钮查看你当前的cookie</h4 >
    点它 >>>  <a onclick = "this.text=document.cookie" style = "color: black;text-decoration: none" > this . text = document . cookie </a >
        <p > 设置成功以后，你需要刷新重新加载页面！</p >
    </div >
    <script > setTimeout(function () {
        alert("这是提示");
        p = document . getElementById('hide');
        p . style . display = 'inline'}, 12000)</script >
</div>
</body>

</html>


<?php } else {
    header("Set-Cookie: your_answer=flag{you_are_getting_started}; path=/");
    ?>
<html>
<title> Open the way to web </title >
<body>
<h1></h1>
<div>
    <h1> 戛然而止</h1 >
    <h2> 你已经得到了你的答案，但是它藏起来了。尝试使用所学找到它！</h2 >
    <p> 如果你不会，请不要着急，耐心等待会有提示的。</p >
    <div id="hide" style="display: none">
        <p>答案藏在cookie里！！alert函数可以把变量内容弹框,而document.cookie是浏览器储存cookie的对象。</p>

        请在这里输入js代码： <textarea  name="jscode" id="jscode" > </textarea>
        <input type="submit" value="点我执行" onclick="eval(document.getElementById('jscode').value)" >
        <p>另外chrome可以直接查看cookie的内容</p>
    </div>
    <script > setTimeout(function () {
            alert("提示来了");
            p = document . getElementById('hide');
            p . style . display = 'inline'}, 120000)</script >
</div>
</body>

</html>

<?php }?>