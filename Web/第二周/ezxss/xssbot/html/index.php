<?php
if(!isset($_GET['user'])&&!isset($_GET['query'])){
    header("Location: ./?user=guest");
    die();
}
$test=md5(uniqid('',true));
header("Content-Security-Policy:  script-src 'strict-dynamic' 'nonce-$test'; img-src 'self'; style-src 'self';  font-src 'self'; frame-src 'none' ");
header ( "Cache-Control: no-cache, must-revalidate " );
function getCurrentUrl(){
    $scheme = $_SERVER['REQUEST_SCHEME'];
    $domain = $_SERVER['HTTP_HOST'];
    $requestUri = $_SERVER['REQUEST_URI'];
    $currentUrl = $scheme . "://" . $domain . $requestUri;
    return $currentUrl;
}
if (isset($_GET['query'])){
    //drive bot to visit your page
    //source code : browser.get('http://127.0.0.1/?'+sys.argv[1])
    //query example: 
    //your url : httP://127.0.0.1/?user=guest
    //query : user=guest
    $text=escapeshellarg($_GET['query']);
    #echo($text);
    system('python /var/xssbot/xssbot.py '.$text);
    //sleep(3);
    die();
}
echo "
<html>
<head>
<link rel='stylesheet' href='./css/stylesheet.css'>
</head>
";
echo "<body>\n";
if (isset($_GET['user'])){
    echo '<h1 id="username">'.($_GET['user']).'</h1>';
}



echo '<div id="particles-js"></div>';


echo "
<script nonce='$test' src='./js/jquery-1.12.0.js'></script>
<script nonce='$test' src='./js/particles.min.js'></script>
<script nonce='$test' src='./js/app.js'></script>
 ";
echo "</body>
</html>
";


?>
