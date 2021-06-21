<html>


<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>机器详细信息</title>
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
        
        #content #table {
            align-self: center;
            align-items: center;
            width: "10%";
            margin-top: 100px;
            margin-left: 100px;
            float: left;
        }
        
        .body {
            font-family: Arial, Helvetica, sanes-serif;
            font-size: 20px;
            margin-left: 50px;
            margin-top: 50px;
        }
        
        #content #textcolor {
            color: rgb(231, 36, 36);
        }
    </style>
</head>

<body>
<?php
    include("0.php");
    mysqli_set_charset($content,  "utf8");
    mysqli_select_db($content,"aixin");
    $a3=$_GET['goods_id'];
    $sql="SELECT * FROM m WHERE MachineNumber=$a3";
    $result=mysqli_query($content,$sql);
    $row=mysqli_fetch_assoc($result);

   $b1= $row["MachinePhoto"]; 

  
    $b2= $row['Brand'];
    $b3= $row['MachineModel'];
   
  $b4= $row['MachineRenark'];
  $b5= $row['UsageMethod'];
  $b6= $row['ReceptionStorage'];
  $b7=$row['BackstageStorage'];
  $b8=$row["Certificate"]; 
  $b9= $row['MachineDeposit'];
    $b10= $row['MachineCost'];
    $b11= $row['MachineName'];

    ?>
    <div id="ad">
        <div id="logo"></div>
        <div id="swf"></div>
    </div>
    <div id="nav">
        <h1>机器信息管理 </h1>
    </div>
    <div id="content" class="body">
    <a href="guanliyuan.php"><input type="button" value="返回" id="back"></a>
        <a href="guanliyuanxiajia.html"><input type="button" value="下架" id="back"></a>
        <a href="guanliyuanshangjia.html"><input type="button" value="上架" id="back"></a>
        <table id="table">
            <tr>
                <th>
                    机器编号
                </th>
                <th><?php echo "$a3";   ?></th>
            </tr>
            <tr>
                <th>
                    机器名称
                </th>
                <th>
               <?php  echo "$b11"; ?>
                </th>
            </tr>
            <tr>
                <th>
                    机器品牌
                </th>
                <th>
                <?php echo "$b2"; ?>
                </th>
            </tr>
            <tr>
                <th>
                    机器型号
                </th>
                <th>
                <?php echo "$b3"; ?>
                </th>
            </tr>
            <tr>
                <th>
                    机器照片
                </th>
                <th>
                <?php echo"<img  src='".$b1."'  width='100'  height='100'/  >";?>  
                
                </th>
            </tr>
            <tr>
                <th>
                    机器备注
                </th>
                <th>
            <?php  echo "$b4";    ?>
                </th>
            </tr>
            <tr>
                <th>
                    库存量（前端）
                </th>
                <th>
               <?php  echo "$b6"; ?>
                </th>
            </tr>
            <tr>
                <th>
                    库存量（后台）
                </th>
                <th>
                <?php  echo "$b7";  ?>
                </th>
            </tr>
            <tr>
                <th>
                    合格证
                </th>
                <th>
                <?php echo"<img  src='".$b8."'  width='100'  height='100'/  >";?> 
                </th>
            </tr>
            <tr>
                <th>
                    押金费用
                </th>
                <th>
                <?php echo "$b9";  ?>
                </th>
            </tr>
            <tr>
                <th>
                    租借费用
                </th>
                <th>
                <?php  echo "$b10"; ?>
                </th>
            </tr>
            <tr>
                <th>
                    机器名称
                </th>
                <th>
                <?php echo "$b11";  ?>
                </th>
            </tr>



        </table>

    </div>
    </div>


</body>

</html>