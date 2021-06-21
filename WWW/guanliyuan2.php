<?php
include("0.php");
mysqli_set_charset($content,  "utf8"); 
mysqli_select_db($content,"aixin");
$a1=$_POST['MachineNumber'];
$sql="DELETE FROM m WHERE MachineNumber='$a1' ";
         $result=mysqli_query($content,$sql);
       if($result)
       {echo "编号为";
        echo $a1;
        echo"的机器删除成功";
        header("Refresh: 3; url= http://localhost/guanliyuan.php");}
       else{echo "删除失败";
        header("Refresh: 3; url= http://localhost/guanliyuan.php");
      }  

?>