<?php
session_start();
if(isset($_SESSION['username'])){
	echo $_SESSION['role']."  ".$_SESSION['username']."  "."已登录";
}
else
{
	echo "<font color='red' size='6px'>未登录 请返回登录</font>";
}

echo "<form>";
echo "学生学号:"."<input type='number' value='请输入学生学号'></input>";
echo "<input type='submit' value='查询'></input>";
echo "</form>";


echo "<form>";
echo "教师ID:"."<input type='number' '></input>";
echo "<input type='submit' value='查询'></input>";
echo "</form>";

//添加修改密码跳转链接
echo "<p>";
echo "<a href='Modify_password.php'>修改密码</a>";
echo "</p>";

echo "<p>";
echo "<a href='login.php'>返回首页</a>";
echo "</p>";

?>