
<?php   include ('check.php'); 
echo "当前ID： {$_SESSION['id']} <br>";
echo "当前登录操作员：{$_SESSION['auser']}  <br>
                <a href='auser.php'>管理员增加</a> ";
?>
<!DOCTYPE html>

<head>

<title>应收应付 管理</title>
  <style type="text/css">
  #addysyf table {
	text-align: left;
}
  </style>
</head>
<body>
     <h3>应收应付信息</h3>
     <form id="addysyf" name="addysyf" method="post" action="action.php?action=add">
    <table border="0" cellspacing="0" >
        <tr class="bt">
            <th  >ID</th>
            <th >姓名</th>
            <th >身份证号</th>
            <th  >开始日期</th>
            <th  >缴费日期</th>
            <th  >交费标准</th>
            <th  >缴费数量</th>
            <th  >缴费金额</th>
            <th  >截止日期</th>
            <th  >操作</th>
        </tr>
      
        <?php
        include ('../conn.php'); //数据库连接
        foreach ($pdo->query($sql) as $row) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['shfzh']}</td>";
            echo "<td>{$row['ksdate']}</td>";
            echo "<td>{$row['jfdate']}</td>";
            echo "<td>{$row['jfbz']}</td>";
            echo "<td>{$row['jfshl']}</td>";
            echo "<td>{$row['jfje']}</td>";
            echo "<td>{$row['jzdate']}</td>";
              echo "<td>
                <a href='javascript:doDel({$row['id']})'>删除</a>
                 <a href='edit.php?id=({$row['id']})'>修改</a>
                  </td>";
                 echo "</tr>";
        }

        ?>
        
  <tr class="shuru">
      <script type="text/javascript">
          function sum() {
              var a = document.getElementById("shuru_jfbz");
              var b = document.getElementById("shuru_jfshl");
              var s = document.getElementById("shuru_jfje");
              if(a.value === "" || b.value === "") {
                  return;
              }
              s.value = parseFloat(a.value) * parseFloat(b.value);
          }
      </script>
          <th height="42"  >    </th>
          <th ><input id="shuru_xm"    type="text" size="8"/></th>
          <th ><input id="shuru_sfzh"  type="text" size="18" /></th>
          <th ><input id="shuru_ksdate" type="date"/></th>
          <th ><input id="shuru_jfdate" type="date"/></th>
          <th ><input id="shuru_jfbz"    type="text"  size="6" onkeyup="sum(this);"/></th>
          <th ><input id="shuru_jfshl"   type="text"  size="4" onkeyup="sum(this);"/></th>
          <th ><input id="shuru_jfje"    type="text"  size="6" /></th>
          <th ><input id="shuru_jzdate" type="date"/></th>
          <th > <input type="submit" value="添加"/>
                 <input type="reset" value="清除"/> </th>
      </tr>

    
    </table>
   </form>
</body>
</html>
