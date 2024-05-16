<?php
	session_start();
?>

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

<?php
if(isset($_GET["username"],$_GET["password"])){
    $username = $_GET["username"];
    $password = $_GET["password"];
    if($_GET["role"] == "student"){
        if($username == "student" && $password == "123"){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['role'] = "学生";
            header("location:student_index.php");
        }
        else{
            echo "<font color='red' size='6px'>登录失败</font>";
        }
    }
    elseif ($_GET["role"] == "teacher"){
        if($username == "teacher" && $password == "123"){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['role'] = "教师";
            header("location:teacher_index.php");
        }
        else{
            echo "<font color='red' size='6px'>登录失败</font>";
        }
    }
    elseif ($_GET["role"] == "admin"){
        if($username == "admin" && $password == "123"){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['role'] = "教务";
            header("location:admin_index.php");
        }
        else{
            echo "<font color='red' size='6px'>登录失败</font>";
        }
    }
    else{
        echo "<script>
            alert('请选择角色');
            setTimeout(function (){
                window.location.href = 'login.php';
            },100);
        </script>";
    }

}



?>
