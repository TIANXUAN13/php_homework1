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





<?php

//����޸�������ת����
echo "<p>";
echo "<a href='Modify_password.php'>�޸�����</a>";
echo "</p>";

// ��ӷ������ӵ�����·�
echo "<br><a href='login.php'>������ҳ</a>";
?>