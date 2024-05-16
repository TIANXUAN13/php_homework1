<?php
session_start();
if(isset($_SESSION['username'])){
	echo $_SESSION['role']."  ".$_SESSION['username']."  "."已登录";
}
else
{
	echo "<font color='red' size='6px'>未登录 请返回登录</font>";
}
?>

<form action="" method="post">
	学生学号：<input type="text" name="sno"><br>
学生姓名：<input type="text" name="sname"><br>
学生性别：<input type="radio" name="gender" value="男"> 男
                 <input type="radio" name="gender" value="女"> 女<br>
学籍状态：<select name="status">
                  <option value="在读">在读</option>
                  <option value="休学">休学</option>
                  <option value="毕业">毕业</option>
                </select><br>
所属班级：<input type="text" name="class_name"><br>
        <input type="submit" value="提交">
    </form>

<?php
//添加修改密码跳转链接
echo "<p>";
echo "<a href='Modify_password.php'>修改密码</a>";
echo "</p>";

echo "<p>";
echo "<a href='login.php'>返回首页</a>";
echo "</p>";

?>