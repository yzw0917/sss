<?php

include('check.php');

$id = $input->get('id');
$auser = array('auser'=>'','apass'=>'');
if ($id>0) {
    $sql = "select * from admin WHERE id='{$id}'";
    $res = $db->query($sql);
    $auser = $res->fetch_array(MYSQLI_ASSOC);
}

if ($input->get('do') == 'delete') {//执行删除方法
    $id = $input->get('id');
    if ($id == $session_id) {//检验,不能删除自己
        die("不能删除自己");
    }
    $sql = "delete from admin where id='{$id}'";
    $is = $db->query($sql);
    if ($is) {
        header("location:auser.php");
    } else {
        die("删除失败");
    }
}

$sql = "select * from admin";
$result = $db->query($sql);

$rows = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $rows[] = $row;
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>管理员管理</title>
    <meta charset=utf-8>
 </head>
<body>
<div class="container">
    <h1>管理员管理
        <small class="pull-right"><a class="btn-default" href="auser_add.php">添加管理员</a></small>
    </h1>
    <div class='rows'>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>用户名</th>
                <th>管理</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row):?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['auser']?></td>
                <td>
                    <a href="auser_add.php?id=<?php echo $row['id'];?>">修改</a>
                    <a href="auser.php?do=delete&id=<?php echo $row['id'];?>">删除</a>
                </td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
