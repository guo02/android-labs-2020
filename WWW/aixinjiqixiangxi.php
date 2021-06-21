<html>

<head>
    <?php
    session_start();
       ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>门户网站-首页</title>
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
                margin-left: 250px;
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
            
            #content #demo {
                height: 200px;
                width: 200px;
                border: #000;
                margin-left: 10px;
                margin-top: 50px;
                float: left;
            }
            
            #content #picture {
                height: 200px;
                width: 200px;
                margin-left: 50px;
                margin-top: 50px;
                float: left;
            }
            
            #content #money {
                margin-left: 50px;
                margin-top: 300px;
                margin-right: 20px;
                float: right;
            }
            
            #content #details {
                padding-top: 250px;
                padding-left: 100px;
            }
            
            h4 {
                color: #d00;
                font-size: 14px;
                border-bottom: 1px solid #d00;
            }
        </style>
</head>

<body>
    <?php
    include("0.php");
    mysqli_set_charset($content,  "utf8");
    mysqli_select_db($content,"aixin");
    $a3=$_GET['goods_id'];
    $_SESSION["goodID"]=$a3;
    $sql="SELECT * FROM m WHERE MachineNumber=$a3";
    $result=mysqli_query($content,$sql);
    $row=mysqli_fetch_assoc($result);

   $b1= $row["MachinePhoto"]; 

  
    $b2= $row['Brand'];
    $b3= $row['MachineModel'];
   
  $b4= $row['MachineRenark'];
  $b5= $row['UsageMethod'];
  $b6= $row['ReceptionStorage'];
  $b8=$row["Certificate"]; 
  $b9= $row['MachineDeposit'];
    $b10= $row['MachineCost'];
    // $row=mysqli_fetch_assoc($result);
    // echo row['MachineName'];
    // echo"<a align='center' href='t.php?good_id=$a3'>下单</a>";
    // echo"<a align='center' href='jiqijiemian.php'>返回</a>";

    ?>

        <div id="top">
            <div>

                <a href="aixindenglu.html"><input type="button" value="登陆" class="btn" /></a>
                <a href="aixinzhuce.html"><input type="button" value="注册" class="btn" /></a>

                <a href="http://wpa.qq.com/msgrd?v=3&uin=329659897&site=qq&menu=yes"><input type="button" value="客服" class="btn" /></a>
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


            
        </div>
        <div id="content">
            <div id="picture">
                <?php echo"<img  src='".$b1."'  margin-left: 10px; width='150'  height='150'/  >";?>
            </div>
            <div id="demo">
                <?php echo"<img  src='".$b8."' width='150'  height='150'/  >";?>
            </div>
            <table id="money">
                <tr>
                    <?php  echo "<th>租借费用: $b10</th>"; ?>
                    <th> 元</th>
                </tr>
                <tr>
                    <?php  echo"<th>押金费用:$b9</th>"; ?>
                    <th> 元</th>
                </tr>
            </table>
            <div id="details">
                <table>

                    <tr>
                        <th>机器品牌</th>
                        <?php echo "<th> $b2</th>"; ?>
                    </tr>
                    <tr>
                        <th>机器型号</th>
                        <?php  echo"<th> $b3 </th>"; ?>
                    </tr>
                    <tr>
                        <th>库存量</th>
                        <?php  echo" <th> $b6 </th>"?>
                    </tr>
                    <tr>
                        <th>使用方法</th>
                        <?php   echo"<th> $b5 </th>"; ?>
                    </tr>
                    <br>
                  
                </table>
            
            </div>
           <br>
            <form action="t.php" method="POST">

                租借天数: <input type="text" name="days" style="width:5%">天<br> <br>
                付款方式 <input type="radio" name="payway" value="Alipay">支付宝
                <input type="radio" name="payway" value="WeChatPay">微信支付
                <br> 支付账号：
                <input type="text" name="PayID"><br> 
                <input type="submit" value="下单"><br><br>
            </form>
            
            <form action="jiqijiemian.php" method="POST">
                <input type="submit" value="返回">
            </form>
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