<?php
session_start();
$_SESSION['flag'] = "flag{Y0u_Kn4w`negative_numb3r!}";
/*
西工大生活模拟器
你一个月的生活费是1000元，一个月30天。
每过一天，你的吃喝玩乐都需要花费50元。
为了可以活过一个月，你想到了去炒股。
一共100支股票可以投入钱，每个股票每天的收益都是投入的本金乘以0.02，股票ID是从1到100
股票的收益将直接存入你当前的持有金额（不包含投入到股票的钱）中。
如果你当前的持有金额为负，1000元活过一个月的挑战就失败！
如果活过一个月，就可以得到flag！
*/
function init()
{
    $_SESSION['hasInit'] = true;
    $_SESSION['money'] = 1000;
    $_SESSION['stock'] = array();
    for ($i = 1; $i <= 100; $i++) {
        $_SESSION['stock'][$i] = 0;
    }
    $_SESSION['day'] = 1;
    $_SESSION['msg'] = "崭新的一个月开始了！！！";
    //return $_SESSION['msg'];
}

function buyStock($inputMoney, $stockId)
{
    if (!array_key_exists($stockId, $_SESSION['stock'])) {
        $_SESSION['msg'] = "股票的编号有误";
    } else if ($inputMoney <= $_SESSION['money']) {
        $_SESSION['stock'][$stockId] += $inputMoney;
        $_SESSION['money'] -= $inputMoney;
        $_SESSION['msg'] = "买入成功";
    } else {
        $_SESSION['msg'] = "余额不足！";
    }
}

function sellStock($outputMoney, $stockId)
{
    if (!array_key_exists($stockId, $_SESSION['stock'])) {
        $_SESSION['msg'] = "股票的编号有误";
    } else if ($outputMoney > $_SESSION['stock'][$stockId]) {
        $_SESSION['msg'] = "您在该股票中的资金比您要取出的钱少";
    } else {
        $_SESSION['stock'][$stockId] -= $outputMoney;
        $_SESSION['money'] += $outputMoney;
        $_SESSION['msg'] = "卖出成功！";
    }
}

function getProfit()
{
    $profit = 0;
    for ($i = 1; $i <= 100; $i++) {
        //$profit += round($_SESSION['stock'][$i] * 0.02);
        $profit += $_SESSION['stock'][$i] * 0.02;

    }
    $_SESSION['money'] += $profit;
    $_SESSION['msg'] = "您昨天股票的收益一共是 $profit 元！！！";
}

function nextDay()
{
    $_SESSION['money'] -= 50;
    if ($_SESSION['money'] < 0) {
        $_SESSION['msg'] = "抱歉，你只坚持到了第 {$_SESSION['day']} 天！！！";
    } else {
        $_SESSION['day']++;
        if ($_SESSION['day'] >= 31) {
            $_SESSION['msg'] = "你坚持活了一个月！！！这是给你的奖励：{$_SESSION['flag']}";
            //$_SESSION['money'] = 0;
        } else {
            getProfit();
        }
    }
}

if ($_GET['action'] === "init") {
    init();
} elseif ($_SESSION['hasInit'] !== true) {
    echo '<form method ="get">
    <input type="hidden" name="action" value="init" >
    <input type="submit" value="开始挑战！！！" />
</form>';
    exit();
} elseif ($_GET['action'] === "buy" && isset($_GET['inputMoney']) && isset($_GET['stockId'])) {
    buyStock($_GET['inputMoney'], $_GET['stockId']);
} elseif ($_GET['action'] === "sell" && isset($_GET['outputMoney']) && isset($_GET['stockId'])) {
    sellStock($_GET['outputMoney'], $_GET['stockId']);
} elseif ($_GET['action'] === "nextDay") {
    nextDay();
}
echo "<p>第{$_SESSION['day']}天!</p>";
echo "<p>你目前的持有金额：{$_SESSION['money']}元！</p>";
echo "<p>{$_SESSION['msg']}</p>";
if (strpos($_SESSION['msg'], "抱歉") !== false || strpos($_SESSION['msg'], "flag") !== false) {
    echo '    <form method="get">
        <input type="hidden" name="action" value="init">
        <input type="submit" value="重新开始"/>
    </form>';
    exit();
}
?>
    <br>
    <form method="get">
        <input type="hidden" name="action" value="buy">
        <p>投入的金额<input type="text" name="inputMoney"></p>
        <p>购买的股票的ID<input type="text" name="stockId"></p>
        <p><input type="submit" value="买入股票"/></p>
    </form>
    <br>
    <form method="get">
        <input type="hidden" name="action" value="sell">
        <p>卖出的金额<input type="text" name="outputMoney"></p>
        <p>卖出的股票的ID<input type="text" name="stockId"></p>
        <input type="submit" value="卖出股票"/>
    </form>
    <form method="get">
        <input type="hidden" name="action" value="nextDay">
        <input type="submit" value="下一天！！！"/>
    </form>
    <form method="get">
        <input type="hidden" name="action" value="init">
        <input type="submit" value="重新开始"/>
    </form>
<?php

echo "<p></p>";
for ($i = 1; $i <= 100; $i++) {
    if ($_SESSION['stock'][$i] > 0) {
        echo "<p>你在编号为 $i 的股票中目前投入了 {$_SESSION['stock'][$i]}元，需要时可按需取出。</p>";
    }
}