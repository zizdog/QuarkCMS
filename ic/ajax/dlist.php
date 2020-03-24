<?php
$q = isset($_GET["q"]) ? intval($_GET["q"]) : ''; 

//$con=mysqli_connect("localhost","数据库用户名","数据库密码","数据库名"); 
$con=mysqli_connect("localhost","x","x","x");
if (!$con)
{
    die('数据获取失败:请检查"ic/ajax/dlist.php"中数据库配置 ' . mysqli_error($con));
}
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf8");
 
$sql="SELECT * FROM typecho_fields WHERE cid = '".$q."' AND name ='dlist' " ;
 
$result = mysqli_query($con,$sql);
 
while($row = mysqli_fetch_array($result))
{
    echo "" . $row['str_value'] . "";
};
 
mysqli_close($con);
?>
