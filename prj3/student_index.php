<?php
session_start(); // ȷ��session������
header('Content-Type: text/html; charset=utf-8'); // ������д���������Ӧ���ַ�����

// ����û��Ƿ��ѵ�¼
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: login.php");
    exit();
}
else
{
	echo $_SESSION['id']."�ѵ�¼"."<br>";
}

// ���ݿ����Ӳ��ֱ������¼��֤��ͬ���������ⲿ�ִ�����Գ��󵽵������ļ��и���
$conn = new mysqli('localhost:8081', 'root', 'redhat', 'exam2013');
if ($conn->connect_error) {
    die("����ʧ�� " . $conn->connect_error);
}
// Ϊ�˼����ԣ����������������ַ�����
$conn->set_charset("utf8");

// ��ȡ��ǰ��¼ѧ����ѧ��
$sno = $_SESSION['username'];

// ��ѯ��ѧ�����пγ̵ĳɼ�
$query = "SELECT grade.cno, course.cname, grade.score FROM grade 
          INNER JOIN course ON grade.cno = course.cno 
          WHERE grade.sno = '$sno'";
$result = $conn->query($query);

// ����ѯ���
if ($result->num_rows > 0) {
    // ������ʼ����
    echo "<table border='1' style='width:30%;'>
          <tr>
              <th>�γ̺�</th>
              <th>�γ���</th>
              <th>����</th>
          </tr>";

    // ������ѯ��������
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["cno"] . "</td>
                <td>" . $row["cname"] . "</td>
                <td>" . $row["score"] . "</td>
              </tr>";
    }

    // �������������
    echo "</table>";
} else {
    echo "��ǰ��¼ѧ�����޳ɼ���¼��";
}
echo "</table>";
//����޸�������ת����
echo "<p>";
echo "<a href='Modify_password.php'>�޸�����</a>";
echo "</p>";

// ��ӷ������ӵ�����·�
echo "<br><a href='login.php'>������ҳ</a>";

// �ر����ݿ�����
$conn->close();

?>