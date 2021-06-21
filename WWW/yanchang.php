<html>

<head>
    <?php
    session_start();
    include("0.php");
    mysqli_set_charset($content,  "utf8");
    mysqli_select_db($content,"aixin");
    $a1=$_GET['ordernumber'];
    $_SESSION['OID']=$a1;
    ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>延长寄回时间</title>
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
                font-size: larger;
            }
            
            #text {
                padding-top: 50px;
                margin-left: 200px;
            }
            
            h4 {
                color: #d00;
                font-size: 14px;
                border-bottom: 1px solid #d00;
            }
            
            #content #back {
                padding-top: 60px;
                margin-right: 60px;
                font-size: 20px;
                float: right;
            }
        </style>
</head>

<body>
    <div id="top">
        <div>


            <a href="aixinyonhu.php"><input type="button" value="用户账号" class="btn" /></a>
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
        <h1 id="text">延长使用时间</h1>

        <a  href='dingdan.php'><div id="back">取消</a></div>
        <div id="mid">
            <form action="yanchangshuo.php" method="POST">
                请输入你要延长的天数: <input type="text" name="UTime" style="width:5%"><br> <br>

                <input type="submit" value="提交"><br>
            </form>
        </div>

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