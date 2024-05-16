<?php
session_start();
if(isset($_SESSION['username'])){
	echo $_SESSION['role']."  ".$_SESSION['username']."  "."已登录";
}
else
{
	echo "<font color='red' size='6px'>未登录 请返回登录</font>";
}

echo "<table border='1'>";
echo "<tr><td>课程号</td><td>课程名</td><td>分数</td></tr>";
echo "<tr><td>1</td><td>计算机网络</td><td>100</td></tr>";
echo "<tr><td>2</td><td>数据结构</td><td>100</td></tr>";
echo "<tr><td>3</td><td>操作系统</td><td>100</td></tr>";

echo "</table>";



//添加修改密码跳转链接
echo "<p>";
echo "<a href='Modify_password.php'>修改密码</a>";
echo "</p>";

echo "<p>";
echo "<a href='login.php'>返回首页</a>";
echo "</p>";

?>