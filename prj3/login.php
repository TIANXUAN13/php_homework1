<?php
session_start();
//    if(isset($_SESSION['username'])){
//
//    }
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>学生成绩管理系统</title>
    </head>
    <body>
    <h1 style="color: blue;text-align: center;">学生成绩管理系统</h1>
    <form action="" method="get" style="text-align: center;">
        <label for="username" >登录账号</label><br>
        <input type="text" style="border: 1px solid black;border-radius: 10px;" id="username" name="username" required><br>
        <label for="password">登录密码</label><br>
        <input type="password" style="border: 1px solid black;border-radius: 10px;" id="password" name="password" required><br>
        <input type="radio" id="student" name="role" value="student">
        <label for="student">学生</label>
        <input type="radio" id="teacher" name="role" value="teacher">
        <label for="teacher">教师</label>
        <input type="radio" id="admin" name="role" value="admin">
        <label for="admin">教务</label><br>
        <input type="submit" style="width: 80px;border: 1px solid black;border-radius: 10px;background-color: #46b8da;color: white" value="登录">
    </form>

    </body>
    </html>
<?php

if(isset($_GET["username"],$_GET["password"])){
	if($_GET["role"])
	{
		//数据库初始化连接
		$conn = new mysqli('localhost:8081','root','redhat','exam2013');
//		mysqli_set_charset($conn, "utf8");
//        $conn->query('set names utf8');
		$conn->set_charset("gb2312");
		if($conn->connect_error){
			die("连接失败".$conn->connect_error);
		}



		$username = $_GET["username"];
		$password = $_GET["password"];

		if($_GET["role"] == "student"){
			if(mysqli_query($conn,'select * from passwd'))
			{
				$quarry = mysqli_query($conn,"select * from passwd where name='$_GET[username]'");
				$row = mysqli_fetch_assoc($quarry);
                //根据学号查询姓名
				$quarry1 = mysqli_query($conn,"select * from student where sno='$_GET[username]'");
				$row1 = mysqli_fetch_assoc($quarry1);

				if(($row["passwd"]==$_GET["password"])&&($row['role']=="学生")){ //确定是不是学生账号 这个地方是乱码 直接引用的乱码显示的学生字符
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
                    $_SESSION['role'] = "学生";
                    $_SESSION['id'] = $row1['sno'];
//					var_dump($row);
					//跳转登录界面
					header("location:student_index.php");
					mysqli_close($conn);//关闭数据库
				}
                else
				{
                    echo "<font color='red' size='6px'>账户或者密码错误请检查后再次输入</font>";
                }
			}
		}
		if($_GET["role"] == "teacher"){
			if(mysqli_query($conn,'select * from passwd'))
			{
				$quarry = mysqli_query($conn,"select * from passwd where name='$_GET[username]'");
				$row = mysqli_fetch_assoc($quarry);
//				if(($row["passwd"]==$_GET["password"])&&$row['role']=="鏁欏笀"){
				if(($row["passwd"]==$_GET["password"])&&$row['role']=="教师"){
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					$_SESSION['role'] = "教师";
//					var_dump($row);
					//跳转登录界面
					header("location:teacher_index.php");
					mysqli_close($conn);//关闭数据库
				}
				else
				{
					echo "<font color='red' size='6px'>账户或者密码错误请检查后再次输入</font>";
				}
			}

		}
		if($_GET["role"] == "admin"){
			if(mysqli_query($conn,'select * from passwd'))
			{
				$quarry = mysqli_query($conn,"select * from passwd where name='$_GET[username]'");
				$row = mysqli_fetch_assoc($quarry);
				if(($row["passwd"]==$_GET["password"])&&$row['role']=="教务"){
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					$_SESSION['role'] = "教务";
//					var_dump($row);
					//跳转登录界面
					header("location:admin_index.php");
					mysqli_close($conn);//关闭数据库
				}
				else
				{
					echo "<font color='red' size='6px'>账户或者密码错误请检查后再次输入</font>";
				}
			}

		}
	}
    else{
    // 如果没有选择这个角色按钮 浏览器弹出警告后 将其重定向到登录界面
      echo '<script>
            alert("请选择角色");
            setTimeout(function() {
                window.location.href = "login.php";
            }, 100); // 500毫秒后重定向
        </script>';
    }
}

?>