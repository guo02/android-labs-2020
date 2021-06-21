<?php
include("0.php");
session_start();
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
$OrderNumber=$_SESSION["ON"];
$sqll="UPDATE o SET IfRepay = '1' WHERE OrderNumber = '$OrderNumber'";
$resultt = mysqli_query($content, $sqll);
if($resultt)
{
    header('Location: http://localhost/pinglun.html');
}
else
{echo "支付记录未录入，请客服解决";
    header("Refresh: 3; url= http://localhost/huangkuan.html");
}


?>