<?php
	session_start();
?>

<h1 style="color: blue;text-align: center;">ѧ���ɼ�����ϵͳ</h1>
<form action="" method="get" style="text-align: center;">
	<label for="username" >��¼�˺�</label><br>
	<input type="text" style="border: 1px solid black;border-radius: 10px;" id="username" name="username" required><br>
	<label for="password">��¼����</label><br>
	<input type="password" style="border: 1px solid black;border-radius: 10px;" id="password" name="password" required><br>
	<input type="radio" id="student" name="role" value="student">
	<label for="student">ѧ��</label>
	<input type="radio" id="teacher" name="role" value="teacher">
	<label for="teacher">��ʦ</label>
	<input type="radio" id="admin" name="role" value="admin">
	<label for="admin">����</label><br>
	<input type="submit" style="width: 80px;border: 1px solid black;border-radius: 10px;background-color: #46b8da;color: white" value="��¼">
</form>

<?php
if(isset($_GET["username"],$_GET["password"])){
    $username = $_GET["username"];
    $password = $_GET["password"];
    if($_GET["role"] == "student"){
        if($username == "student" && $password == "123"){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['role'] = "ѧ��";
            header("location:student_index.php");
        }
        else{
            echo "<font color='red' size='6px'>��¼ʧ��</font>";
        }
    }
    elseif ($_GET["role"] == "teacher"){
        if($username == "teacher" && $password == "123"){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['role'] = "��ʦ";
            header("location:teacher_index.php");
        }
        else{
            echo "<font color='red' size='6px'>��¼ʧ��</font>";
        }
    }
    elseif ($_GET["role"] == "admin"){
        if($username == "admin" && $password == "123"){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['role'] = "����";
            header("location:admin_index.php");
        }
        else{
            echo "<font color='red' size='6px'>��¼ʧ��</font>";
        }
    }
    else{
        echo "<script>
            alert('��ѡ���ɫ');
            setTimeout(function (){
                window.location.href = 'login.php';
            },100);
        </script>";
    }

}



?>
