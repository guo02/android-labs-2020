<?php
$a1=$_POST["MachineNumber"];
$a2=$_POST["Brand"];
$a3=$_POST["MachineModel"];
$a4=$_POST["MachinePhoto"];
$a5=$_POST["MachineRenark"];
$a6=$_POST["UsageMethod"];
$a7=$_POST["ReceptionStorage"];
$a8=$_POST["BackstageStorage"];
$a9=$_POST["Certificate"];
$a10=$_POST["MachineCost"];
$a11=$_POST["MachineName"];
include("0.php");
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
$sql="INSERT INTO m (MachineNumber,Brand,MachineModel,MachinePhoto,MachineRenark,UsageMethod,ReceptionStorage,BackstageStorage,Certificate,MachineCost,MachineName)values('$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11')";
$dsn = mysqli_query($content,$sql);
if($dsn)
{echo "新仪器信息插入成功";
    header("Refresh: 3; url= http://localhost/guanliyuan.php");
}
else
{echo "新仪器信息插入失败";
    header("Refresh: 3; url= http://localhost/guanliyuan.php");}
    mysqli_close($content);
?>