<?php
session_start();
if(isset($_SESSION['username'])){
	echo $_SESSION['role']."  ".$_SESSION['username']."  "."已登录";
}
else
{
	echo "<font color='red' size='6px'>未登录 请返回登录</font>";
}



//添加修改密码跳转链接
echo "<p>";
echo "<a href='Modify_password.php'>修改密码</a>";
echo "</p>";

echo "<p>";
echo "<a href='login.php'>返回首页</a>";
echo "</p>";

?>