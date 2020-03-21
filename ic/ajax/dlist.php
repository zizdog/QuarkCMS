<?php
$q = isset($_GET["q"]) ? intval($_GET["q"]) : ''; 
//$con=mysqli_connect("localhost","db_user","my_password","my_db"); 
$con=mysqli_connect("localhost","v_zizdog_com","syc160323","v_zizdog_com"); 
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
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
