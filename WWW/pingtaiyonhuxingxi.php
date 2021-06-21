<html>

<head>

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
            margin-top: 40px;
            margin-left: 300px;
            height: 20px;
            width: 400px;
            float: left;
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
        <h1>用户信息管理 </h1>
    </div>
    <div id="content">
    <a href="pingtaiyuangongdenglu.html"><input type="button" value="返回" id="back"></a>
        <table border="1" id="detail">
            <tr>
                <th>
                    电话号码
                </th>
                <th>
                    用户姓名
                </th>
                <th>
                    详情
                </th>
            </tr>
    
            <?php
            include"0.php";
            mysqli_set_charset($content,  "utf8");
         mysqli_select_db($content,"aixin");
         $sql="SELECT * FROM u ";
         $result=mysqli_query($content,$sql);
         if (!$result) {
             printf("Error: %s\n", mysqli_error($content));
             exit();
         }
         $num_rows=mysqli_num_rows($result);
         $i=0;
         while($row=mysqli_fetch_assoc($result))
         {$PhoneNumber=$row["PhoneNumber"];
         $UserName=$row["UserName"];
        
         echo "<tr>";
        echo "<th>";
        echo "$PhoneNumber";
        echo "</th>";
        echo "<th>";
        echo "$UserName";
        echo "</th>";
        echo "<th>";
        echo "<a href='pingtaiyonhuxiangxixingxi.php?PhoneNumber=$PhoneNumber'>";
        echo "<h4 id='textcolor'>查看</h4>";
        echo "</a>";
        echo "</th>";
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