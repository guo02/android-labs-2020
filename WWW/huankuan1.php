<html>

<head>
<?php
session_start();
?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>支付押金</title>
    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
        }
        
        ul {
            list-style: none;
        }
        
        body {
            font-size: 12px;
        }
        
        #top {
            width: 100%;
            height: 26px;
            color: #fff;
            background: #000;
        }
        
        #top div {
            width: 60%;
            height: 18px;
            padding-top: 3px;
            margin-left: 8%;
            overflow: hidden;
        }
        
        #top div input {
            height: 20px;
            margin-left: 280px;
        }
        
        select {
            height: 18px;
        }
        
        #top div.btn {
            height: 20px;
        }
        
        #ad,
        #nav,
        #content,
        #bottom {
            width: 801px;
            margin: 0px auto;
        }
        
        #ad {
            height: 65px;
        }
        
        #ad #logo {
            width: 144px;
            height: 55px;
            float: left;
            margin: 5px;
            background: #ccc;
        }
        
        #ad #swf {
            width: 630px;
            height: 55px;
            margin-left: 8px;
            margin-top: 5px;
            float: left;
            background: #ccc;
        }
        
        #nav {
            height: 28px;
            text-align: right;
        }
        
        #nav a {
            font-size: 14px;
            display: block;
            float: left;
            margin-left: 150px;
            margin-top: 6px;
            color: rgb(22, 9, 9);
            letter-spacing: 0.2em;
            text-align: center;
            text-decoration: none;
        }
        
        a #index {
            clear: left;
        }
        
        #nav a:hover {
            color: #d00;
            background: #fff;
        }
        
        #search {
            padding-top: 3px;
            padding-right: 10px;
        }
        
        #search input {
            height: 20px;
        }
        
        #search.btn {
            height: 20px;
        }
        
        #bottom {
            width: 100%;
            height: 100px;
            background: #000;
        }
        
        h5 {
            text-align: center;
            padding-top: 20px;
            font-size: 13px;
            color: #fff;
        }
        
        #content {
            height: 800px;
            width: 1000px;
            background: #eee;
        }
        
        #content #mid {
            text-align: center;
            padding-top: 300px;
            margin-left: auto;
        }
        
        #content #picture {
            margin-top: 50px;
            margin-left: 300px;
            float: left;
            text-align: center;
        }
        
        #text1 {
            padding-top: 50px;
            margin-left: 200px;
        }
        
        #text2 {
            color: rgb(59, 58, 58);
            margin-top: 10px;
            margin-left: 250px;
        }
        
        h4 {
            color: #d00;
            font-size: 14px;
            border-bottom: 1px solid #d00;
        }
        
        #content #back {
            padding-top: 60px;
            margin-right: 60px;
            font-size: 20px;
            float: right;
        }
        
        #content #pingjia {
            margin-top: 50px;
            margin-left: 300px;
        }
    </style>
</head>

<body>
    <?php
include("0.php");
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
$OrderNumber=$_SESSION["ON"];
$PayID=$_POST["PayID"];
$payway=$_POST["payway"];
if($PayID=="")
{   echo "请输入完整支付信息";
    exit( header("Refresh: 3; url= http://localhost/huangkuan.html"));}
    $sql="UPDATE o SET PayID2='$PayID' WHERE OrderNumber=$OrderNumber";
    $result = mysqli_query($content, $sql);


 

$sql="SELECT MachineNumber,UseTime FROM o WHERE OrderNumber='$OrderNumber'";
$result=mysqli_query($content,$sql);
$ro=mysqli_fetch_assoc($result);
$a1=$ro['UseTime'];

$MachineNumber=$ro['MachineNumber'];
$sq="SELECT MachineCost FROM m WHERE MachineNumber='$MachineNumber'";
$resul=mysqli_query($content,$sq);
$ro=mysqli_fetch_assoc($resul);
$a2=$ro['MachineCost'];

$a3=$a2*$a1;
$sqll="UPDATE o SET Cost = '$a3' WHERE OrderNumber = '$OrderNumber'";
$resultt = mysqli_query($content, $sqll);
if(!$resultt)
{
echo "结算失败，请重试";
exit( header("Refresh: 3; url= http://localhost/dingdan.php"));}
?>
    <div id="top">
        <div>


            <a href="用户信息.html"><input type="button" value="用户账号" class="btn" /></a>
            <input type="button" value="客服" class="btn" />
        </div>
    </div>
    <div id="ad">
        <div id="logo"></div>
        <div id="swf"></div>
    </div>
    <div id="nav">
        <a href="首页.html" id="index">首页</a>
        <a href="jiqijiemian.php">机器</a>
        <a href="dingdan.php">订单</a>

        <div id="search">
            <input type="text" size="20" value="" />
            <input type="button" value="搜索" class="btn" />
        </div>
    </div>
    <div id="content">
        <h1 id="text1">付款</h1>
        <h2 id="text2">返还成功，请支付费用</h2>
        <div id="back"> <a href="huangkuan.html">返回</a></div>
        <div id="picture">
            <?php
if($payway=="Alipay")
{ echo "<img  src='./photo/zhifubao.jpg'  width='250px'  height='300px'/  >";
    $sqlllll="UPDATE o SET PayPlatfrom2 = 0 WHERE OrderNumber = '$OrderNumber'";
    $resulttttt = mysqli_query($content, $sqlllll);}
else if($payway=="WeChatPay")
{echo "<img  src='./photo/weixin.jpg' width='300px'  height='300px'/  >";
    $sqllll="UPDATE o SET PayPlatfrom2 = 1 WHERE OrderNumber = '$OrderNumber'";
    $resultttt = mysqli_query($content, $sqllll);}
else
{echo "请选择支付方式";
    header("Refresh: 3; url= http://localhost/huangkuan.html");
 }
            ?>
          
            <h2>您所需要支付的费用：
             <?php   echo"$a3";  ?> </h2><br><br>
            
            <a href="huankuan2.php"><input type="button" value="确认支付并前往评论"></a><br><br><br>
        </div>



    </div>

    </div>
    </div>
    <div id="bottom">
        <h5>
            公司名称<br/> 联系方式
            <br/> 公司地址
            <br/>
        </h5>
    </div>

</body>

</html>