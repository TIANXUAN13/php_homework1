<?php
session_start();
if(isset($_SESSION['username'])){
	echo $_SESSION['role']."  ".$_SESSION['username']."  "."�ѵ�¼";
}
else
{
	echo "<font color='red' size='6px'>δ��¼ �뷵�ص�¼</font>";
}
?>

<form action="" method="post">
	ѧ��ѧ�ţ�<input type="text" name="sno"><br>
ѧ��������<input type="text" name="sname"><br>
ѧ���Ա�<input type="radio" name="gender" value="��"> ��
                 <input type="radio" name="gender" value="Ů"> Ů<br>
ѧ��״̬��<select name="status">
                  <option value="�ڶ�">�ڶ�</option>
                  <option value="��ѧ">��ѧ</option>
                  <option value="��ҵ">��ҵ</option>
                </select><br>
�����༶��<input type="text" name="class_name"><br>
        <input type="submit" value="�ύ">
    </form>

<?php
//����޸�������ת����
echo "<p>";
echo "<a href='Modify_password.php'>�޸�����</a>";
echo "</p>";

echo "<p>";
echo "<a href='login.php'>������ҳ</a>";
echo "</p>";

?>