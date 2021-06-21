<?php
 session_start();
 $a1=$_SESSION['OID'];
 $a2=$_POST['DeliverSlipNumber'];
 $a3=$_POST['DeliverCompany'];
if($a2==""||$a3=="")
{echo "请输入完整信息";
    exit(header("Refresh: 3; url= http://localhost/weichuku.php"));
}
 include("0.php");
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
$s="SELECT MachineNumber FROM o WHERE OrderNumber='$a1'";
$re=mysqli_query($content,$s);
$r=mysqli_fetch_assoc($re);
$a4=$r['MachineNumber'];
$sqll="UPDATE o SET IfOutOfStock = '1' WHERE OrderNumber = '$a1'";
$resul = mysqli_query($content,$sqll);
$sqlt="UPDATE o SET ReceiveTime = now() WHERE OrderNumber = '$a1'";
$resull = mysqli_query($content,$sqlt);
if(!$resul)
{echo "出库失败，请重试";
exit(header("Refresh: 3; url= http://localhost/weichuku.php"));
}
$sqllll="UPDATE m SET BackstageStorage=BackstageStorage-1 WHERE MachineNumber='$a4'";
$resultttt = mysqli_query($content, $sqllll);
$sql="INSERT INTO w (OrderNumber,DeliverSlipNumber,DeliverCompany,ShippingTime) VALUES ('$a1','$a2','$a3',now()) ";
$result = mysqli_query($content, $sql);
if($result)
{echo "出库成功！";}
else
{echo "出库失败！";}
header("Refresh: 3; url= http://localhost/weichuku.php");

?>