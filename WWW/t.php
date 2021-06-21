<html>

<head>
   <?php session_start();  ?> 
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
    </style>
</head>

<body>
<?php


include("0.php");
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");


$a1=date("Ymd").substr(implode(NULL,array_map('ord',str_split(substr(uniqid(),7,13),1))),0,8);
$_SESSION['orderID']=$a1;

$PayID=$_POST["PayID"];
$payway=$_POST["payway"];
$a2=$_SESSION['userID'];
$a3=$_SESSION['goodID'];
$a4=$_POST['days'];
if(empty($a2))
{echo "请先登录";
    exit(header("Refresh: 3; url= http://localhost/denglu.html"));
}

$sql="SELECT ReceptionStorage,MachineDeposit FROM m Where MachineNumber=$a3 ";
$result = mysqli_query($content, $sql);
$row=mysqli_fetch_assoc($result);
$deposit=$row['MachineDeposit'];
if($row['ReceptionStorage']==0)
{  echo "抱歉，该产品已无库存";
    exit(header("Refresh: 3; url= http://localhost/jiqijiemian.php"));}
if($PayID=="" || $payway=="")
{   echo "请输入完整支付信息";
        exit( header("Refresh: 3; url= http://localhost/huangkuan.html"));}

?>
    <div id="top">
        <div>


            <a href="aixinyonhu.php"><input type="button" value="用户账号" class="btn" /></a>
            <a href="http://wpa.qq.com/msgrd?v=3&uin=&site=qq&menu=yes"><input type="button" value="客服" class="btn" /></a>
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
        <form action="sousuo.php" method="POST">
                <input type="text" name="sou" size="20">
                <input type="submit" value="搜索"><br>
            </form>
        </div>
    </div>
    <div id="content">
        <h1 id="text1">付款</h1>
        <h2 id="text2">下单成功，请支付押金！</h2>
        <div id="back"><a href='jiqijiemian.php'>取消</a></div>
        <div id="picture">
       <?php     
       $sqll="INSERT INTO o (OrderNumber,PhoneNumber,MachineNumber,OrderTime,InitialReturnTime,FinalReturnTime,UseTime)values('$a1','$a2','$a3',now(),date_add( now(), interval $a4 day),date_add( now(), interval $a4 day),$a4)";
       $dsn = mysqli_query($content,$sqll);
       $sql="UPDATE o SET PayID1='$PayID' WHERE OrderNumber='$a1'";
       $result = mysqli_query($content, $sql);
       $sqlll="UPDATE m SET ReceptionStorage=ReceptionStorage-1 WHERE MachineNumber=$a3";
       $dsnn = mysqli_query($content,$sqlll);
       if($payway=="Alipay")
    { echo "<img  src='./photo/zhifubao.jpg'  width='200'  height='300'/  >";
        $sqlllll="UPDATE o SET PayPlatfrom1 ='0' WHERE OrderNumber = '$a1'";
       $resulttttt = mysqli_query($content, $sqlllll);
    
    }
    else 
    //($payway=="WeChatPay")
    {echo "<img  src='./photo/weixin.jpg' width='230'  height='200'/  >";
        $sqllll="UPDATE o SET PayPlatfrom1 ='1' WHERE OrderNumber = '$a1'";
        $resultttt = mysqli_query($content, $sqllll);
    }
    // else
    // {echo "请选择支付方式";
    //    exit( header("Refresh: 3; url= http://localhost/aixinjiqixiangxi.php"));
    //  }


      
?>
       
       <br><br><br>
            <h2>您所需要支付的押金：
              <?php  echo "$deposit";   ?>
            </h2><br><br>
<?php  
if($dsnn)
{echo "下单成功，请支付！";
    echo"<a href='tt.php'>";
    echo"<input type='button' value='支付确认' />";
    echo"</a>";}
else
{echo "下单失败，请重试";
    header("Refresh: 3; url= http://localhost/aixinjiqixiangxi.php");
}
?>
           
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