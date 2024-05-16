
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



<p>
<form action="" method="post">
	请输入原密码：
	<input type="password" name="passwd" style="border: 1px solid black;border-radius: 10px;"><br>
	请输入修改的密码：
	<input type="password" name="passwd1" style="border: 1px solid black;border-radius: 10px;"><br>
	请再次输入：
	<input type="password" name="passwd2" style="border: 1px solid black;border-radius: 10px;"><br>
	<input type="submit" value="提交">

</form>
</p>


<?php
if(isset($_POST['passwd1']) && isset($_POST['passwd2']) && isset($_POST['passwd'])){
	$con = mysqli_connect("localhost:8081","root","redhat","exam2013"); // 根据自己主机本地的数据库连接修改
	$con->set_charset("utf8");
	if(!$con)
	{
		echo "数据库连接失败：".mysqli_connect_error()."<br>";
	}
	else{
//		$quarry = mysqli_query($con,'select * from passwd where name = "'.$_SESSION['username'].'" and passwd = "'.$_POST['passwd'].'"');
//		$row = mysqli_fetch_array($quarry);
//		if(($row['passwd'] == $_POST['passwd'])&&($_POST['passwd1'] == $_POST['passwd2'])){
//			mysqli_query($con,"update passwd set passwd = '".$_POST['passwd1']."' where name = '".$_SESSION['username']."'");
//		}
//		mysqli_close($con);
        //避免SQL注入 使用预处理
		$stmt = mysqli_prepare($con, "SELECT * FROM passwd WHERE name = ? AND passwd = ?");
		mysqli_stmt_bind_param($stmt, "ss", $_SESSION['username'], $_POST['passwd']);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);

		if ($row && $_POST['passwd1'] == $_POST['passwd2']) {
			// 更新密码
			$updateStmt = mysqli_prepare($con, "UPDATE passwd SET passwd = ? WHERE name = ?");
			mysqli_stmt_bind_param($updateStmt, "ss", $_POST['passwd1'], $_SESSION['username']);
			if(mysqli_stmt_execute($updateStmt)) {
				echo "密码修改成功！";
			} else {
				echo "密码修改失败，请重试。";
			}
		} elseif (!$row) {
			echo "原密码输入错误！";
		} elseif ($_POST['passwd1'] != $_POST['passwd2']) {
			echo "两次输入的新密码不一致！";
		}

		mysqli_stmt_close($updateStmt);
		mysqli_stmt_close($stmt);
		mysqli_close($con);

	}

}


echo "<a href='login.php'>返回首页"
?>