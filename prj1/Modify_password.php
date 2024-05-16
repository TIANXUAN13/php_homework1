<?php
session_start();
if (isset($_SESSION['username'])) {
	echo $_SESSION['role']."  ".$_SESSION['username']."  "."已登录";
}
else
{
	echo "用户未登录";
}

echo "<p>";
echo "<a href='login.php'>返回首页</a>";
echo "</p>";

?>