<?php
//
//session_start();
//if (isset($_SESSION['username'])) {
//	echo $_SESSION['role']."  ".$_SESSION['username']."  "."�ѵ�¼";
//}
//else
//{
//	echo "�û�δ��¼";
//}
//?>
<!---->
<!--<!--��ɾ�Ĳ�-->-->
<!--<!--<form>-->-->
<!--<!--    ѧ��������-->-->
<!--<!--    <input type="text" name="name"><br>-->-->
<!--<!--    ѧ��ѧ�ţ�-->-->
<!--<!--    <input type="number" name="xh"><br>-->-->
<!--<!---->-->
<!--<!---->-->
<!--<!--</form>-->-->
<?php
//// �������ݿ�
//$conn = new mysqli('localhost:8081', 'root', 'redhat', 'exam2013');
//$conn->set_charset("gb2312");
//if ($conn->connect_error) {
//	die("����ʧ��: " . $conn->connect_error);
//}
//
//// �����ύ
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//	// ʹ�������ѧ�Ų�ѯѧ������
//	$sno = $_POST['xh'];
//	$query_name = "SELECT sname FROM student WHERE sno = '$sno'";
//	$result_name = $conn->query($query_name);
//
//	if ($result_name->num_rows > 0) {
//		$row_name = $result_name->fetch_assoc();
//		$sname = $row_name['sname'];
//
//		// ��ѯ��ѧ�������пγ̼��ɼ�
//		$query_grades = "SELECT course.cname, grade.score FROM course
//                         JOIN grade ON course.cno = grade.cno
//                         WHERE grade.sno = '$sno'";
//		$result_grades = $conn->query($query_grades);
//
//		if ($result_grades->num_rows > 0) {
//			echo "<h2>ѧ��������{$sname}</h2>";
//			echo "<table border='1'>";
//			echo "<tr><th>�γ���</th><th>��ǰ�ɼ�</th><th>�޸ĳɼ�</th></tr>";
//            $row_grade=null;
//			while ($row_grade = $result_grades->fetch_assoc()) {
//				echo "<form method='post'>";
//				echo "<tr>";
//				echo "<td>" . $row_grade['cname'] . "</td>";
//				echo "<td>" . $row_grade['score'] . "</td>";
//				echo "<td><input type='number' name='score' value='" . $row_grade['score'] . "'></td>";
//				echo "<td><input type='submit' name='update' value='����'></td>";
//				echo "</tr>";
//				echo "</form>";
//			}
//
//			echo "</table>";
//		} else {
//			echo "��ѧ��û��ѡ�μ�¼��";
//		}
//	} else {
//		echo "δ�ҵ���ѧ�Ŷ�Ӧ��ѧ����";
//	}
//} else { // �������POST����չʾ��
//	?>
<!--    <form method="post">-->
<!--        ѧ��ѧ�ţ�<input type="number" name="xh"><br>-->
<!--        <input type="submit" value="��ѯ">-->
<!--    </form>-->
<!--	--><?php
//}
//?>
<!---->
<?php
//// ����û�����˸��°�ť
//if (isset($_POST['update'])) {
//	$sno = $_POST['sno'];
//	$cno = $_POST['cno'];
//	$newScore = $_POST['score'];
//
//	// ʹ��Ԥ���������³ɼ�
//	$stmt = $conn->prepare("UPDATE grade SET score = ? WHERE sno = ? AND cno = ?");
//	$stmt->bind_param("iss", $newScore, $sno, $cno);
//
//	if ($stmt->execute()) {
//		echo "�ɼ��Ѹ���!";
//	} else {
//		echo "����ʧ��: " . $conn->error;
//	}
//	$stmt->close();
//}
//
//$conn->close();
//
////����޸�������ת����
//echo "<p>";
//echo "<a href='Modify_password.php'>�޸�����</a>";
//echo "</p>";
//
//// ��ӷ������ӵ�����·�
//echo "<br><a href='login.php'>������ҳ</a>";
//?>
<!---->
<!---->
<!---->


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

<!--��ɾ�Ĳ�-->
<!--<form>-->
<!--    ѧ��������-->
<!--    <input type="text" name="name"><br>-->
<!--    ѧ��ѧ�ţ�-->
<!--    <input type="number" name="xh"><br>-->
<!---->
<!---->
<!--</form>-->
<?php
// �������ݿ�
$conn = new mysqli('localhost:8081', 'root', 'redhat', 'exam2013');
$conn->set_charset("gb2312");
if ($conn->connect_error) {
	die("����ʧ��: " . $conn->connect_error);
}

// �����ύ
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// ʹ�������ѧ�Ų�ѯѧ������
	$sno = $_POST['xh'];
    $_SESSION['sno'] = $sno;
	$query_name = "SELECT sname FROM student WHERE sno = '{$_SESSION['sno']}'";
	$result_name = $conn->query($query_name);

	if ($result_name->num_rows > 0) {
		$row_name = $result_name->fetch_assoc();
		$sname = $row_name['sname'];

		// ��ѯ��ѧ�������пγ̼��ɼ�
		$query_grades = "SELECT course.cno, course.cname, grade.score FROM course 
                         JOIN grade ON course.cno = grade.cno 
                         WHERE grade.sno = '$sno'";
		$result_grades = $conn->query($query_grades);

		if ($result_grades->num_rows > 0) {
			echo "<h2>ѧ��������{$sname}</h2>";
			echo "<table border='1'>";
			echo "<tr><th>�γ���</th><th>��ǰ�ɼ�</th><th>�޸ĳɼ�</th></tr>";
			$row_grade=null;
			while ($row_grade = $result_grades->fetch_assoc()) {
				echo "<form method='post'>";
				echo "<input type='hidden' name='sno' value='" . $sno . "'>";
				echo "<input type='hidden' name='cno' value='" . $row_grade['cno'] . "'>";
				echo "<tr>";
				echo "<td>" . $row_grade['cname'] . "</td>";
				echo "<td>" . $row_grade['score'] . "</td>";
				echo "<td><input type='number' name='score' value='" . $row_grade['score'] . "'></td>";
				echo "<td><input type='submit' name='update' value='����'></td>";
				echo "</tr>";
				echo "</form>";
			}

			echo "</table>";
		} else {
			echo "��ѧ��û��ѡ�μ�¼��";
		}
	} else {
		echo "δ�ҵ���ѧ�Ŷ�Ӧ��ѧ����";
	}
} else { // �������POST����չʾ��
	?>
    <form method="post">
        ѧ��ѧ�ţ�<input type="number" name="xh"><br>
        <input type="submit" value="��ѯ">
    </form>
	<?php
}

// ����û�����˸��°�ť
if (isset($_POST['update'])) {
	$sno = $_POST['sno'];
	$cno = $_POST['cno'];
	$newScore = $_POST['score'];
	$_SESSION['sno'] = $sno;

	// ʹ��Ԥ���������³ɼ�
	$stmt = $conn->prepare("UPDATE grade SET score = ? WHERE sno = ? AND cno = ?");
	$stmt->bind_param("iss", $newScore, $sno, $cno);

	if ($stmt->execute()) {
		echo "�ɼ��Ѹ���!";
	} else {
		echo "����ʧ��: " . $conn->error;
	}
	$stmt->close();
}

$conn->close();

//����޸�������ת����
echo "<p>";
echo "<a href='Modify_password.php'>�޸�����</a>";
echo "</p>";

// ��ӷ������ӵ�����·�
echo "<br><a href='login.php'>������ҳ</a>";
?>

