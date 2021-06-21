<?php
session_start();
include("0.php");
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
$a1=$_SESSION['OID'];
$sqll="SELECT UseTime FROM o WHERE OrderNumber=$a1";
     $resultt=mysqli_query($content,$sqll);
     $row=mysqli_fetch_assoc($resultt);
     $a2=$row['UseTime'];
$a3=$_POST['UTime'];
$a4=$a3+$a2;
$sql="UPDATE o SET UseTime=$a4 WHERE OrderNumber=$a1";
$dsn = mysqli_query($content,$sql);
$sql="UPDATE o SET FinalReturnTime=date_add( FinalReturnTime, interval $a4 day) WHERE OrderNumber=$a1";
$dsn = mysqli_query($content,$sql);
echo "延长成功！";
    header("Refresh: 3; url= http://localhost/dingdan.php");
?>