<html>

<head>
    <?php
    session_start();
    $a1=$_SESSION['userID'];
    include("0.php");
    mysqli_set_charset($content,  "utf8");
    mysqli_select_db($content,"aixin");
    $sql="SELECT * FROM u Where PhoneNumber=$a1 ";
    $result = mysqli_query($content,$sql);
    $row=mysqli_fetch_assoc($result);
    $a2=$row["UserName"];
    $a3=$row["IdentityCardNumber"];
    $a4=$row["UserAddress"];
       ?>
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
            height: 75%;
            width: 1000px;
            background: #eee;
        }
        
        #content #mid {
            text-align: left;
            padding-top: 130px;
            margin-left: 300px;
        }
        
        h4 {
            color: #d00;
            font-size: 14px;
            border-bottom: 1px solid #d00;
        }
        
        h1 {
            padding-left: 150px;
            padding-top: 50px;
        }
    </style>
</head>

<body>
    <div id="top">
        <div>


            <input type="button" value="用户账号" class="btn" />
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

        <div id="search">
        <form action="sousuo.php" method="POST">
                <input type="text" name="sou" size="20">
                <input type="submit" value="搜索"><br>
        </div>
    </div>
    <div id="content">
        <h1>用户信息</h1>
        <table id="mid">
            <tr>
                <th>姓名</th>
        <?php echo"<th>$a2</th>"; ?>
            </tr>
            <tr>
                <th>电话号码</th>
        <?php echo"<th>$a1</th>"; ?>
            </tr>
            <tr>
                <th>身份证号码</th>
        <?php echo"<th>$a3</th>"; ?>
            </tr>
            <tr>
                <th>住址</th>
        <?php echo"<th>$a4</th>"; ?>
                <th>
                    <a href="aixindizhi.html"><input type="button" value="修改"></a>
                </th>
            </tr>
            <tr>
                <th>密码</th>
                <th>******</th>
                <th>
                    <a href="aixinmima.html"><input type="button" value="修改"></a>
                </th>
            </tr>
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