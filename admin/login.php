<?php
session_start();

include('../config.php');
if ($input->get('do') == 'check') {
    $auser = $input->post('auser');
    $apass = $input->post('apass');
    $sql = "select * from admin WHERE auser='{$auser}' AND apass='{$apass}'";
    $mysqli_result = $db->query($sql);//得到对象
    $row = $mysqli_result->fetch_array(MYSQLI_ASSOC);//转为数组
    if (is_array($row)) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['auser'] = $row['auser'];
        header("location:mainindex.php");
    } else {
        die("user or password is wrong");
    }
}

?>

<html>
<head>
    <title>管理员登录</title>
    <meta charset=utf-8> <!--转码--> 
</head>
<body>
<table border="1">
 <form class="gly" action="login.php?do=check" method="post">
  <tr>
    <td>用户名</td>
    <td><input type="text"  name="auser" id="auser" placeholder="请输入用户名"></td>
  <tr>                
     <td>密 码</td>
     <td> <input type="password"    name="apass" id="apass" placeholder="请输入密码"></td>
   </tr>
   <tr>
    <td> <input type="submit" value="提交登录"  > </td>
    <td>&nbsp;</td>
   </tr>
    </form>
</table>
</body>
</html>