<?php
session_start();
//    if(isset($_SESSION['username'])){
//
//    }
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>ѧ���ɼ�����ϵͳ</title>
    </head>
    <body>
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

    </body>
    </html>
<?php

if(isset($_GET["username"],$_GET["password"])){
	if($_GET["role"])
	{
		//���ݿ��ʼ������
		$conn = new mysqli('localhost:8081','root','redhat','exam2013');
//		mysqli_set_charset($conn, "utf8");
//        $conn->query('set names utf8');
		$conn->set_charset("gb2312");
		if($conn->connect_error){
			die("����ʧ��".$conn->connect_error);
		}



		$username = $_GET["username"];
		$password = $_GET["password"];

		if($_GET["role"] == "student"){
			if(mysqli_query($conn,'select * from passwd'))
			{
				$quarry = mysqli_query($conn,"select * from passwd where name='$_GET[username]'");
				$row = mysqli_fetch_assoc($quarry);
                //����ѧ�Ų�ѯ����
				$quarry1 = mysqli_query($conn,"select * from student where sno='$_GET[username]'");
				$row1 = mysqli_fetch_assoc($quarry1);

				if(($row["passwd"]==$_GET["password"])&&($row['role']=="ѧ��")){ //ȷ���ǲ���ѧ���˺� ����ط������� ֱ�����õ�������ʾ��ѧ���ַ�
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
                    $_SESSION['role'] = "ѧ��";
                    $_SESSION['id'] = $row1['sno'];
//					var_dump($row);
					//��ת��¼����
					header("location:student_index.php");
					mysqli_close($conn);//�ر����ݿ�
				}
                else
				{
                    echo "<font color='red' size='6px'>�˻������������������ٴ�����</font>";
                }
			}
		}
		if($_GET["role"] == "teacher"){
			if(mysqli_query($conn,'select * from passwd'))
			{
				$quarry = mysqli_query($conn,"select * from passwd where name='$_GET[username]'");
				$row = mysqli_fetch_assoc($quarry);
//				if(($row["passwd"]==$_GET["password"])&&$row['role']=="教师"){
				if(($row["passwd"]==$_GET["password"])&&$row['role']=="��ʦ"){
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					$_SESSION['role'] = "��ʦ";
//					var_dump($row);
					//��ת��¼����
					header("location:teacher_index.php");
					mysqli_close($conn);//�ر����ݿ�
				}
				else
				{
					echo "<font color='red' size='6px'>�˻������������������ٴ�����</font>";
				}
			}

		}
		if($_GET["role"] == "admin"){
			if(mysqli_query($conn,'select * from passwd'))
			{
				$quarry = mysqli_query($conn,"select * from passwd where name='$_GET[username]'");
				$row = mysqli_fetch_assoc($quarry);
				if(($row["passwd"]==$_GET["password"])&&$row['role']=="����"){
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					$_SESSION['role'] = "����";
//					var_dump($row);
					//��ת��¼����
					header("location:admin_index.php");
					mysqli_close($conn);//�ر����ݿ�
				}
				else
				{
					echo "<font color='red' size='6px'>�˻������������������ٴ�����</font>";
				}
			}

		}
	}
    else{
    // ���û��ѡ�������ɫ��ť �������������� �����ض��򵽵�¼����
      echo '<script>
            alert("��ѡ���ɫ");
            setTimeout(function() {
                window.location.href = "login.php";
            }, 100); // 500������ض���
        </script>';
    }
}

?>