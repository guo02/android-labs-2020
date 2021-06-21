<?php
session_start();
include("0.php");
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
$a1=$_SESSION['userID'];
$a2=$_POST['Password'];
$a3=$_POST['Pw'];
if($a2===$a3)
{$sql="UPDATE u SET Password='$a2' WHERE PhoneNumber='$a1'";
$dsn = mysqli_query($content,$sql);
if($dsn)
{echo "修改成功";
    header("Refresh: 3; url= http://localhost/aixinyonhu.php");
}
else
{echo "对不起，密码修改失败！<br>";
    header("Refresh: 3; url= http://localhost/aixinmima.html");
}
}
else 
{echo "两个密码请保持一致";
    header("Refresh: 3; url= http://localhost/aixinmima.html");
}
?>