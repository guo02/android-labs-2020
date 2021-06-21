<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>未出库信息</title>
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
            width: 500px;
            text-align: center;
            margin-top: 100px;
            margin-left: 250px;
            float: left;
        }
        
        #content #back {
            margin-top: 20px;
            float: right;
            margin-right: 10px;
        }
        
        #content #details {
            padding-top: 200px;
            padding-left: 300px;
        }
        
        #content #textcolor {
            color: rgb(231, 36, 36);
        }
    </style>
</head>

<body>
    <div id="ad">
        <div id="logo"></div>
        <div id="swf"></div>
    </div>
    <div id="nav">
        <h1>未出库信息</h1>
    </div>
    <div id="content">

        <a href="cangku.php"><input type="button" value="返回" id="back"></a>
      
        <div>
            <table border="1" id="mid">
                <tr>
                    <th>机器编号</th>
                    <th>订单编号</th>
                    <th>出库</th>
                </tr>
                <?php      
include("0.php");
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
$sql="SELECT MachineNumber,OrderNumber  FROM o Where IfOutOfStock=0 ";
$result = mysqli_query($content, $sql);
$num_rows=mysqli_num_rows($result);
         $i=0;
         while($row=mysqli_fetch_assoc($result))
         {$MachineNumber=$row["MachineNumber"];
          $OrderNumber=$row["OrderNumber"];
          echo "<tr>";
        echo"<th align='center'>".$MachineNumber."</th>";
        echo"<th align='center'>".$OrderNumber."</th>";
        echo "<th>";
        echo"<a align='center' href='aixinchuku1.php?orderID=$OrderNumber'>详情1</a>";
        echo "</th>";
        echo "<br>";
         }
?>
            </table>



        </div>


    </div>
    </div>


</body>

</html>