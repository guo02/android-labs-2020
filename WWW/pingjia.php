<?php
session_start();
include("0.php");
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
$OrderNumber=$_SESSION['ON'];
$a1=$_POST['pingjia'];
$a2=$_POST['Evaluate'];
$sqll="UPDATE o SET MachineLevel = '$a1' WHERE OrderNumber = '$OrderNumber'";
$resultt = mysqli_query($content, $sqll);
$sql="UPDATE o SET Evaluate = '$a2' WHERE OrderNumber='$OrderNumber'";
$result = mysqli_query($content, $sql);
if($result)
{echo "评价成功";
    header("Refresh: 3; url= http://localhost/dingdan.php");}
else
{echo "评价失败，请重试！";
    header("Refresh: 3; url= http://localhost/pinglun.html");}
?>