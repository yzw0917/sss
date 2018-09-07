<?php
        //1.连接数据库
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=ysyf;", "root", "root");
        } catch (PDOException $e) {
            die("数据库连接失败" . $e->getMessage());
        }
         $pdo->query("SET NAMES 'utf8'");
        //3.执行sql语句，并实现解析和遍历
        $sql = "SELECT * FROM ysyf ";
?>