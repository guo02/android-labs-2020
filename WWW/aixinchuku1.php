<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>出库</title>
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
        
        select {
            height: 18px;
        }
        
        #ad,
        #nav,
        #content,
        #bottom {
            width: 801px;
            margin: 0px auto;
        }
        
        #nav {
            height: 28px;
            text-align: center;
        }
        
        #nav a {
            font-size: 14px;
            display: block;
            margin-left: 150px;
            margin-top: 6px;
            color: rgb(22, 9, 9);
            letter-spacing: 0.2em;
            text-align: center;
            text-decoration: none;
        }
        
        #nav a:hover {
            color: #d00;
            background: #fff;
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
        
        #content #back {
            margin-top: 20px;
            float: right;
            margin-right: 10px;
        }
        
        #content #detail {
            margin-top: 40px;
            margin-left: 300px;
            height: 20px;
            width: 400px;
            float: left;
        }
        
        #content #textcolor {
            color: rgb(231, 36, 36);
        }
        
        #content #xinxi {
            padding-top: 20px;
            padding-left: 300px;
        }
        
        #content #wuliu {
            margin-top: 50px;
            margin-left: 300px;
        }
        
        .title {
            padding-top: 100px;
            padding-left: 100px;
        }
    </style>
     <?php
     session_start();
    include("0.php");
    mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
   $a1=$_GET['orderID'];
   $_SESSION['OID']=$a1;
   $sql="SELECT MachineNumber,PhoneNumber,PayID1,PayPlatfrom1,IfPayDeposit FROM o Where OrderNumber='$a1' ";
$result = mysqli_query($content, $sql);
$row=mysqli_fetch_assoc($result);
$MachineNumber=$row['MachineNumber'];
$PhoneNumber=$row['PhoneNumber'];
$PayID1=$row['PayID1'];
$PayPlatfrom1=$row['PayPlatfrom1'];
$IfPayDeposit=$row['IfPayDeposit'];
$sqll="SELECT UserName,UserAddress FROM u Where PhoneNumber='$PhoneNumber' ";
$resul = mysqli_query($content, $sqll);
$ro=mysqli_fetch_assoc($resul);
$UserName=$ro['UserName'];
$UserAddress=$ro['UserAddress'];

mysqli_close($content);
    ?>
</head>

<body>
    <div id="ad">
        <div id="logo"></div>
        <div id="swf"></div>
    </div>
    <div id="nav">
        <h1>出库管理 </h1>
    </div>
    <div id="content">
    <a href='cangku.php'><input type="button" value="返回" id="back"></a>
        <h1 class="title">确定以下订单信息</h1>
        <table id="xinxi">
            <tr>
                <th>
                    客户号码：
                </th>
                <?php echo"<th>$PhoneNumber</th>";  ?> 
            </tr>
            <tr>
                <th>
                    客户姓名：
                </th>
                <th>
                <?php echo"$UserName"; ?>
                </th>
            </tr>
            <tr>
                <th>
                    客户地址：
                </th>
                <th>
                <?php echo"$UserAddress"; ?> 
                </th>
            </tr>
            <tr>
                <th>
                    订单号:
                </th>
                <th>
                <?php echo"$a1";  ?> 
                </th>
            </tr>
            <tr>
                <th>
                    机器编号：
                </th>
                <th>
                <?php echo"$MachineNumber" ?>
                </th>
            </tr>
            <th>
                    押金支付账号：
                </th>
                <th>
               <?php echo"$PayID1" ?>
                </th>
            </tr>
            <tr>
                <th>
                    支付平台：
                </th>
                <th>
               <?php 
               if($PayPlatfrom1)
               {echo "微信";}
               else
               {echo "支付宝";} ?>
                </th>
                <tr>
                <th>
                    支付状态：
                </th>
                <th>
               <?php
               if($IfPayDeposit)
               { echo "已支付"; }
               else
               {echo "未支付";}
                ?>
                </th>
            </tr>
            </tr>
            </tr>
        </table>
        <form action="chuku2.php" method="POST" id="wuliu">

            快递单号: <input type="text" name="DeliverSlipNumber">
            <br> 快递公司: <input type="text" name="DeliverCompany">
            <br>
            <input type="submit" value="提交"><br>
        </form>



    </div>

    </div>
    </div>


</body>

</html>