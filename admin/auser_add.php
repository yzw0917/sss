<?php

include('check.php');

if ($input->get('do')=='add') {
    $auser = $input->post('auser');
    $apass = $input->post('apass');
    if (empty($auser) || empty($apass)) {
        die("账号或密码不能为空");
    }

    //检查用户名是否重复
    $sql = "SELECT * FROM admin WHERE auser='{$auser}'";
    $res = $db->query($sql);
    if ($res->fetch_array()) {
        die('账号不能重复');
    }
    if ($id<1){
        //插入数据
        $sql = "insert into admin (auser,apass) VALUES ('{$auser}','{$apass}')";
    } else {
        //修改
        $sql = "UPDATE admin SET auser='{$auser}',apass='{$apass}' WHERE id='{$id}'";
    }

    $is = $db->query($sql);
    if ($is) {
        header("location:auser.php");
    } else {
        die("执行失败");
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>添加管理员</title>
    <meta charset=utf-8>
</head>
<body>

<div class="container">
    <h1>管理员添加
        <small class="pull-right"><a class="btn-default" href="auser.php">返回</a></small>
    </h1>
    <hr/>
    <div class='rows'>
        <form class="form-horizontal" role="form" action="auser_add.php?do=add" method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label">账号</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="auser" placeholder="请输入账号" value="user">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control"  name="apass" placeholder="请输入密码" value="pass">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" class="btn btn-default">提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
