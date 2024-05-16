<?php
//
//session_start();
//if (isset($_SESSION['username'])) {
//	echo $_SESSION['role']."  ".$_SESSION['username']."  "."已登录";
//}
//else
//{
//	echo "用户未登录";
//}
//?>
<!---->
<!--<!--增删改查-->-->
<!--<!--<form>-->-->
<!--<!--    学生姓名：-->-->
<!--<!--    <input type="text" name="name"><br>-->-->
<!--<!--    学生学号：-->-->
<!--<!--    <input type="number" name="xh"><br>-->-->
<!--<!---->-->
<!--<!---->-->
<!--<!--</form>-->-->
<?php
//// 连接数据库
//$conn = new mysqli('localhost:8081', 'root', 'redhat', 'exam2013');
//$conn->set_charset("gb2312");
//if ($conn->connect_error) {
//	die("连接失败: " . $conn->connect_error);
//}
//
//// 检查表单提交
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//	// 使用输入的学号查询学生姓名
//	$sno = $_POST['xh'];
//	$query_name = "SELECT sname FROM student WHERE sno = '$sno'";
//	$result_name = $conn->query($query_name);
//
//	if ($result_name->num_rows > 0) {
//		$row_name = $result_name->fetch_assoc();
//		$sname = $row_name['sname'];
//
//		// 查询该学生的所有课程及成绩
//		$query_grades = "SELECT course.cname, grade.score FROM course
//                         JOIN grade ON course.cno = grade.cno
//                         WHERE grade.sno = '$sno'";
//		$result_grades = $conn->query($query_grades);
//
//		if ($result_grades->num_rows > 0) {
//			echo "<h2>学生姓名：{$sname}</h2>";
//			echo "<table border='1'>";
//			echo "<tr><th>课程名</th><th>当前成绩</th><th>修改成绩</th></tr>";
//            $row_grade=null;
//			while ($row_grade = $result_grades->fetch_assoc()) {
//				echo "<form method='post'>";
//				echo "<tr>";
//				echo "<td>" . $row_grade['cname'] . "</td>";
//				echo "<td>" . $row_grade['score'] . "</td>";
//				echo "<td><input type='number' name='score' value='" . $row_grade['score'] . "'></td>";
//				echo "<td><input type='submit' name='update' value='更新'></td>";
//				echo "</tr>";
//				echo "</form>";
//			}
//
//			echo "</table>";
//		} else {
//			echo "该学生没有选课记录。";
//		}
//	} else {
//		echo "未找到该学号对应的学生。";
//	}
//} else { // 如果不是POST请求，展示表单
//	?>
<!--    <form method="post">-->
<!--        学生学号：<input type="number" name="xh"><br>-->
<!--        <input type="submit" value="查询">-->
<!--    </form>-->
<!--	--><?php
//}
//?>
<!---->
<?php
//// 如果用户点击了更新按钮
//if (isset($_POST['update'])) {
//	$sno = $_POST['sno'];
//	$cno = $_POST['cno'];
//	$newScore = $_POST['score'];
//
//	// 使用预处理语句更新成绩
//	$stmt = $conn->prepare("UPDATE grade SET score = ? WHERE sno = ? AND cno = ?");
//	$stmt->bind_param("iss", $newScore, $sno, $cno);
//
//	if ($stmt->execute()) {
//		echo "成绩已更新!";
//	} else {
//		echo "更新失败: " . $conn->error;
//	}
//	$stmt->close();
//}
//
//$conn->close();
//
////添加修改密码跳转链接
//echo "<p>";
//echo "<a href='Modify_password.php'>修改密码</a>";
//echo "</p>";
//
//// 添加返回链接到表格下方
//echo "<br><a href='login.php'>返回首页</a>";
//?>
<!---->
<!---->
<!---->


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

<!--增删改查-->
<!--<form>-->
<!--    学生姓名：-->
<!--    <input type="text" name="name"><br>-->
<!--    学生学号：-->
<!--    <input type="number" name="xh"><br>-->
<!---->
<!---->
<!--</form>-->
<?php
// 连接数据库
$conn = new mysqli('localhost:8081', 'root', 'redhat', 'exam2013');
$conn->set_charset("gb2312");
if ($conn->connect_error) {
	die("连接失败: " . $conn->connect_error);
}

// 检查表单提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// 使用输入的学号查询学生姓名
	$sno = $_POST['xh'];
    $_SESSION['sno'] = $sno;
	$query_name = "SELECT sname FROM student WHERE sno = '{$_SESSION['sno']}'";
	$result_name = $conn->query($query_name);

	if ($result_name->num_rows > 0) {
		$row_name = $result_name->fetch_assoc();
		$sname = $row_name['sname'];

		// 查询该学生的所有课程及成绩
		$query_grades = "SELECT course.cno, course.cname, grade.score FROM course 
                         JOIN grade ON course.cno = grade.cno 
                         WHERE grade.sno = '$sno'";
		$result_grades = $conn->query($query_grades);

		if ($result_grades->num_rows > 0) {
			echo "<h2>学生姓名：{$sname}</h2>";
			echo "<table border='1'>";
			echo "<tr><th>课程名</th><th>当前成绩</th><th>修改成绩</th></tr>";
			$row_grade=null;
			while ($row_grade = $result_grades->fetch_assoc()) {
				echo "<form method='post'>";
				echo "<input type='hidden' name='sno' value='" . $sno . "'>";
				echo "<input type='hidden' name='cno' value='" . $row_grade['cno'] . "'>";
				echo "<tr>";
				echo "<td>" . $row_grade['cname'] . "</td>";
				echo "<td>" . $row_grade['score'] . "</td>";
				echo "<td><input type='number' name='score' value='" . $row_grade['score'] . "'></td>";
				echo "<td><input type='submit' name='update' value='更新'></td>";
				echo "</tr>";
				echo "</form>";
			}

			echo "</table>";
		} else {
			echo "该学生没有选课记录。";
		}
	} else {
		echo "未找到该学号对应的学生。";
	}
} else { // 如果不是POST请求，展示表单
	?>
    <form method="post">
        学生学号：<input type="number" name="xh"><br>
        <input type="submit" value="查询">
    </form>
	<?php
}

// 如果用户点击了更新按钮
if (isset($_POST['update'])) {
	$sno = $_POST['sno'];
	$cno = $_POST['cno'];
	$newScore = $_POST['score'];
	$_SESSION['sno'] = $sno;

	// 使用预处理语句更新成绩
	$stmt = $conn->prepare("UPDATE grade SET score = ? WHERE sno = ? AND cno = ?");
	$stmt->bind_param("iss", $newScore, $sno, $cno);

	if ($stmt->execute()) {
		echo "成绩已更新!";
	} else {
		echo "更新失败: " . $conn->error;
	}
	$stmt->close();
}

$conn->close();

//添加修改密码跳转链接
echo "<p>";
echo "<a href='Modify_password.php'>修改密码</a>";
echo "</p>";

// 添加返回链接到表格下方
echo "<br><a href='login.php'>返回首页</a>";
?>

