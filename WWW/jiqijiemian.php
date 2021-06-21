<html>

<head>
    <?php
    session_start();
    ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>机器</title>
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
            
            #content #machine {
                height: 20px;
                width: auto;
                background-color: rgb(59, 59, 71);
            }
            
            h4 {
                color: #d00;
                font-size: 14px;
                border-bottom: 1px solid #d00;
            }
            
            .button {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
                align-self: right;
            }
            
            .table {
                border-style: solid;
                border-color: #98bf21;
                align-self: center;
                align-items: center;
                width: "10%";
            }
            
            .body {
                font-family: Arial, Helvetica, sanes-serif;
                font-size: 20px;
            }
            
            a:link {
                color: #000000;
            }
            
            a:visited {
                color: #aCAF50;
            }
            
            a:hover {
                color: #4CAF50;
            }
            
            a:active {
                color: #0000FF;
            }
        </style>
</head>

<body>
    <div id="top">
        <div>


        <a href="aixinyonhu.php"> <input type="button" value="用户账号" class="btn" /></a>
        <a href="http://wpa.qq.com/msgrd?v=3&uin=329659897&site=qq&menu=yes"><input type="button" value="客服" class="btn" /></a>
            <!-- <input type="button" value="客服" class="btn" /> -->
        </div>
    </div>
    <div id="ad">
        <div id="logo"></div>
        <div id="swf"></div>
    </div>
    <div id="nav">
        <a href="#" id="index">首页</a>
        <a href="jiqijiemian.php">机器</a>
        <a href="dingdan.php">订单</a>

        <div id="search">
        <form action="sousuo.php" method="POST">
            <input type="text" name="sou" size="20" >
            <input type="submit" value="搜索"><br>
        </form>
        </div>
    </div>
    <div id="content" class="body">
        <table border="1">
            <tr>
                <th align="center" width='10%'>机器名称</th>
                <th align="center" width='10%'>品牌</th>
                <th align="center" width='10%'>机器型号 </th>
                <th align="center" width='10%'>库存</th>
                <th align="center" width='10%'>费用</th>
                <th align="center" width='10%'>机器照片</th>
                <th align="center" width='10%'>下单</th>
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
         echo"<a align='center' href='aixinjiqixiangxi.php?goods_id=$MachineNumber'>详情</a>";
         echo"</td>";
         echo"</tr>";
         $i++;
         }
         mysqli_close($content);
            ?>
        </table>

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