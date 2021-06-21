<?php
session_start();
include("0.php");
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
$a1=$_SESSION['userID'];
$a2=$_POST['UserAddress'];
$sql="UPDATE u SET UserAddress='$a2' WHERE PhoneNumber='$a1'";
$dsn = mysqli_query($content,$sql);
if($dsn)
{echo "修改成功";
echo "<br>";
echo "新地址：";
$sqll="SELECT UserAddress FROM u WHERE PhoneNumber='$a1'";
$result=mysqli_query($content,$sqll);
$ro=mysqli_fetch_assoc($result);
echo $ro['UserAddress'];
//echo"<a align='center' href='jiqijiemian.php'>返回</a>";
header("Refresh: 3; url= http://localhost/pingtaiyonhuxingxi.php"); 

}
else
{echo "对不起，地址修改失败！<br>";
//echo"<a align='center' href='xiugai.html'>请重试</a>";
header("Refresh: 3; url= http://localhost/pingtaiyonhuxingxi.php"); 
}

unset($_SESSION['userID']);


?>