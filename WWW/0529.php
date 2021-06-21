<?php
session_start();
include("0.php");
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");
$a1=$_POST["PhoneNumber"];
$a5=$_POST["Password"];
if(empty($a1) || empty($a5))
{echo "账号或密码不能为空";
    header("Refresh: 3; url= http://localhost/aixindenglu.html");
}
else
{
$sql="SELECT Password FROM u Where PhoneNumber=$a1 ";
$result = mysqli_query($content, $sql);


    $row=mysqli_fetch_assoc($result);
    $a2=$row["Password"];
   
       if($a5===$a2){
      
        $_SESSION['userID']=$a1;  
    header('Location: http://localhost/jiqijiemian.php');

       } 
       else
     { echo "账号或密码错误";
        header("Refresh: 3; url= http://localhost/aixindenglu.html");
      
    }

}

?>