<?php
session_start();
include ('../config.php');

$session_id = $input->session('id');
if ($session_id === false) {
    header("location:login.php");//如果没有 id 则跳转到登录界面
}

$sql = "select * from admin where id='{$session_id}'";
$session_auser_result = $db->query($sql);
$session_user = $session_auser_result->fetch_array(MYSQLI_ASSOC);
