<?php
        //1.�������ݿ�
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=ysyf;", "root", "root");
        } catch (PDOException $e) {
            die("���ݿ�����ʧ��" . $e->getMessage());
        }
         $pdo->query("SET NAMES 'utf8'");
        //3.ִ��sql��䣬��ʵ�ֽ����ͱ���
        $sql = "SELECT * FROM ysyf ";
?>