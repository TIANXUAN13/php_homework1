<?php
session_start();
if(isset($_SESSION['username'])){
	echo $_SESSION['role']."  ".$_SESSION['username']."  "."�ѵ�¼";
}
else
{
	echo "<font color='red' size='6px'>δ��¼ �뷵�ص�¼</font>";
}



//����޸�������ת����
echo "<p>";
echo "<a href='Modify_password.php'>�޸�����</a>";
echo "</p>";

echo "<p>";
echo "<a href='login.php'>������ҳ</a>";
echo "</p>";

?>