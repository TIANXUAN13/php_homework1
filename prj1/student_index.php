<?php
session_start();
if(isset($_SESSION['username'])){
	echo $_SESSION['role']."  ".$_SESSION['username']."  "."�ѵ�¼";
}
else
{
	echo "<font color='red' size='6px'>δ��¼ �뷵�ص�¼</font>";
}

echo "<table border='1'>";
echo "<tr><td>�γ̺�</td><td>�γ���</td><td>����</td></tr>";
echo "<tr><td>1</td><td>���������</td><td>100</td></tr>";
echo "<tr><td>2</td><td>���ݽṹ</td><td>100</td></tr>";
echo "<tr><td>3</td><td>����ϵͳ</td><td>100</td></tr>";

echo "</table>";



//����޸�������ת����
echo "<p>";
echo "<a href='Modify_password.php'>�޸�����</a>";
echo "</p>";

echo "<p>";
echo "<a href='login.php'>������ҳ</a>";
echo "</p>";

?>