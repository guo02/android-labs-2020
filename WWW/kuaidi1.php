<?php
include("0.php");
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
$a1=$_POST['OrderNumber'];
$a2=$_POST['DeliverSlipNumber'];
$a3=$_POST['DeliverCompany'];
$a4=$_POST['zc'];
$sqll="UPDATE o SET IfNormal2 = '$a4' WHERE OrderNumber = '$a1'";
$resultt = mysqli_query($content, $sqll);
if(!$resultt)
{echo "数据异常，请重试";
    exit( header("Refresh: 3; url= http://localhost/kuaidiyuan1.html"));}
$sql="INSERT INTO w (OrderNumber,DeliverSlipNumber,DeliverCompany,ShippingTime) VALUES ('$a1','$a2','$a3',now())";
$result = mysqli_query($content, $sql);
if($result){echo "谢谢";}
$sqlll="UPDATE w SET IfOutback = '1' WHERE DeliverSlipNumber = '$a2'";
$resulttt = mysqli_query($content, $sqlll);
header("Refresh: 3; url= http://localhost/kuaidiyuan1.html"); 
?>