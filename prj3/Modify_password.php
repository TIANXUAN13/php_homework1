
<?php
session_start();
if (isset($_SESSION['username'])) {
	echo $_SESSION['role']."  ".$_SESSION['username']."  "."�ѵ�¼";
}
else
{
	echo "�û�δ��¼";
}

?>



<p>
<form action="" method="post">
	������ԭ���룺
	<input type="password" name="passwd" style="border: 1px solid black;border-radius: 10px;"><br>
	�������޸ĵ����룺
	<input type="password" name="passwd1" style="border: 1px solid black;border-radius: 10px;"><br>
	���ٴ����룺
	<input type="password" name="passwd2" style="border: 1px solid black;border-radius: 10px;"><br>
	<input type="submit" value="�ύ">

</form>
</p>


<?php
if(isset($_POST['passwd1']) && isset($_POST['passwd2']) && isset($_POST['passwd'])){
	$con = mysqli_connect("localhost:8081","root","redhat","exam2013"); // �����Լ��������ص����ݿ������޸�
	$con->set_charset("utf8");
	if(!$con)
	{
		echo "���ݿ�����ʧ�ܣ�".mysqli_connect_error()."<br>";
	}
	else{
//		$quarry = mysqli_query($con,'select * from passwd where name = "'.$_SESSION['username'].'" and passwd = "'.$_POST['passwd'].'"');
//		$row = mysqli_fetch_array($quarry);
//		if(($row['passwd'] == $_POST['passwd'])&&($_POST['passwd1'] == $_POST['passwd2'])){
//			mysqli_query($con,"update passwd set passwd = '".$_POST['passwd1']."' where name = '".$_SESSION['username']."'");
//		}
//		mysqli_close($con);
        //����SQLע�� ʹ��Ԥ����
		$stmt = mysqli_prepare($con, "SELECT * FROM passwd WHERE name = ? AND passwd = ?");
		mysqli_stmt_bind_param($stmt, "ss", $_SESSION['username'], $_POST['passwd']);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);

		if ($row && $_POST['passwd1'] == $_POST['passwd2']) {
			// ��������
			$updateStmt = mysqli_prepare($con, "UPDATE passwd SET passwd = ? WHERE name = ?");
			mysqli_stmt_bind_param($updateStmt, "ss", $_POST['passwd1'], $_SESSION['username']);
			if(mysqli_stmt_execute($updateStmt)) {
				echo "�����޸ĳɹ���";
			} else {
				echo "�����޸�ʧ�ܣ������ԡ�";
			}
		} elseif (!$row) {
			echo "ԭ�����������";
		} elseif ($_POST['passwd1'] != $_POST['passwd2']) {
			echo "��������������벻һ�£�";
		}

		mysqli_stmt_close($updateStmt);
		mysqli_stmt_close($stmt);
		mysqli_close($con);

	}

}


echo "<a href='login.php'>������ҳ"
?>