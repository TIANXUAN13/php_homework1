<?php
session_start();
if (isset($_SESSION['username'])) {
	echo $_SESSION['role']."  ".$_SESSION['username']."  "."已登录";
}
else
{
	echo "用户未登录";
}

?>





<?php

//添加修改密码跳转链接
echo "<p>";
echo "<a href='Modify_password.php'>修改密码</a>";
echo "</p>";

// 添加返回链接到表格下方
echo "<br><a href='login.php'>返回首页</a>";
?>