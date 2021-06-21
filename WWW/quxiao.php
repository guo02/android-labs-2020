<?php
include("0.php");
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
$a1=$_GET['ordernumber'];
$sqll="SELECT MachineNumber FROM o Where OrderNumber='$a1' ";
$resultt = mysqli_query($content, $sqll);
$row=mysqli_fetch_assoc($resultt);
$a2=$row['MachineNumber'];
$sql="DELETE FROM o WHERE OrderNumber='$a1' ";
$result=mysqli_query($content,$sql);
$sqlll="UPDATE m SET ReceptionStorage=ReceptionStorage+1 WHERE MachineNumber='$a2'";
 $resulttt = mysqli_query($content, $sqlll);
       if($result)
       {echo "删除成功";
        header("Refresh: 3; url= http://localhost/dingdan.php");}
       else{echo "删除失败";
        header("Refresh: 3; url= http://localhost/dingdan.php");
      }  

        // header('Location: http://localhost/dingdan.php');
        


?>