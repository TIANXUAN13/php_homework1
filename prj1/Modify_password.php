<?php
session_start();
if (isset($_SESSION['username'])) {
	echo $_SESSION['role']."  ".$_SESSION['username']."  "."�ѵ�¼";
}
else
{
	echo "�û�δ��¼";
}

echo "<p>";
echo "<a href='login.php'>������ҳ</a>";
echo "</p>";

?>