<?php

include"0.php";
$a1=$_POST['PhoneNumber'];
$a2=$_POST['UserName'];
$a3=$_POST['IdentityCardNumber'];
$a4=$_POST['UserAddress'];
$a5=$_POST['Password'];
$a6=$_POST['Pa'];
mysqli_set_charset($content,  "utf8");
mysqli_select_db($content,"aixin");

if(empty($a1) || empty($a2) || empty($a3) || empty($a4) || empty ($a5) || empty($a6))
{echo "请输入完整信息";
    header("Refresh: 3; url= http://localhost/aixinzhuce.html");
}
else
{
if($a5==$a6)
{
$sql="INSERT INTO u (PhoneNumber,UserName,IdentityCardNumber,UserAddress,Password)values('$a1','$a2','$a3','$a4','$a5')";
$dsn = mysqli_query($content,$sql);
if($dsn){

    echo "注册成功";
    // header('Location: http://localhost/234.html');
    header('Location: http://localhost/aixindenglu.html');
}
else{echo "注册失败，请重试";
    header("Refresh: 3; url= http://localhost/aixinzhuce.html");
}
mysqli_close($content);
}
else
{echo "请两个密码保持一致";
    header("Refresh: 3; url= http://localhost/aixinzhuce.html");
}
}


?>