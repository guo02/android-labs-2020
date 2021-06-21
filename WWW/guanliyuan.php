<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>管理员</title>
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
            border-style: solid;
            border-color: #98bf21;
            align-self: center;
            align-items: center;
            width: "10%";
            margin-top: 50px;
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
    <div id="ad">
        <div id="logo"></div>
        <div id="swf"></div>
    </div>
    <div id="nav">
        <h1>机器信息管理 </h1>
    </div>
    <div id="content" class="body">
        <a href="guanliyuanxiajia.html"><input type="button" value="下架" id="back"></a>
        <a href="guanliyuanshangjia.html"><input type="button" value="上架" id="back"></a>
        <table border="1" id="table">
            <tr>
                <th align="center" width='10%'>机器名称</th>
                <th align="center" width='10%'>品牌</th>
                <th align="center" width='10%'>机器型号 </th>
                <th align="center" width='10%'>库存</th>
                <th align="center" width='10%'>费用</th>
                <th align="center" width='10%'>机器照片</th>
                <th align="center" width='10%'>机器详情</th>
            </tr>
            <?php
            include"0.php";
            mysqli_set_charset($content,  "utf8");
         mysqli_select_db($content,"aixin");
         $sql="SELECT * FROM m ";
         $result=mysqli_query($content,$sql);
         if (!$result) {
             printf("Error: %s\n", mysqli_error($content));
             exit();
         }
         $num_rows=mysqli_num_rows($result);
         $i=0;
         while($row=mysqli_fetch_assoc($result))
         {$MachineNumber=$row["MachineNumber"];
         $MachineName=$row["MachineName"];
         $Brand=$row["Brand"];
         $MachineModel=$row["MachineModel"];
         $MachinePhoto=$row["MachinePhoto"];
         $ReceptionStorage=$row["ReceptionStorage"];
         $MachineCost=$row["MachineCost"];
         echo "<tr>";
         echo"<td align='center'>".$MachineName."</td>";
         echo"<td align='center'>".$Brand."</td>";
         echo"<td align='center'>".$MachineModel."</td>";
         echo"<td align='center'>".$ReceptionStorage."</td>";
         echo"<td align='center'>".$MachineCost."</td>";
         echo"<td align='center'>";
         echo "<img  src='".$row["MachinePhoto"]."' width='100'  height='100'/  >"; 
         echo "</td>";
         echo"<td>";
         echo"<a align='center' href='guanliyuanxiangxi.php?goods_id=$MachineNumber'>详情</a>";
         echo"</td>";
         echo"</tr>";
         $i++;
         }
         mysqli_close($content);
            ?>
        </table>

    </div>
    </div>


</body>

</html>