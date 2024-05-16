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


	<form action="" method="post">
		请输入原密码：
		<input type="password" name="passwd" style="border: 1px solid black;border-radius: 10px;"><br>
		请输入修改的密码：
		<input type="password" name="passwd1" style="border: 1px solid black;border-radius: 10px;"><br>
		请再次输入：
		<input type="password" name="passwd2" style="border: 1px solid black;border-radius: 10px;"><br>
		<input type="submit" value="提交">

	</form>

<?php
echo "<p>";
echo "<a href='login.php'>返回首页</a>";
echo "</p>";

?>
