<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>仓库</title>
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
            margin-top: 0px;
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
        
        #xiaoxi {
            font-size: larger;
            width: 300px;
            height: 100px;
            margin-left: 50px;
            margin-top: 50px;
            float: left;
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
$sql="SELECT MachineNumber,OrderNumber  FROM o Where IfOutOfStock=0 ";
$result = mysqli_query($content, $sql);
$num_rows=mysqli_num_rows($result);
        
?>
    <div id="ad">
        <div id="logo"></div>
        <div id="swf"></div>
    </div>
    <div id="nav">
        <h1>仓库</h1>
    </div>
    <div id="content">
        <div id="xiaoxi">
            当前可出库订单：
            <?php  echo $num_rows ?>
        </div>

       
        <a href="weichuku.php"><input type="button" value="未出库信息" id="back"></a>
        <a href="yichuku.php"><input type="button" value="已出库信息" id="back"></a>

        <div>
            <table border="1" id="mid">
                <tr>
                    <th>机器编号</th>
                    <th>机器品牌</th>
                    <th>机器型号</th>
                    <th>库存量</th>
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
         $Brand=$row["Brand"];
         $MachineModel=$row["MachineModel"];
         $BackstageStorage=$row["BackstageStorage"];
         echo "<tr>";
         echo"<th align='center'>".$MachineNumber."</th>";
         echo"<th align='center'>".$Brand."</th>";
         echo"<th align='center'>".$MachineModel."</th>";
         echo"<th align='center'>".$BackstageStorage."</th>";
         echo"</tr>";
         $i++;
         }
         mysqli_close($content);
         ?>
            </table>



        </div>


    </div>
    </div>


</body>

</html>