<?php
$phone = $_POST['phone'];
//echo $phone;
$conn=mysqli_connect('localhost','root','','nz_fang'); //连接数据库

if(!$conn){
	echo "notconn";
}
 
mysqli_query($conn,"set names 'utf8'"); //数据库输出编码

//mysql_select_db('nz_fang'); //打开数据库
 
$sql = "insert into fang_info (phone) values ('$phone')";
 
if(mysqli_query($conn,$sql)){
	echo $phone;
}else{
	echo "fail";
}
 
mysqli_close($conn); //关闭MySQL连接

?>
