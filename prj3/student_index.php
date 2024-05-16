<?php
session_start(); // 确保session已启动
header('Content-Type: text/html; charset=utf-8'); // 添加这行代码声明响应的字符编码

// 检查用户是否已登录
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: login.php");
    exit();
}
else
{
	echo $_SESSION['id']."已登录"."<br>";
}

// 数据库连接部分保持与登录验证相同，但建议这部分代码可以抽象到单独的文件中复用
$conn = new mysqli('localhost:8081', 'root', 'redhat', 'exam2013');
if ($conn->connect_error) {
    die("连接失败 " . $conn->connect_error);
}
// 为了兼容性，可以在这里设置字符编码
$conn->set_charset("utf8");

// 获取当前登录学生的学号
$sno = $_SESSION['username'];

// 查询该学生所有课程的成绩
$query = "SELECT grade.cno, course.cname, grade.score FROM grade 
          INNER JOIN course ON grade.cno = course.cno 
          WHERE grade.sno = '$sno'";
$result = $conn->query($query);

// 检查查询结果
if ($result->num_rows > 0) {
    // 输出表格开始部分
    echo "<table border='1' style='width:30%;'>
          <tr>
              <th>课程号</th>
              <th>课程名</th>
              <th>分数</th>
          </tr>";

    // 遍历查询结果并输出
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["cno"] . "</td>
                <td>" . $row["cname"] . "</td>
                <td>" . $row["score"] . "</td>
              </tr>";
    }

    // 输出表格结束部分
    echo "</table>";
} else {
    echo "当前登录学生暂无成绩记录。";
}
echo "</table>";
//添加修改密码跳转链接
echo "<p>";
echo "<a href='Modify_password.php'>修改密码</a>";
echo "</p>";

// 添加返回链接到表格下方
echo "<br><a href='login.php'>返回首页</a>";

// 关闭数据库连接
$conn->close();

?>