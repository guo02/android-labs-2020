<?php
include("0.php");
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
$a1=$_POST["OrderNumber"];
$a2=$_POST["DeliverSlipNumber"];
$a3=$_POST['zc'];


$sq="UPDATE o SET IfNormal1 = '$a3' WHERE OrderNumber = '$a1'";
$resul = mysqli_query($content, $sq);

$sql="UPDATE w SET TakingTime = NOW() WHERE DeliverSlipNumber = '$a2'  ";
$result = mysqli_query($content,$sql);
$sqlll="SELECT UseTime FROM o WHERE OrderNumber='$a1'";
$resulttt=mysqli_query($content,$sqlll);
$ro=mysqli_fetch_assoc($resulttt);
$a4=$ro['UseTime'];
$sqll="UPDATE o SET FinalReturnTime = date_add( now(), interval $a4 day) WHERE OrderNumber = '$a1'";
$resultt = mysqli_query($content, $sqll);
if($result && $resul)
{echo "操作成功";}
else{echo "操作失败，请重试";}
header("Refresh: 3; url= http://localhost/kuaidiyuan.html"); 
?>