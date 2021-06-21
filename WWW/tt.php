<?php
session_start();
include("0.php");
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
$a1=$_SESSION['orderID'];
$sqlll="UPDATE o SET IfPayDeposit = 1 WHERE OrderNumber = '$a1'";
$resulll = mysqli_query($content, $sqlll);
if($resulll)
{echo "支付成功！";
    header("Refresh: 3; url= http://localhost/dingdan.php");}
    unset($_SESSION['orderID']);
?>