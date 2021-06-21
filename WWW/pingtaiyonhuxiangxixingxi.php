<html>

<head>
<?php session_start();?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>用户信息</title>
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
            margin-top: 300px;
            margin-left: 300px;
            text-align: left;
            width: 400px;
            float: left;
        }
        
        #content #textcolor {
            color: rgb(231, 36, 36);
        }
    </style>
   
</head>

<body>
<?php
            include"0.php";
            mysqli_set_charset($content,  "utf8");
         mysqli_select_db($content,"aixin");
         $PhoneNumber=$_GET["PhoneNumber"];
         $_SESSION['userID']=$PhoneNumber;
         $sql="SELECT * FROM u WHERE PhoneNumber=$PhoneNumber";
         $result=mysqli_query($content,$sql);
         if (!$result) {
             printf("Error: %s\n", mysqli_error($content));
             exit();}
             $row=mysqli_fetch_assoc($result);
            
                $UserName=$row["UserName"];
                $IdentityCardNumber=$row["IdentityCardNumber"];
                $UserAddress=$row["UserAddress"];
                $Password=$row["Password"];

             ?>
     
    <div id="ad">
        <div id="logo"></div>
        <div id="swf"></div>
    </div>
    <div id="nav">
        <h1>用户信息管理 </h1>
    </div>
    <div id="content">
        <a href="pingtaiyonhuxingxi.php"><input type="button" value="返回" id="back"></a>
        <table id="detail">
            <tr>
                <tr>
                    <th>姓名</th>
                   <?php echo"<th> $UserName </th>"; ?>
                </tr>
                <tr>
                    <th>电话号码</th>
                   <?php echo "<th>$PhoneNumber</th>"; ?>
                </tr>
                <tr>
                    <th>身份证号码</th>
                    <?php echo"<th>$IdentityCardNumber</th>"; ?>
                </tr>
                <tr>
                    <th>住址</th>
                    <?php echo"<th> $UserAddress </th>"; ?> 
                    <th>
                        <a href="pingtaixiugaiyonhudizhi.html"><input type="button" value="修改"></a>
                    </th>
                </tr>
                <tr>
                    <th>密码</th>
                    <?php echo "<th>$Password</th>"; ?>
                    <th>
                        <a href="pingtaixiugaiyonhumima.html"><input type="button" value="修改"></a>
                    </th>
                </tr>
        </table>
    </div>

    </div>
    </div>


</body>

</html>