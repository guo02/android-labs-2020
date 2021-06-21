<?php
include("0.php");
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
$a1=$_POST['StaffNumber'];
$a5=$_POST['StaffPassword'];
if(empty($a1) || empty($a5))
{echo "账号或密码不能为空";
    exit(header("Refresh: 3; url= http://localhost/pingtaiyuangongdenglu.html"));
}
$sql="SELECT StaffPassword,StaffDepartment FROM y Where StaffNumber='$a1' ";
$result = mysqli_query($content, $sql);
    $row=mysqli_fetch_assoc($result);
    $a3=$row['StaffDepartment'];
    $a2=$row["StaffPassword"];
   
       if($a5===$a2){
        $_SESSION['StaffID']=$a1; 
        if($a3=='1') 
       { header('Location: http://localhost/cangku.php');}
       if($a3=='2')
       { header('Location: http://localhost/shouhuo.html');}
       if($a3=='3')
       {header('Location: http://localhost/guanliyuan.php');}
       if($a3=='4')
       { header('Location: http://localhost/pingtaiyonhuxingxi.php');}
       } 
       
       else
     { echo "账号或密码错误";
        header("Refresh: 3; url= http://localhost/pingtaiyuangongdenglu.html");
      
    }

?>