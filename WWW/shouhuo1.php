<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>收货</title>
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
include("0.php");
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
$a1=$_POST['DeliverSlipNumber'];
$sq="SELECT OrderNumber FROM w WHERE DeliverSlipNumber='$a1'";
$resul=mysqli_query($content,$sq);
$ro=mysqli_fetch_assoc($resul);
$a2=$ro['OrderNumber'];
$s="SELECT * FROM o WHERE OrderNumber='$a2'";
$re=mysqli_query($content,$s);
$r=mysqli_fetch_assoc($re);
$a3=$r['MachineNumber'];
$a4=$r['IfNormal1'];
$a5=$r['IfNormal2'];
$PayID1=$r['PayID1'];
$PayPlatfrom1=$r['PayPlatfrom1'];
$PayID2=$r['PayID2'];
$PayPlatfrom2=$r['PayPlatfrom2'];
$PhoneNumber=$r['PhoneNumber'];
$IfRepay=$r['IfRepay'];
$sqll="UPDATE o SET IfFinish = '1' WHERE OrderNumber = '$a2'";
$resultt = mysqli_query($content, $sqll);

$sql="UPDATE w SET TakingTime = now() WHERE DeliverSlipNumber='$a1' ";
$result = mysqli_query($content, $sql);
$sqlll="UPDATE m SET ReceptionStorage=ReceptionStorage+1 WHERE MachineNumber=$a3";
$resulttt = mysqli_query($content, $sqlll);
$sqllll="UPDATE m SET BackstageStorage=BackstageStorage+1 WHERE MachineNumber=$a3";
$resultttt = mysqli_query($content, $sqllll);
$sqll="UPDATE o SET IfRefundDeposit = '1' WHERE OrderNumber = '$a2'";
$resultt = mysqli_query($content, $sqll);

//header("Refresh: 3; url= http://localhost/shouhuo.html");
?>
</head>

<body>
    <div id="ad">
        <div id="logo"></div>
        <div id="swf"></div>
    </div>
    <div id="nav">
        <h1>收货管理 </h1>
    </div>
    <div id="content">
    <a href='shouhuo.html'><input type="button" value="返回" id="back"></a>
        <h1 class="title">请退还客户押金</h1>
        <table id="xinxi">
            <tr>
                <th>
                    客户号码：
                </th>
                <?php echo"<th>$PhoneNumber</th>";  ?> 
            </tr>
            <tr>
                <th>
                    机器编号：
                </th>
                <th>
                <?php echo"$a3" ?>
                </th>
            </tr>
            <tr>
            <th>
                    押金支付账号：
                </th>
                <th>
               <?php echo"$PayID1" ?>
                </th>
            </tr>
            <tr>
                <th>
                    押金支付平台：
                </th>
                <th>
               <?php 
               if($PayPlatfrom1)
               {echo "微信";}
               else
               {echo "支付宝";} ?>
                </th>
            </tr>
                
            <tr>
            <th>
                    支付账号：
                </th>
                <th>
               <?php echo"$PayID2" ?>
                </th>
          </tr>
          <tr>
            <th>
                    支付平台：
                </th>
                <th>
               <?php 
               if($PayPlatfrom2)
               {echo "微信";}
               else
               {echo "支付宝";} ?>
                </th>
    </tr>
                <tr>
                <th>
                    支付状态：
                </th>
                <th>
               <?php
               if($IfRepay)
               { echo "已支付"; }
               else
               {echo "未支付";}
                ?>
                </th>
            </tr>
            <tr>
                <th>
                    仪器状况：
                </th>
                <th>
         <?php 
           if(!$a4)
           {echo "寄出时损坏";}
           else if((!$a5) && $a4)
           {echo "用户使用时损坏";}
           else
           {echo "机器正常";}
           ?>
                </th>
            </tr>
          
        </table>
       
       

    </div>
    
    </div>
    </div>


</body>

</html>