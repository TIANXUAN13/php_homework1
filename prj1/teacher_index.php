<?php
session_start();
if(isset($_SESSION['username'])){
	echo $_SESSION['role']."  ".$_SESSION['username']."  "."�ѵ�¼";
}
else
{
	echo "<font color='red' size='6px'>δ��¼ �뷵�ص�¼</font>";
}

echo "<form>";
echo "ѧ��ѧ��:"."<input type='number' value='������ѧ��ѧ��'></input>";
echo "<input type='submit' value='��ѯ'></input>";
echo "</form>";


echo "<form>";
echo "��ʦID:"."<input type='number' '></input>";
echo "<input type='submit' value='��ѯ'></input>";
echo "</form>";

//����޸�������ת����
echo "<p>";
echo "<a href='Modify_password.php'>�޸�����</a>";
echo "</p>";

echo "<p>";
echo "<a href='login.php'>������ҳ</a>";
echo "</p>";

?>